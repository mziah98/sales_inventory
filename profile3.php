

<?php

session_start();

if(!isset($_SESSION['Username']))
{
	$_SESSION['Username'] = $_POST['Username'];
	$_SESSION['Password'] = $_POST['Password'];

}

include ("connection.php");

$sql= "SELECT * FROM staff WHERE Username ='" .$_SESSION['Username']."' AND Password='" .$_SESSION['Password']."'";

$ses_sql = mysqli_query($conn,$sql);
	
  $result = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="table.js"> 

  <!--title>PHP and MySQL CRUD</title-->
<script src="../Static/Js/jquery.min.js"></script>
<script src="../Static/cusJs/854c41fd-b0c1-4922-97e0-4272b9e48b5d.js"></script>
<link href="../Static/cusCss/fbfb6112-32ad-432e-b871-c8b574540823.css" rel="stylesheet">
</head>
<body>

  <?php include("menu2.php");?>

	<br/>	<br/>	<br/> 	<br/>	<br/> 	<br/>
<center> <h2>YOUR PROFILE</h2></center>

 <form method="post" action="profile2.php">
 
 		
 
              <table align="center" border="2" width="60%" cellpadding="20" cellspacing="3">
                <tr align="center">
              
				 
                  <td width="20%" style="font-weight:bold;">Name:</td>
                  <td><?php echo $result["StaffName"];?></td>

                </tr>

                <tr align="center">
                  <td width="20%" style="font-weight:bold ;">Address:</td>
                   <td><?php echo $result["StaffAdd"];?></td>

                		<tr align="center">
                  <td width="20%" style="font-weight:bold ;">Email:</td>
                   <td><?php echo $result["StaffEmail"];?></td>


                </tr>
                <tr align="center">
                  <td width="20%"  style="font-weight:bold ;">Phone:</td>
                  <td><?php echo $result["StaffPhoneNo"];?></td> 

                </tr>
                <tr align="center">
				  <td width="20%"  style="font-weight:bold ;">Position:</td>
				  	<td><?php echo $result["StaffPosition"];?></td>
				 </tr>
              	</form>
				
			 <br>
			 <form action="updateprofile.php" method="post">
			 <tr align="center">
			 	<td></td>
 <td> <input type="submit" value="EDIT"  name="update">
 </form>
          <form action="deletestaff.php" method="post">
         <input type="submit" text-align="center" value="DELETE" onClick="return confirm('Are you sure to delete  your profile?')" href="deletestaff.php?StaffNo=<?php echo $result["StaffNo"] ;?>" name="DELETE">
          </form>
          </td>
  </br>
  </tr>


	
             

              

								
								</table>
								<?php
								mysqli_close($conn);
								?>
				              </tbody>
							  </br>
				            </table>
						</div>
						</br>
  
				     </table>
			 
</body>
   
 