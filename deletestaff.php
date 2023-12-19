
<?php
session_start();
include "connection.php";

$sql = "delete from staff WHERE Username ='" .$_SESSION['Username']."' AND Password='" .$_SESSION['Password']."'";
if ($conn->query($sql) === TRUE)
    
 {   
 echo "<script> alert(' Profile Deleted Successfully.'); </script>";
  echo "<meta http-equiv='refresh' content='0; url= home.php'/>";
} 
else {   
  echo "Error deleting record: " . $conn->error; } 


  $conn->close(); 

?> 





