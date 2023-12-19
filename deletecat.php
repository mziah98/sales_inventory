<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
   
   

    $strCustomerID = $_GET['CatNo'];
    $sql = "DELETE FROM category
            WHERE CatNo = '$strCustomerID' ";
$execute = mysqli_query($conn, $sql) or die(mysqli_error($conn));

echo "<script>alert('Delete  Success!');</script>";

echo "<meta http-equiv='refresh' content='0; url=insertcat.php'/>";




?>