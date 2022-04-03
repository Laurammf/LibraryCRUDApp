<?php 
    require_once("config.php");
    $book_id =$_GET["book_id"];



    if(!isset($book_id)){
        die("Failed to retrieve book ID");
    }

    // loan.php?user_id=u1&dueto=2021-06-25&book_id=1&action=add&submit=Submit
    if(isset($_GET['submit']))
    {		
        $user_id=$_GET["user_id"];
        $dueto=$_GET["dueto"];
        $book_id=$_GET["book_id"];
    
        $queryADDLOAN = "INSERT INTO `loans` (`loan_id`, `book_id`, `user_id`, `dueto`) 
                    VALUES (NULL, $book_id, ('$user_id'), '$dueto')";


        $table = mysqli_query($connection, $queryADDLOAN);
        

        if(mysqli_affected_rows($connection)>0)
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Loan</title>
</head>
<body>  
    <h3>AddLoan</h3>
  
    <form action="loan.php" method="GET">


        <label for="user_id">UserID:</label><br>
        <input type="text" name="user_id" value=""><br>
   
    <p>Are you unsure about the users respective ID? Click here to display users</p>
    <button type="button" onclick="location.href='showUsers.php'">Display Users</button><br>


        <label for="dueto">Due date:</label><br>
        <input type="date" name="dueto" value="" default="YYYY-MM-DD"><br> 

        <input type="hidden" name="book_id" value="<?php echo $book_id?>"><br>
        <input type="hidden" name="action" value="add"><br>

        <input type="submit" name="submit" value="submit">
        <button type="button" onclick="location.href='library.php'">Cancel and Go Back</button>
    </form>


    <br>
    <p> </p>

      <p>Important: due to is always 3 weeks after the loan date</p>
</body>
</html>



<!-- attempt to do select to select user -->
<!-- <label for="user_id">UserID:</label><br>
        <select>
<?php
        $usernames= mysqli_query($connection, "SELECT user_id From users");     
        while ($data = mysqli_fetch_array($usernames)){
?>
        <option value="<?php echo $data['user_id'];?>"><?php echo $data['user_id']; ?></option>
<?php
        }
?>
        </select> <br> -->