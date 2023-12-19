<?php
session_start();
include "connection.php";
if(isset($_POST['insertData']))
{
    $name = $_POST['CusName'];
	$quantity = $_POST['OrderQuantity'];
	
	$name2 = $_POST['CusAdd'];
	$name3 = $_POST['CusEmail'];
	$name4 = $_POST['StockNo'];
	$date= $_POST['OrderDate'];
 // $category = $_POST['StockCat'];
  
    //$cus1 = $_POST['InName'];     
     $cus4 = $_POST['StatusPayment']; 

//$code = isset($_GET['StockQuantity']) ? $_GET['StockQuantity'] : '';
	// echo $name2,$name3,$name4,$date,$cus4;
$sql3 = "SELECT * FROM stock where StockNo = '$name4' ";
 $query3 = mysqli_query($conn,$sql3);
// $result3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
$data = mysqli_fetch_assoc($query3);
$quantity2=$data['StockQuantity'];
// $qt3 = $result3['status'];
$total=$quantity2-$quantity;
			//echo $quantity;
	if ( $quantity2 < $quantity )

			{

				echo "<script>alert('Insufficient stock quantity..');location.href</script>";
				//echo "<script>alert('Added to invoice..');location.href</script>";
				echo"<meta http-equiv='refresh' content='0; url=create_cust.php'/>";

	       
			}
			else
			 {
				
				 $sql ="INSERT INTO cus_order (CusName, OrderQuantity,OrderDate, CusAdd,CusEmail,StatusPayment, StockNo)
            VALUES ('$name','$quantity','$date', '$name2','$name3','$cus4','$name4')";
				$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
				if($query)
				{

                $sql2 = "UPDATE stock SET StockQuantity='$total' where StockNo='$name4'";
                $query2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
				//echo "<script>alert('Insufficient stock quantity')";
				echo "<script>alert('Added to invoice..');location.href</script>";
	     		echo "<meta http-equiv='refresh' content='0; url=custorder.php'/>";
	     		}

	     		else
	     		{
	     			echo "<script>alert('Insert fail');location.href</script>";
	// 			echo "<meta http-equiv='refresh' content='0; url=create_cust.php'/>";
	     		}


			}


 		
	// if ( $quantity > $qty )
	// 		{
	// 			echo "<script>alert('Insufficient stock quantity')";
	// 			echo "<meta http-equiv='refresh' content='0; url=create_cust.php'/>";
	// 		}
	// 		else {
			
	// 			echo "<script>alert('Added to invoice')";
	// 			echo "<meta http-equiv='refresh' content='0; url=custorder.php'/>";
	// 		}



}
 ?>
