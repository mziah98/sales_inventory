
<?php
session_start();
include "connection.php";
$no = $_GET['StockNo'];
$sql = "delete from stock where StockNo = '$no'";
if ($conn->query($sql) === TRUE)
	
 {   
 echo "<script> alert('Housekeeping Record Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= housekeeping.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 




?>
