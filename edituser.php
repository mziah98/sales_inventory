<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
          $uname = $_POST['updateUsername'];
        $name = $_POST['updateStaffName'];

       
      
        $phone = $_POST['updateStaffPhoneNo'];
          $add = $_POST['updateStaffAdd'];
        $position= $_POST['updateStaffPosition'];
        $email = $_POST['updateStaffEmail'];
        

        $sql = "UPDATE staff SET StaffName='$name',
                                    Username='$uname',
                                       StaffAdd='$add',
                                        
                                       StaffPhoneNo='$phone',
                                        StaffPosition=' $position',
                                      StaffEmail = '$email'
                                     

                                        WHERE StaffNo='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script> alert('Data Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= profile.php'/>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            echo "<meta http-equiv='refresh' content='0; url= profile.php'/>";
        }
    }
?>