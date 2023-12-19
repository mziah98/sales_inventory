<?php
session_start();
include "connection.php";
if(isset($_POST['insertData'])){
    $name = $_POST['StockName'];
	$quantity = $_POST['StockQuantity'];
  	$price = $_POST['StockPrice'];  
  	$sup = $_POST['SupName'];
	

	
	//if($password == $confirmPassword){
	
	$sql ="INSERT INTO supplier_stock(StockName,StockQuantity,StockPrice,SupName)
  VALUES ('$name','$quantity','$price','$sup')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=stockbyinvoice.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }
	
}
 ?>
