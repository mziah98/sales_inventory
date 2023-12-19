<?php
session_start();
include "connection.php";
if(isset($_POST['insertData'])){
    $name = $_POST['SupName'];
	// $company = $_POST['SupCompany'];
  $department = $_POST['Department'];
	$add = $_POST['SupAdd'];
	$phoneno = $_POST['SupPhoneNo'];
	$email = $_POST['SupEmail'];
	
	//if($password == $confirmPassword){
	
	$sql ="INSERT INTO supplier(SupName,Department,SupAdd,SupPhoneNo,SupEmail)VALUES ('$name','$department','$add','$phoneno','$email')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=supplierlist2.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }
	
}
 ?>
