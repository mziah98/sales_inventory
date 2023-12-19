<!DOCTYPE html>
<html>
<head>
	<!--title>login </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css" -->
</head>
<style>


body {

  background-image: url("pages.jpg");
  background-repeat:no-repeat; 
  background-size: 100%;
  

}
form {border: 1px solid #f1f1f1 ;}
    form { width:40%;}
	form {  padding: 1px 1px 1px 1px;}
	form {   margin: 150px 10px 100px 350px;} 
	form {text-align:center;}
	form {float:center;}
	form {background-color:#D2C9C9;}
	  

input[type=text], input[type=password] {
  width: 40%;
  padding: 15px 20px;
  margin: 8px 0;
  /*display: inline-block;*/
  border: 1px solid #ccc;
 /* box-sizing: border-box;*/
  float: center;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 4px 0;
  border: none;
  cursor: pointer;
  width: auto;
   float: center;
}

button:hover {
  opacity: 0.8;
}

.resetbtn {
  width: auto;
  padding: 14px 20px;
  background-color:#3C7CD4;
}

.imgcontainer {
  text-align: center;
  margin: 15px 0 5px 0;
  float: center;
}

img.avatar {
  width: 30%;
  border-radius: 20%;
 
}

.container {
  padding: 16px;

}

span.psw {
  float: center;
 padding-top: 5px;
 
}

 @media (min-width: 992px){
    .form-inline .input-group .form-control {
      width: 225px;     
    }
  }
  @media (max-width: 992px){
    .form-inline {
      display: block

}
</style>

<body>

<!--div class="header">
    <center><img src="logo3.png" width="100%" height="100%" ></center>
</div>
div class="topnav">
  <a class="active" href="index.php">HOME</a>
</div-->


<form action="verifylogin.php"  method="post">
  <div class="imgcontainer">
  <h1>WELCOME</h1>
    <img src="logo2.png" alt="Avatar" class="avatar">
  </div>

   



                </div>
  <div class="container">
   
	 <br>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Username" required>
	</br>
	
	<br/>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
        
	
	  <!--br/>
      <input type="checkbox" checked="checked" name="remember"> Remember me -->
    </label>
  </div>
  

<button type="submit" href="verifylogin.php?StaffNo=<?php echo $row["StaffNo"];?>" id="login" name="login">Login</button>
    <label>
  <!--div class="container" style="background-color:#f1f1f1"-->
    <button type="reset" class="resetbtn">Reset</button>
 
  <!--/div-->
  	<br/>
		<br>
	   <span class="psw">Forgot <a href="#">password?</a></span>
	    </br>
	
	 
	 <br>
	<span class="psw">Don't have an account? <a href="signup.php">Sign up here</a></span>
	</br>
         
   </label>


<!-- <form action="home.php" method="post">
 <td><input class="btn" type="submit" name="submit" value="BACK" href="home.php"></td>
    
        
        <script>function goBack() {
          window.history.back()
        }</script>

      </form> -->
</form>

</body>
</html>
