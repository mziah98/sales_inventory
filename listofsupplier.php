<?php

 
   //ini_set('display_errors', 1);
   //error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "sales";

   
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "sales";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM supplier ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>

	


<html>
<head>
<title>List of Supplier</title>
<link rel="stylesheet" type="text/css" href="insert.css">
</head>

 <?php include 'menu.php'; ?>
<!--?php 

if($_SESSION['staff_name'] == true){ 
}
else {
    echo '<a href="../login.php"><span>Login/Register</span></a>';
}
?>
 <div class="container">
          <!-- box of header -->
          
		  
		  <!--?php
			if(mysqli_num_rows($result)>0){
			?-->

<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>

<ul class="topnav1">
<p> Welcome! <strong><!--?php echo $_SESSION['staff_name'];?></strong></p>
<!--a href="../logout.php" >Logout</a-->
</ul>
</br>

<div id="border2">
 <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <center><input name="txtKeyword" type="text2" id="txtKeyword" placeholder="Search Supplier Name.." value="<?php echo $strKeyword;?>"></center>
  </form>
  </br>
</div>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "sales";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	

	$sql = "SELECT * FROM supplier WHERE SupName LIKE '%".$strKeyword."%' ";

	$query = mysqli_query($conn,$sql);

?>



<h2 align="center">List of Supplier</h2>
<table id="tbl"<table align="center" border="1" width="100%" cellpadding="5" cellspacing="0">
<thead>
			                <tr>
									<th>No</th>
				                  <th>Id</th>
				                  <th>Supplier Name</th>
				                  <th>Company</th>
				                  
                                   <th>Address</th>
								  <!--th>Date Inserted</th-->
                                  <th>Contact Number</th>
                                   <th>Email</th>
								 
								  
                                 
				                </tr>
				              </thead>
				              <tbody>
				                 <?php
								 $rowNumber = 1;
								while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
								{
								?>
								  <tr>
								  <td><?php echo $rowNumber;?></div></td>
									<td><?php echo $result["SupplierNo"];?></div></td>
									<td><?php echo $result["SupName"];?></td>
                                    <td><?php echo $result["SupCompany"];?></div></td>
									<td><center><?php echo $result["SupAdd"];?></center></td>
									
                                    <td><center><?php echo $result["SupPhoneNo"];?></center></td>
									<td><center><?php echo $result["SupEmail"];?></center></td>
									
					
      
<td>





<!-- DataTales Example -->
<form action="editsupplier.php" method="post">					 
               
                    
                    <a  href="editsupplier.php?SupNo=<?php echo $result["SupNo"] ;?>" name="edit_btn" class="btn btn-success"> EDIT</button></a>
              
        </form>
			
   <form action="" method="post">
	 
	 
	  
    <h6 class="m-0 font-weight-bold text-primary"> 
            <a button type="button" href="deletesupplier.php?SupNo=<?php echo $result["SupNo"] ;?>" class="btn btn-danger"  data-target="#delete">
				Delete </a>
            </button>
			</form>
    </h6>
	
	
 

 
    
									
									
							  <?php
				 $rowNumber++;
				 }
				 ?>
								  
								
								</table>
								<?php
								mysqli_close($conn);
								?>
				              </tbody>
				            </table>
							</br>
							</br>
							
							
							
							<?php 
 

				if (isset($_SESSION['error']))
				{
					echo "<span id=\"error\"><p>" . $_SESSION['error'] . "</p></span>";
					unset($_SESSION['error']);
				}
				?>
				
