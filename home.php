<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  body{
    background: #eeeeee;
    font-family: 'Open Sans', sans-serif;
   background-image: url("image/gg.jpg");
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: 100%;
  }
    .form-inline {
        display: inline-block;
    }
  .navbar-header.col {
    padding: 0 !important;
  } 
  .navbar {
    font-size: 14px;
    background: #fff;
    padding-left: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #d6d6d6;
    box-shadow: 0 0 4px rgba(0,0,0,.1);   
  }
  .navbar .navbar-brand {
    color: BLUE;
    padding-left: 0;
    font-size: 20px;
    padding-right: 50px;
    //font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
     font-weight: bold;
  }
  .navbar .navbar-brand b {
    font-weight: bold;
    color: BLUE;
  }
  .navbar ul.nav li {
    font-size: 96%;
    font-weight: bold;    
    text-transform: uppercase;
  }
  .navbar ul.nav li.active a, .navbar ul.nav li.active a:hover, .navbar ul.nav li.active a:focus {
    color: #f04f01 !important;
    background: transparent !important;
  }
  .search-box {
        position: relative;
    }
  .search-box input.form-control, .search-box .btn {
    font-size: 14px;
    border-radius: 2px !important;
  }
  .search-box .input-group-btn {
    padding-left: 4px;    
  }
  .search-box input.form-control:focus {
    border-color: #f04f01;
    box-shadow: 0 0 8px rgba(240,79,1,0.2);
  }
  .search-box .btn-primary, .search-box .btn-primary:active {
    font-weight: bold;
    background: #f04f01;
    border-color: #f04f01;
    text-transform: uppercase;
    min-width: 90px;
  }
  .search-box .btn-primary:focus {
    outline: none;
    background: #eb4e01;
    box-shadow: 0 0 8px rgba(240,79,1,0.2);
  }
  .search-box .btn span {
    transform: scale(0.9);
    display: inline-block;
  }
  .navbar .nav-item i {
    font-size: 18px;
  }
  .navbar .dropdown-item i {
    font-size: 16px;
    min-width: 22px;
  }
  .navbar .nav-item.open > a {
    background: none !important;
  }
  .navbar .dropdown-menu {
    border-radius: 1px;
    border-color: #e5e5e5;
    box-shadow: 0 2px 8px rgba(0,0,0,.05);
  }
  .navbar .dropdown-menu li a {
    color: #777;
    padding: 8px 20px;
    line-height: normal;
    font-size: 14px;
  }
  .navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
    color: #333;
  }
  .navbar .navbar-form {
    border: none;
  }
  @media (min-width: 992px){
    .form-inline .input-group .form-control {
      width: 225px;     
    }
  }
  @media (max-width: 992px){
    .form-inline {
      display: block;
    }
  }
</style>
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-lg navbar-light">
  <div class="navbar-header d-flex col">
    <a class="navbar-brand" href="#">SALES  <b>INVENTORY (SIS)</b></a>     
    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
      <span class="navbar-toggler-icon"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- Collection of nav links, forms, and other content for toggling -->
  <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
    <ul class="nav navbar-nav">
      <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link">About</a></li>      
      <li class="nav-item dropdown">
        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">LOGIN AS <b class="caret"></b></a>
        <ul class="dropdown-menu">          
          <li><a href="login.php" class="dropdown-item">Admin</a></li>
          <li><a href="login.php" class="dropdown-item">Sales Manager</a></li>
          
        </ul>
      </li>
     <!--  <li class="nav-item active"><a href="#" class="nav-link">Portfolio</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
   <!  </ul> -->
    <!-- <form class="navbar-form form-inline navbar-right ml-auto">
      <div class="input-group search-box">
        <input type="text" class="form-control">
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary"><span>Search</span></button>
        </span>
      </div>
    </form>    --> 
  </div>
</nav>
</body>
</html>                            