
<?php
session_start();
include "connection.php";
$no = $_GET['OrderNo'];
$sql = "delete from cus_order where OrderNo = '$no'";
if ($conn->query($sql) === TRUE)
    
 {   
 echo "<script> alert(' Record Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= custorder.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 





