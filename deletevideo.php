

<?php
    ini_set('display_errors', 1);
    error_reporting(~0);
session_start();
    
    include "connection.php";

    $id = $_GET['VidId'];
    $sql = "DELETE FROM video
            WHERE VidId = '$id' ";
$execute = mysqli_query($conn, $sql);

echo "<script>alert('Delete  Success!');</script>";

echo "<meta http-equiv='refresh' content='0; url=displayvid.php'/>";


?>


