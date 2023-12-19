

<?php

session_start();

if(!isset($_SESSION['Username']))
{
  $_SESSION['Username'] = $_POST['Username'];
  $_SESSION['Password'] = $_POST['Password'];

}

include ("connection.php");

$sql= "SELECT * FROM staff WHERE Username ='" .$_SESSION['Username']."' AND Password='" .$_SESSION['Password']."'";

$result = $conn->query($sql);
  $data = $result->fetch_assoc();

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

  <?php include("menu.php");?>

<br/> <br/> <br/>   <br/> <br/>   <br/>
<center> <h2>YOUR PROFILE</h2></center>
<br/>   <br/>
 <form method="post" action="update_profile.php">

 
 <table align="center" border="2" width="60%" cellpadding="20" cellspacing="3">
                  
      <tr>
        <td width="20%" style="font-weight:bold;">Name:</td>
       <!--  <input type="hidden" name="Sta" value="<?php// echo $data['id'] ?>"><br> -->
        <td><input type="text" name="StaffName" value="<?php echo $data['StaffName'] ?>"></td>
      </tr>
          <tr>
        <td width="20%" style="font-weight:bold;">Address:</td>
        <td><input type="text" name="StaffAdd" value="<?php echo $data["StaffAdd"];?>"></td>
      </tr>
      <tr>
        <td width="20%" style="font-weight:bold;">Email:</td>
        <td><input type="text" name="StaffEmail" value="<?php echo $data["StaffEmail"];?>"></td>
      </tr>

      <tr>
        <td width="20%" style="font-weight:bold;">Phone Number:</td>
        <td><input type="number" min="0" name="StaffPhoneNo" value="<?php echo $data["StaffPhoneNo"];?>"></td>
      </tr>

        <tr>
        <td width="20%" style="font-weight:bold;">Position:</td>
        <td><input type="text" name="StaffPosition" value="<?php echo $data["StaffPosition"];?>"></td>
      </tr>

      
                <tr>
                  <td></td>
            <td> <input class="btn" type="submit" value="EDIT"  name="update">
          <input class="btn" type="reset" value="RESET">
         <!--  <input class="btn" type="submit" name="submit" value="BACK" >
          -->
            </td> 

          </tr>


        
  </form>
        <!-- 
        <script>function goBack() {
          window.history.back()
        }</script>
      </form>
               -->

                
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
</form>
</body>
</html>
   
 