<?php
session_start();
include "connection.php";

$InNo ="";
if(isset($_GET['InNo'])){
$InNo= $_GET['InNo'];
}
$sql = "SELECT InNo,InName,InPrice,InQuantity,InDate,SupNo,InPrice* InQuantity as Total_Price FROM invoice where InNo='$InNo'";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
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




<style>

</style>
</head>

<body>

  <!-- Navigation >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="https://egavilanmedia.com" target="_blank" >EGavilan Media</a>
    </div>
  </nav>
  <br><br><br-->

  <div class="container">

    <div class="row">
   <!--    <div class="col-md-12 card"> -->
        <div>
          <div class="head-title">
           <!--  -->
        	<br><br><br><br><br>
            <h2 class="text-center"> Invoice</h2>
            <hr>
          </div>
         



          <br><br>
          <table  class="table table-striped"  width="100%">
           
           <!--  <thead class="bg-secondary text-white" width="100%"> -->
            <thead>
              <tr>
                
                <th>Invoice No.</th>
                <th>Supplier No.</th>
                <th>Invoice Name</th>
                
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
              
              

                
              </tr>
            </thead>
            <tbody id="myTable">

             
          
         <!--  </table> -->

            <?php

              
             

            if($result)
            {
             
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
               
                  <td><?php echo $row['InNo']; ?></td>
                    <td><?php echo $row['SupNo']; ?></td>
                <td><?php echo $row['InName']; ?></td>
              
               <!--  <td><?php //echo $row['CatName']; ?></td> -->
                <td>RM <?php echo $row['InPrice']; ?></td>
                  <td><?php echo $row['InQuantity']; ?></td>
                 <td>RM <?php echo $row['Total_Price']; ?></td>
                <td><?php echo $row['InDate']; ?></td>
                
               
                      </tr>
        
             
    <?php
        }
      ?>
                <!--?php
                //mysqli_close($conn);
                ?-->

             
					
<table border="0" cellpadding="5" cellspacing="0" width="98%" align="center">
 <form action="invoice.php" method="post">
				<tr>
					<br></br><br>	<br>	<br>	<br>	<br>	<br>	<br>
					<br>	<br>	<br>	<br>	<br>	<br>	<br> <br>	
					
					<td><input class="btn" type="submit" name="submit" value="BACK" href="invoice.php"></td>
					<td><input title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;" class="btn" type="submit" name="submit" value="PRINT"> </td>
					
				</tr>
				</table>
				
				<script>function goBack() {
					window.history.back()
				}</script>
			</form>
		</div>
		</div>
		            
    <?php
        }
      ?>
	</body>
</html>