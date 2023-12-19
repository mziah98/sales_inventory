<!DOCTYPE html>
<html> 
<head>
<title>CSS Layout</title>
<link rel="stylesheet"  type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style >
  body {
  font-family: "Lato", sans-serif;
  font-color:black;
  background-color: 
#FFFFFF ;
}

/*.wrapper
{
  margin: 0%;
  width:100%;
  height: 0%;
  text-align: center;
   background-color: #E5E4E2;*/

}
.header
{
  background-color: #E5E4E2;
  padding: 20px;
  color: white;
  /*//text-align: center;*/
  float:right;
}
.header h1 { margin:0; font-family: 'monotype corsiva'; font-size: 30pt }
/* Fixed sidenav, full height */



.sidenav {
  height: 100%;
  width: 280px;
  position: fixed;
  z-index: 1;
  top: 0%;  //dia pnya size
  left: 0;
  background-color:   
#A9A9A9;
  overflow-x: hidden;
  //padding-top: 10%;
  //border-bottom: : solid black 2px;

// font-color: #2C2C2F;
 text-align: center;

}

/*.sidenav a {
//border-bottom: : solid 2px;
 font-color: black;
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
   
  display: block;
}
*/

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 5px 8px 6px 16px;
  padding-top: 10%;
  text-decoration: none;
  font-size: 20px;
  color: #1C1C1C;
  display: block;
  border:none;
  background: none;
  width: 100%;
  text-align: center;
  cursor: pointer;
  outline: none;
  //font-color:black;
   //font-family: arial;
   //text-decoration: bold;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #A9A9A9;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.container
{
  padding-left: 5%;
  padding-top: 5%;
}

.border1
{
  text-align: center;
  width: 90%;
  padding-left: 20%;
 
}
.container2
{
  width:50%;
}

.form1
{
  text-align: center;
  width: 50%;
  padding-left: 20%;
 
}

.border2
{
  text-align: center;
  width: 100%;
  padding-left: 15%;
 // margin-left: 30%;
 // float: right;
 
}

//utk searching
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}
</style>
<body>
<!-- <div class="wrapper"> -->

<!-- <div class="header"> -->
<!--h1>Sales Inventory System</h1-->
<!-- <ul class="topnav">
    <li><a  href="logoutt.php" onClick="return confirm('Are you sure to log out?')">Logout</a></li>
  <li><a href="feedback.php">Feedback</a></li>
    <li><a  href="cart.php">Your Cart</a></li>
    <li><a href="product.php">Product</a></li>
    <li><a href="my_account.php">My Account</a></li>
    <li><a href="myorder.php">My Order</a></li>
    <li style="float: left; padding-left: 15%; margin-top:10px; margin-left:50px; margin-bottom:10px;"><img src="logo2.png"  width="100" height="100"></li>

  </ul>

</div> -->



<div class="sidenav">
  <img src="logo2.png" width="200" padding-top="0" height="200"  />

  <a href="overview.php">Overview</a>
  <a href="profile2.php">Profile</a>
  <a href="supplierlist2.php">Supplier</a>
    <a href="invoice.php">Invoice from supplier</a>
     <a href=" custorder2.php"> View Customer Orders </a> 
  
  <!--  <a href="purorder.php">Purchase Orders</a>
 -->
<!-- 
    <button class="dropdown-btn">Invoice
    <i class="fa fa-caret-down"></i>
      </button>
     <div class="dropdown-container">
  <a href="invoice.php">Invoice from supplier</a>
  <a href=" custorder.php">Customer Orders Invoice</a> 
  
  </div -->

  
    <button class="dropdown-btn">Stock 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="listofstock.php">Items</a>
   <!--  <a href="stockbyinvoice.php">Received by Invoice</a>
 -->
 

 <button class="dropdown-btn">Category
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="insertcat.php">List of category</a>
    <a href="stationary.php">Stationary</a>
    <a href="ff.php">Fire Fighting System</a>
    <a href="machionary.php">Machionary</a>
    <a href="c&s.php">Civil&Structure</a>
    <a href="m&e.php">Mechanical&Electrical</a>    
    <a href="housekeeping.php">Housekeeping</a>
    <a href="comp.php">Computer</a>
  </div>

  
</div>
  
   <!--  <button class="dropdown-btn">Invoice
    <i class="fa fa-caret-down"></i>
      </button>
     <div class="dropdown-container">
 
  <a href="custinvoice.php">Customer Invoice</a>
  <a href="supinvoice.php">Supplier Invoice</a>
  </div> -->
<!-- 
 <button class="dropdown-btn">Sales Report
    <i class="fa fa-caret-down"></i>
      </button>
  <div class="dropdown-container">
  <a href="salesorder.php">Sales Order</a>
  <a href="dailysales.php">Daily Sales</a>
 <!-  <a href="weeklysales.php">Weekly Sales</a> 
  <a href="monthlysales.php">Monthly Sales</a>
  <a href="yearlysales.php">Yearly Sales</a>
  </div> -->
<!-- 
 <button class="dropdown-btn">Additional
    <i class="fa fa-caret-down"></i>
      </button>
  <div class="dropdown-container">
    <a href="displayvid.php">Video</a>
    <a href="audio.php">Audio</a>
    
  </div> -->
<a href="logout.php">Logout</a>
</div>
</div>
  

    <!--  <div class="main">
  <h2>Sidebar Dropdown</h2>
  <p>Click on the dropdown button to open the dropdown menu inside the side navigation.</p>
  <p>This sidebar is of full height (100%) and always shown.</p>
  <p>Some random text..</p>
</div> -->
    </div>

    </div>

  </div>


</div>
</div>
</div>

 


<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html>