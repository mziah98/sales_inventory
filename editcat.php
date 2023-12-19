<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $name = $_POST['updateCatName'];
         

        $sql = "UPDATE category SET CatName='$name'
                                       WHERE CatNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= insertcat.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            echo "<meta http-equiv='refresh' content='0; url= insertcat.php'/>";
        }
    }
?>