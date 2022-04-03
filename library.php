
<?php 
    require_once("config.php");
    // query
    $query =    "SELECT books.book_id, books.title , loans.user_id, users.user_name, loans.dueto
                FROM books, loans, users
                WHERE loans.book_id=books.book_id and users.user_id=loans.user_id";
    $table = mysqli_query($connection, $query);
        if (!$table) {
            die ("Failed to retrieve information requested for table 1.") . "<br>";
        }
    $query2=    "SELECT *\n"
                . "FROM books \n"
                . "WHERE NOT EXISTS \n"
                . "  (SELECT books.book_id\n"
                . "  FROM loans \n"
                . "  WHERE books.book_id = loans.book_id)";
    $table2 = mysqli_query($connection, $query2)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaurasLibrary
    </title>
    <style>
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }
    </style>
</head>
<body>
<h2>Loaned Books</h2>

<table style="width:40%">
  <tr>
    <th>BookID</th>
    <th>Book Name</th>
    <th>UserID</th>
    <th>Users Name</th>
    <th>Due to</th>
    <th>Options</th>
    <th>Options</th>
  </tr>

  <?php 
while ($row = mysqli_fetch_array ($table) ){
    ?>
        <tr>
            <td>
                <?php  
                echo $row ['book_id']
                ?>
            </td>
            <td>
                <?php  
                echo $row ['title']
                ?>
            </td>
            <td>
                <?php  
                echo $row ['user_id']
                ?>
            </td>
            <td>
                <?php  
                echo $row ['user_name']
                ?>
            </td>
            <td>
                <?php  
                echo $row ['dueto']
                ?>
            </td>
            <td>
            <a href="edit.php?book_id=<?php echo $row['book_id']; ?>&action=edit">Edit</a></td>
           
            
            <td><a href="edit.php?book_id=<?php echo $row['book_id']; ?>&action=delete">Return Book</a></td>

        </tr>
<?php
}
?>
</table>
<h2>Unloaned Books</h2>

<table style="width:40%">
  <tr>
    <th>Title</th>
    <th>Year</th>
    <th>Options</th>
  </tr>

  <?php 
while ($row = mysqli_fetch_array ($table2) ){
    ?>
        <tr>
            <td>
                <?php  
                echo $row ['title']
                ?>
            </td>
            <td>
                <?php  
                echo $row ['year']
                ?>
            </td>
            <td>
            <a href="loan.php?book_id=<?php echo $row['book_id']; ?>">Register Loan</a>
            </td>
        </tr>
<?php
}
?>

</table>
<button onClick="window.location='showUsers.php'" >Display Users</button>
<button onClick="window.location='addUser.php'" >Add Users</button>
<!-- <td><a href="edit.php?book_id=<?php echo $row['book_id']; ?>&action=delete">Return Book</a></td> -->
</body> 
</html>

<?php
    mysqli_close($connection);
?>
