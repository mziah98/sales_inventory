

<?php

    // session_start();
    include "connection.php";
  
    
   
 //$login_session = $row['Username'];
   
   if(isset($_POST['Username']))

   {
     $user=$_POST['Username'];
  $sql = "select Username from staff where Username='$user'  ";

  $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   }


   


?> 




<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<?php include 'menu.php'; ?>
<br>
<!-- <center><h2><marquee width="100%" behavior="alternate"><font face="Vijaya" color="black" font weight= "border"> Welcome <?php //echo $_POST["Username"];?> </font></marquee></h2></center>
 -->
<center><br><br><br>
<h1>Profile</h1>




<div id="border1">
  <table  width="50%" border="0">

<?php

include 'connection.php';

If (isset($_POST['Username']))
{

$user=$_POST['Username'];
 $sql = "SELECT * FROM staff where Username='$user'";
$result = mysqli_query($conn, $sql);

  
   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  

 if($result)
 {

// }
// else {

//        echo " <br>";
//        echo "PLEASE LOGIN FIRST !";
//         echo " <br>";
//          echo " <br>";
//     echo '<a href="login.php">Login</a>';
// }

while($row=mysqli_fetch_assoc($result))
{

?>

<!-- <form name="form1" method="post" action="edituser.php">
 -->    <tr>
      <td width="355" height="47"><strong>Username</strong></td>
      <td width="18">:</td>
      <td width="703"><?php echo $_POST["Username"];?></td>
    </tr>

    <tr>
      <td height="52"><strong>Name</strong></td>
      <td>:</td>
      <td> <?php echo $row["StaffName"];?></td>
    </tr>
    <tr>
      <td height="52"><strong>Contact Number</strong></td>
      <td>:</td>
      <td> +60<?php echo $row["StaffPhoneNo"];?></td>
    </tr>
    <tr>
      <td height="52"><strong>Position</strong></td>
      <td>:</td>
      <td><?php echo $row["StaffPosition"];?></td>
    </tr>
    <tr>
      <td height="48"><strong>Address</strong></td>
      <td>:</td>
      <td><?php echo $row["StaffAdd"];?></td>
    </tr>

    <tr>
      <td height="48"><strong>Email</strong></td>
      <td>:</td>
      <td><?php echo $row["StaffEmail"];?></td>
    </tr>
    <?php
	}
	?>
	</table>


               <!--  <?php
              }
            // else{
            //   echo "<script> alert('No Record Found');</script>";
            // }
          ?> -->

           <?php
  }
  ?> 
	<!-- <?php
	//mysqli_close($conn);
	?> -->
	</tbody>
  </table>
  <br>

                  <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button>
               
<!-- </form> -->
</center>
</div>

</body>
</html>

<!-- UPDATE MODAL -->
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
              <label for="title">Email</label>
              <input type="text" name="updateStaffEmail" id="updateStaffEmail" class="form-control" placeholder="Enter email" maxlength="10"
                required>
             </div>

            <div class="form-group">
              <label for="title">Position</label>
              <input type="text" name="updateStaffPosition" id="updateStaffPosition" class="form-control" placeholder="Enter position"   maxlength="15"
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

        $('#updateId').val(data[0]);
        $('#updateStaffName').val(data[1]);
        $('#updateStaffPhoneNo').val(data[2]);
        $('#updateStaffAdd').val(data[3]);
        $('#updateStaffPosition').val(data[4]);
        $('#updateStaffEmail').val(data[5]);

        
        

        });
        
    });
  </script>
</body>

</html>