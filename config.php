<?php
// step 1 open connection
    $_SERVER="localhost";
    $user="root";
    $password="";
    $database="library";
    $connection=mysqli_connect($_SERVER,$user,$password,$database);

    // step 2 capture error
    if (mysqli_connect_errno()){
        die("failed connection " . mysqli_connect_errno() );
    }

?>