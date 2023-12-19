<?php
session_start();
include "connection.php";
if(isset($_POST['insertData']))
{
    $name = $_POST['InName'];
	$quantity = $_POST['InQuantity'];
	$price = $_POST['InPrice'];
	$date= $_POST['InDate'];
  $category = $_POST['CatNo'];
  // $pay = $_POST['PaymentDue'];  
   $cus = $_POST['SupNo'];  

   // $pr = $_POST['TotalPrice'];
 
	
	
	$sql ="INSERT INTO invoice (InName,InQuantity,InPrice,InDate,SupNo,CatNo)
  VALUES ('$name','$quantity','$price','$date','$cus','$category' )";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data Successfully!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=invoice.php'/>";
	
	 }
	 else
	 {
	     echo "<script>alert('Insert Fail!');</script>";
		 }

 }

 ?>
