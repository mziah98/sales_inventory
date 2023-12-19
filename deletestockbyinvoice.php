<?php

    // Insert the content of connection.php file
    include('connection.php');
    
    // Delete data from the database
    if(ISSET($_POST['deleteData']))
    {
        $id = $_POST['deleteId']; 

        $sql = "DELETE FROM supplier_stock WHERE SupStockNo='$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script> alert('Data Deleted.'); </script>";
            echo "<meta http-equiv='refresh' content='0; url= stockbyinvoice.php'/>";
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>