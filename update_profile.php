<?php
session_start();
include "connection.php";

 if(ISSET($_POST['update']))
      
{

// $id= $_POST["id"];	
$name= $_POST["StaffName"];
$em= $_POST["StaffEmail"];
$ph= $_POST["StaffPhoneNo"];
$gen= $_POST["StaffAdd"];
$gen2= $_POST["StaffPosition"];



$sql = "UPDATE staff set StaffName='$name',StaffEmail = '$em',StaffPhoneNo= '$ph', StaffAdd= '$gen',StaffPosition= '$gen2' WHERE Username = '".$_SESSION['Username']."' AND Password='".$_SESSION['Password']."'" or die ("Error inserting data into table");

      if($conn->query($sql) === TRUE)
        {
            echo "<script> alert('Profile Updated Successfully.'); </script>";
             echo "<meta http-equiv='refresh' content='0; url= profile2.php'/>";
        }
        else
        {
             echo "Error: " . $sql . "<br>" . $conn->error;
             echo "<meta http-equiv='refresh' content='0; url= updateprofile.php'/>";
            }

}
$conn->close();
?>


