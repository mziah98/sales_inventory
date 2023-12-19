<?php
error_reporting(E_ALL);
session_start();
include 'connection.php';


function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}

if (isset($_POST['login']))
{
	$username = sanitizeString($_POST['Username']);
	$password = sanitizeString($_POST['Password']);
	//$pos= sanitizeString($_POST['StaffPosition']);

	
	if ($username == "" || $password == "" )
	{
		echo "<script>alert('Please insert your Username and Password');";
			echo "window.location.href = 'login.php';</script>";
	}
	 else
	 {
		//admin
		$query = "SELECT * FROM staff WHERE Username ='$username' AND Password = '$password'  AND StaffPosition = 'admin'"; 
		$result = mysqli_query ($conn, $query) or exit("The query could not be performed");
		if (mysqli_num_rows($result) == 1)
		{
		$_SESSION["Username"] = $username;
		$_SESSION["Password"] = $password;
		$_SESSION["StaffPosition"] = 'admin';
		{
		echo "<script>alert('You have successfully login');";
		echo "window.location.href = 'overview.php';</script>";
			
		}
		}

		//sales manager
		$query = "SELECT * FROM staff WHERE Username ='$username' AND Password = '$password'  AND StaffPosition = 'sales manager'"; 
		$result = mysqli_query ($conn, $query) or exit("The query could not be performed");
		if (mysqli_num_rows($result) == 1)
		{
		$_SESSION["Username"] = $username;
		$_SESSION["Password"] = $password;
		$_SESSION["StaffPosition"] = 'sales manager';
		{
		echo "<script>alert('You have successfully login');";
		echo "window.location.href = 'overview2.php';</script>";
			
		}
		}

		
		else
		{
			echo "<script>alert('Username or Password is invalid');";
			echo "window.location.href = ('login.php');</script>";
			exit;
		}
	
	}
}
?>