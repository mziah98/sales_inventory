
<?php
  //session_start();
   
   $user_check = $_POST['Username'];
   
  include "connection.php";

	$sql = "select * from staff where Username=' $user_check ' ";

	$ses_sql = mysqli_query($conn,$sql);
	
  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);


   //login session
   // $login_session = $row['Username'];

   // //nk bgtau klau tkde username session pergi mana
   // // kena ltk username kt semua tempat
   
   // if(!isset($_POST['Username'])){
   // header("location:login.php");
   
   //}
?>
<!-- Begin Page Content >
<div class="container-fluid">

  <! Page Heading >
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  
    </div-->

    

   
<html>
<head>
<title>Staff</title>

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="">
</head>


<?php include 'menu.php'; ?>

<body>

<br><br><br>



</ul>
</br>


 
<!--?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bakery";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	

	$sql2 = "SELECT * FROM staff WHERE staff_name LIKE '%".$strKeyword."%' ";

	$query2 = mysqli_query($conn,$sql2);

?-->

<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "sales";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM staff where Username = '$user_check'";

	$query = mysqli_query($conn,$sql);

?>

<!-- //pakai div class baru bleh ke center -->

<div class="border2">
</br>

 <?php
if($_POST['Username'] == true){ 
}
else {
    echo '<a href="login.php">Login</a>';
}
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

<!--  <table  border="1" width="100%" cellpadding="1" cellspacing="0"> -->
 <h2><center>Your Profile</h2></center><br>
<center><form method="post" action="edituser.php?Username=<?php echo $result["Username"];?>">
 
 			<!-- //list ni pon ikut turutan update tu -->
 
              <table  border="1" width="90%"    cellpadding="1" cellspacing="0">
                <tr align="center" float="right">
              
				  <td align="center" width="3%"  style="background-color: ;">Staff Id</td>
                  <td align="center" width="10%" style="background-color: ;">Username</td>
                  <td align="center" width="20%" style="background-color: ;">Name</td>
                 
                  <td align="center" width="15%"  style="background-color: ;">Contact Number</td>
                   <td align="center" width="30%" style="background-color: ;">Address</td>
				  <td align="center" width="10%"  style="background-color: ;">Position</td>
				   <td  align="center" width="20%"  style="background-color: ;">Email</td>
				 
                  <td  align="center" width="20%" style="background-color: ;">Action</td>
                </tr>
				
				<tr align="center">
									
                                   <td align="center"><?php echo $result["StaffNo"];?></td>
									<td align="center"><?php echo $_POST["Username"];?></td>
									<td align="center"><?php echo $result["StaffName"];?></td>
									
									<td align="center">+60<?php echo $result["StaffPhoneNo"];?></div></td> 
									<td align="center"><?php echo $result["StaffAdd"];?></td>
									<td align="center"><?php echo $result["StaffPosition"];?></td>
									<td align="center"><?php echo $result["StaffEmail"];?></td>
								   <td>     
 <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button>
             
	</center> </form>
</td>
</tr>
</table>
</form>
</table>

</div>
</body>
</html>

	
   <!--form action="delete_staff.php" method="post">
	 
	 
	  
    <h6 class="m-0 font-weight-bold text-primary"> 
            <a button type="button" href="delete_staff.php?staff_id=" class="btn btn-danger"  data-target="#delete">
				Delete </a>
            </button>
			
			
			
			
			
			</form-->
			
			
			

			  <!--form action="editindex.php" method="post">					 
               
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit"  name="editindex" class="btn btn-success" <a href="editindex.php?staffId=value="<!-?php echo $result2["staff_id"];?>> EDIT</button></a>
               </form-->
           
              

								<?php
	}
	?>
								
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
   
    <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="edituser.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
             <div class="form-group">
              <label for="title">Username</label>
              <input type="text" name="updateUsername" id="updateUsername" placeholder="Enter name"class="form-control"  maxlength="100"
                required>
            </div>
            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" name="updateStaffName" id="updateStaffName" placeholder="Enter name"class="form-control"  maxlength="100"
                required>
            </div>
            <div class="form-group">
              <label for="title">Contact Number</label>
              <input type="Number" name="updateStaffPhoneNo" id="updateStaffPhoneNo" class="form-control"  maxlength="30"
                required>
                </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="updateStaffAdd" id="updateStaffAdd" class="form-control" placeholder="Enter address" maxlength="100" required>
            </div>
           
           
            <div class="form-group">
              <label for="title">Position</label>
              <input type="text" name="updateStaffPosition" id="updateStaffPosition" class="form-control" placeholder="Enter position"   maxlength="15"
                required>
            </div>

            	 <div class="form-group">
              <label for="title">Email</label>
              <input type="email" name="updateStaffEmail" id="updateStaffEmail" class="form-control" placeholder="Enter email" maxlength="10"
                required>
             </div>

            
      

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        //ikut turutan update form yg kt atas
        $('#updateId').val(data[0]);
         $('#updateUsername').val(data[1]);
        $('#updateStaffName').val(data[2]);
        $('#updateStaffPhoneNo').val(data[3]);
        $('#updateStaffAdd').val(data[4]);
        $('#updateStaffPosition').val(data[5]);
        $('#updateStaffEmail').val(data[6]);

            
        
        

        });
        
    });
  </script>
</body>

</html>
 
