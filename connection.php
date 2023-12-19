<?php
      //initialised variable
      $servername = "localhost";
	  $userName = "root";
	  $Password = "";
	  $dbname = "sales";
	  
	  //create connection
	  $conn = mysqli_connect($servername,$userName,$Password,$dbname);
	  
	//check connection
	if(!$conn){
	        die("connection failes" .  mysqli_connect_error());
	}else{
		//echo "connected successfully";
		//echo "connected successfully";
	}
?>