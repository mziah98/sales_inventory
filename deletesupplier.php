<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    
        $id = $_GET['SupNo']; 

        $sql = "DELETE FROM supplier WHERE SupNo='$id'";
        $result = mysqli_query($conn, $sql)or die (mysqli_error($conn));

        if($result){
            echo "<script> alert('Data Deleted.'); </script>";
            echo "<meta http-equiv='refresh' content='0; url= supplierlist2.php'/>";
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    
?>