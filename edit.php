<?php 
    require_once("config.php");
    $book_id=$_GET["book_id"];
    $action=$_GET["action"];
    
    if(!isset($book_id) || !isset($action)){
        die("Failed to retrieve variables");
    }

    switch ($action) {

    case "delete":
        $book_id = $_GET['book_id'];
        $queryDELETE = "DELETE FROM loans where book_id=".$book_id;

        $del = mysqli_query($connection,$queryDELETE); // delete query
        
        if($del)
        {
            mysqli_close($connection); 
            header("Location: http://localhost/Lab3_1604/library.php");
            exit;	
        }
        else
        {
            echo "Error deleting record"; 
        }
          break;

    case "edit":
        
    $querySELECT =   "SELECT * FROM loans WHERE book_id=".$book_id;
    $table = mysqli_query($connection, $querySELECT);
    $data = mysqli_fetch_array($table); // data

    if (!$table) {
        die ("Failed to retrieve information requested for table 1.") . "<br>";
    }
	

    if(isset($_GET['update'])) // when click on Update button
    {
        $book_id=$_GET["book_id"];
        $user_id=$_GET["user_id"];
        $loan_id = $_GET["loan_id"]; 
    
        $queryEDIT = "UPDATE `loans` SET `book_id` = '".$book_id."', `user_id` = '".$user_id."' WHERE `loans`.`loan_id` =".$loan_id;
        $edit = mysqli_query($connection,$queryEDIT);
        
        if($edit)
        {
            mysqli_close($connection); // Close connection
            header("location:library.php"); 
            exit;
        }
        else
        {
            echo mysqli_error($connection);
        }    	
    }
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify or Delete</title>
</head>
<body>  
    <h3>Modify</h3>
    <form >  
    <form method="GET">

        <label for="book_id">BookID:</label><br>
        <input type="text" name="book_id" value="<?php echo $data['book_id']?>"><br> 

        <label for="userId">UserID:</label><br>
        <input type="text" name="user_id" value="<?php echo $data['user_id']?>"><br>
       

        <input type="hidden" name="loan_id" value="<?php echo $data['loan_id']?>"><br>
        <input type="hidden" name="action" value="edit"><br>

        <input type="submit" name="update" value="Update">
        <button type="button" onclick="location.href='library.php'">Cancel and Go Back</button>
    </form>

</form>
    <br>

    <p> </p>


      <p>For internal policy reasons, the due date cannot be extended. The book must
         be returned and, in case there is no reservation, borrowed again</p>
</body>
</html>

<?php 
break;
default: 
die ("unknown error, default session");
}
?>

