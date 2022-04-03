<?php 
    require_once("config.php");
    $user_id = "";
    $user_name="";

    if(isset($_GET['submit'])) // when click on Update button
    {
        $user_id=$_GET["user_id"];
        $user_name=$_GET["user_name"];
    
        $queryADDUSER =     "INSERT INTO `users` (`user_name`, `user_id`) 
                            VALUES ('$user_name',  '$user_id')";
                            // "INSERT INTO `users` (`user_id`, `user_name`) VALUES (\'u3\', \'Nietszche\')"
        $insert = mysqli_query($connection, $queryADDUSER);
        $data = mysqli_fetch_array($table); // data
    
    

        if($insert)
        {
            mysqli_close($connection); // Close connection
            header("location:showUsers.php"); 
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
    <title>Insert New User</title>
</head>
<body>  
    <h3>Insert new User into the System</h3>
    <form >  
    <form method="GET">
        <label for="book_id">UserID:</label><br>
        <input type="text" name="user_id" value="<?php echo $user_id;?>"><br>
        <label for="userId">Users Name:</label><br>
        <input type="text" name="user_name" value="<?php echo $user_name;?>"><br>
        <input type="submit" name="submit" value="submit">
        <button type="button" onclick="location.href='library.php'">Cancel and Go Back</button>
    </form>

</form>
    <br>

    <p> </p>


      <p>Unsure if the user is already registered? Check the Users List: </p>
      <button onClick="window.location='showUsers.php'" >Display Users</button>
</body>
</html>

<?php 

?>

