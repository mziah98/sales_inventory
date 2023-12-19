<?php
session_start();
include "connection.php";
if(isset($_POST['insertData']))
{
    $name = $_POST['Description'];
	$quantity = $_POST['Quantity'];
	$name1 = $_POST['CompName'];
	$name2 = $_POST['CompAdd'];
	$name3 = $_POST['CompEmail'];
	// $name4 = $_POST['CompPhone'];
	$date= $_POST['Date'];
 // $category = $_POST['StockCat'];
  
   //$cus = $_POST['StaffNo'];  
 
 
	
	
	$sql ="INSERT INTO purchase_order (Description,Quantity,Date,CompName,CompAdd,CompEmail)
  VALUES ('$name','$quantity','$date','$name1', '$name2','$name3' )";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data Succcessfully!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=purorder.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }

 }

 ?>
