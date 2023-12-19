<?php
session_start();
include "connection.php";
if(isset($_POST['insertData'])){
    
	$weight = $_POST['StockWeight'];
	$group = $_POST['StockGroup'];
  	
  $sell = $_POST['SellingPrice'];
	$image = $_POST['Image'];
	$in= $_POST['InNo'];
	$cat= $_POST['CatNo'];
	
	
	
	$sql ="INSERT INTO stock(SellingPrice,StockGroup,StockWeight,Image,InNo,CatNo)
  VALUES ('$sell','$group','$weight','$image','$in','$cat')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=listofstock.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }
	
echo "<script>alert('Insert Data!')</script>";
 	echo "<meta http-equiv='refresh' content='0; url=listofstock.php'/>";

 }

 ?>
