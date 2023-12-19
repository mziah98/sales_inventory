
<?php
session_start();
include "connection.php";
$no = $_GET['PoNo'];
$sql = "delete from purchase_order where PoNo = '$no'";
if ($conn->query($sql) === TRUE)
    
 {   
 echo "<script> alert(' Record Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= purorder.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 





