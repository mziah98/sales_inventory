<!DOCTYPE html>
<html>
<head>
	
	</head>
	
<style>

body {
     font-family: Arial, Helvetica, sans-serif;
      background-image: url("pages.jpg");
      background-repeat:no-repeat;
      background-size: 100%;
    }
*    {box-sizing: border-box;
     }

  form { width:60%;}
	form {  padding: 2px 2px 2px 2px;}
	form {   margin: 150px 20px 0px 250px;} 
	form {text-align:center;}
	form {float:center;}
  form {background-color:#D2C9C9;}
    

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.resetbtn {
  width: auto;
  padding: 20px 20px;
  background-color:#3C7CD4;
}

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
  //float: left;
   width: auto;
  padding: 20px 20px;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
  width: 50%;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .resetbtn, .signupbtn {
     width: 30%;
  }
}
</style>
<body>

<form action="verifyregister.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="StaffName" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Username" required>

    <label for="contact number"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter no phone (e.g = 01xxxxxxxx)" name="StaffPhoneNo" required>

    <br>
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="StaffAdd" required></br>

   <!--  <label for="position"><b>Position</b></label>
    <input type="text" placeholder="Enter Position" name="StaffPosition" required>
 -->
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="StaffEmail" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            name="Password" required>

     <tr>
        
<script>
var myInput = document.getElementById("Password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="Password" required>

     <?php 

    include ('connection.php');
    $query = "SELECT  StaffPosition from staff "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Choose Your Position</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="StaffPosition" name="StaffPosition" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['StaffPosition'];?>"><?php echo $objresult['StaffPosition'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

                </div>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <!--p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p-->

    <div class="clearfix">
	<button type="submit" class="signupbtn" name="StaffNo">Sign Up</button>
      <button type="reset" class="resetbtn">Reset</button>
 
      
    </div>
  </div>



<!-- <form action="" method="post">
 <td><input class="btn" type="submit" name="submit" value="BACK" ></td>
    
        
        <script>function goBack() {
          window.history.back()
        }</script>

      </form> -->
</form>

</body>
</html>
