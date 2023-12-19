
<?php
session_start();
include "connection.php";
$no = $_GET['InNo'];
$sql = "delete from invoice where InNo = '$no'";
if ($conn->query($sql) === TRUE)
    
 {   
 echo "<script> alert(' Record Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= invoice.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 





