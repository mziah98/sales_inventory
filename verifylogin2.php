<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- <title>Bootstrap Login Form</title> -->
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
 <!--  <link href="css/styles.css" rel="stylesheet"> -->
 </head>
 <body>

<?php
 error_reporting(E_ALL);
session_start();
include 'connection.php';


// $conn=mysqli_connect('localhost','root','') or die('server down') ;
// mysqli_select_db('sales',$conn) ;

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = ($var);
   // $var = strip_taghtmlentitiess($var);
    return $var;
}

if (isset($_POST['login'])) 
{
  $user =sanitizeString ($_POST['Username']);

  $password = sanitizeString ($_POST['Password']);
 $akses=sanitizeString ($_POST['StaffPosition']);

  

  if ($akses == "admin")

  {
  $sql = "SELECT * FROM staff WHERE Username='$user' AND Password='$password'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);


    if ($row == 1)

  {
     echo "<script>alert('You have successfully login');";
    echo "window.location.href = 'profile.php';</script>";
      
  }
  else
  {
   
      echo "<script>alert('Username or Password incorrect,please try again');";
      echo "window.location.href = ('login.php');</script>";
      exit;
  }
  }
 elseif ($akses == "sales manager")
 {
  $sql = "SELECT * FROM staff WHERE Username='$user' AND Password='$password'";
   $query = mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);


    if ($row == 1)
    {
     echo "<script>alert('You have successfully login');";
    echo "window.location.href = 'profile2.php';</script>";
  }
  else
  {
   echo "<script>alert('Username and Password incorrect,please try again');";
      echo "window.location.href = ('login.php');</script>";
      exit;
  }
 
  }

}
?>
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html> -->
