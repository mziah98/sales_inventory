<?php
session_start();
include "connection.php";
if(isset($_POST['insertData'])){
    $name = $_POST['StockName'];
	$quantity = $_POST['StockQuantity'];
	$remarks= $_POST['Remarks'];
	$par= $_POST['Particulars'];
  $price = $_POST['StockPrice'];  
  $sell = $_POST['SellingPrice'];
	
	//$image = addslashes(file_get_contents($_FILES['Image']['tmp_name']));

	
	//if($password == $confirmPassword){
	
	$sql ="INSERT INTO stock(StockName,StockQuantity,StockPrice,SellingPrice,Remarks,Particulars)
  VALUES ('$name','$quantity','$price','$sell', '$remarks','$par')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=stationary.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }
	
}
 ?>
