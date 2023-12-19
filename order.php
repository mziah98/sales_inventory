<?php
include('connection.php');


   
$code = isset($_POST['InNo']) ? $_POST['InNo'] : '';
$qty = isset($_POST['OrderQuantity']) ? $_POST['OrderQuantity'] : '';


$sql3 = "SELECT invoice.InNo,InQuantity,OrderQuantity FROM cus_order,invoice where cus_order.InNo=
invoice.InNo and InNo = '$code' ";
$query3 = mysqli_query($conn,$sql3);
$result3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
$qt3 = $result3['InQuantity'];
			
	if ( $qt3 < $qty )
			{
				echo '<script>alert("Insufficient stock quantity");window.location.href="create_cust.php";</script>';
			}
			else {
			
				echo '<script>alert("Added to invoice");window.location.href="custorder.php";</script>';
			}

?>