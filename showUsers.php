<?php 
    require_once("config.php");
    // query
    $query =    "SELECT * 
                FROM users";
    $table = mysqli_query($connection, $query);
        if (!$table) {
            die ("Failed to retrieve information requested for table 1.") . "<br>";
        }

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
<h2>Users</h2>

<table style="width:40%">
  <tr>
    <th>Users ID</th>
    <th>Users Name</th>
  </tr>

  <?php 
while ($row = mysqli_fetch_array ($table) ){
    ?>
        <tr>
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
        </tr>
<?php
}
?>
</table>
</table>
<button onClick="window.location='library.php'" >Back to Main</button>
<!-- <td><a href="edit.php?book_id=<?php echo $row['book_id']; ?>&action=delete">Return Book</a></td> -->
</body> 
</html>

<?php
    mysqli_close($connection);
?>
