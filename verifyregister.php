<?php include('connection.php'); ?>

<?php

	if(isset($_POST['StaffNo']))
		
	{


		//$staff_id = $_POST['StaffNo'];
		$staff_name = $_POST['StaffName'];
		$username = $_POST['Username'];
		$address = $_POST['StaffAdd'];
		$phone = $_POST['StaffPhoneNo'];
		$email = $_POST['StaffEmail'];
		$pwd = $_POST['Password'];
		
		$role = $_POST['StaffPosition'];
		
		$sql = "INSERT INTO staff ( StaffName, StaffPhoneNo, StaffAdd,StaffPosition,StaffEmail,Username,Password) VALUES ( '$staff_name', '$phone', '$address','$role', '$email', '$username','$pwd')";

		$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));

	if($execute)
	{

			echo "<script>alert('You have registered');";
			echo "window.location.href = 'login.php';</script>";
			
		}
	
	
	
		else 
	{
		echo "<script>alert('Please fill the register form');";
		echo "window.location.href = 'signup.php';</script>";
	}
	
}

	
	
?>