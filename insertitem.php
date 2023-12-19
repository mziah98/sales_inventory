<?php
session_start();
include "connection.php";
if(isset($_POST['insertitem'])){
    $name = $_POST['StockName'];
	$quantity = $_POST['StockQuantity'];
	$weight = $_POST['StockWeight'];
	$group = $_POST['StockGroup'];
  $category = $_POST['StockCat'];
  $price = $_POST['StockPrice'];  
  $receive = $_POST['StockReceive'];
	$image = $_POST['Image'];
	
	//if($password == $confirmPassword){
	
	$sql ="INSERT INTO stock(StockName,StockQuantity,StockPrice,StockReceive,StockCat,StockReceive,Image)
  VALUES ('$name','$quantity','$price','$receive', '$category','$receive','$image')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=listofstock.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Success!');</script>";
		 }
	
}
 ?>
<!DOCTYPE html>
<html> 
<head>
	<title>CSS Layout</title>
	<link rel="stylesheet" href="insert.css" type="text/css">
</head>

<body>
    <!-- main box of content -->
      <div class="submit">
          <!-- box of header -->
          <div class="header">
            
          </div>
      <?php include 'menu.php'; ?>
          <div class="Mcontent">
            <br><br><br><br>
            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#1168da">Add New Item</font></h2></td>
              <td><hr></td>
			  
            
	
            <form action="" method="post">
              <table align="center" border="0" width="90%" cellpadding="5" cellspacing="5">
			  
                <!--?php 

    include ('connection.php');
		$query = "SELECT * FROM category "; 
		$result = mysqli_query ($DBcon, $query) or exit("The query could not be performed");
    
  ?-->	
   
   
  <div class="container">
  <center> <name="category"><b>Category</td></b> </center>
  
	</br></br>
    <center><select id="category" name="category" input class="Minput"  required ></center>
    <center> <option value=""></option></center>
	
    <?php 
    while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['category_id'];?>"><?php echo $objresult['description'];?></option>
    <?php	
    }
    ?>
					  </div>
    </select>
	</br>
	</br>
			
                <tr>
                  <td align="center" width="30%"><b>Item's Name</td></b>
                  <td><input class="Minput" type="text" name="StockName" required></td>
                </tr>
			
                <tr>
                  <td align="center" width="30%"><b>Image</td></b>
                  <td><input class="Minput" type="file" name="Image" required></td>
				   <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                </tr>

                 <tr>
                  <td align="center" width="30%"><b>Price</td></b>
                  <td><input class="Minput" type="number" name="price" step="0.01" required></td>
                </tr>
				 <tr>
                  <td align="center" width="30%"><b>Quantity</td></b>
                  <td><input class="Minput" type="number" name="StockQuantity"  min="1" required></td>
                </tr>

                <tr>
                  <td align="center" width="30%"><b>TotalPrice</td></b>
                  <td><input class="Minput" type="number" name="StockPrice*Quantity" step="0.01" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%"><b>Weight</td></b>
                  <td><input class="Minput" type="Date" name="StockWeight" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%"><b>Category</td></b>
                  <td><input class="Minput" type="number" name="StockCat"  required></td>
                </tr>

         <tr>
                  <td align="center" width="30%"><b>Group</td></b>
                  <td><input class="Minput" type="number" name="StockGroup"  required></td>
                </tr>

          <tr>
                  <td align="center" width="30%"><b>Stock Received</td></b>
                  <td><input class="Minput" type="number" name="StockReceive"  required></td>
                </tr>
				
          
                  <td></td>
                  <td><input class="submitbtn" href="listproduct.php" type="submit" name="submit" value="submit"></td>
     	
                   <td></td>
                  <td><input class="resetbtn" type="reset" name="insertproduct" value="reset"></td>
               
				
</form>	
				
				
 			 
              </table>
           <!-- </form>-->
			
  </body>

</html>


  <!--tr>
    <center><button id="btn2" type="submit" name="insertstock">Submit</button> <button id="btn2" type="reset">Reset</button></center>
    
	</tr-->
