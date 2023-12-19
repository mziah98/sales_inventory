
<?php
session_start();
include "connection.php";
$no = $_GET['StockNo'];
$sql = "delete from stock where StockNo = '$no'";
if ($conn->query($sql) === TRUE)
	
 {   
 echo "<script> alert('Ff Record Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= ff.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 




?>
