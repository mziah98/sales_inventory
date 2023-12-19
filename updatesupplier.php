<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $name = $_POST['updateSupName'];
        // $com = $_POST['updateSupCompany'];
         $depart = $_POST['updateDepartment'];
        $address = $_POST['updateSupAdd'];
        $phone = $_POST['updateSupPhoneNo'];
        $email = $_POST['updateSupEmail'];

        $sql = "UPDATE supplier SET SupName='$name',
                                      
                                         Department='$depart',
                                       SupAdd='$address',
                                        SupPhoneNo=' $phone',
                                       SupEmail = '$email'
                                        WHERE SupNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= supplierlist2.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>