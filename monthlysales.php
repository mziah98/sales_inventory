<?php
session_start();
include "connection.php";
 
//$purname= $_GET['PurID'];
$dt= date("Y");
$sql = "SELECT EXTRACT( MONTH FROM `OrderDate` ) as 'month',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo 
AND OrderDate BETWEEN ('$dt-01-01') AND ('$dt-12-31')
      GROUP BY month";

$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
// $sql1 = "SELECT * FROM cus_order";
// $execute=mysqli_query($conn, $sql1) or die (mysqli_error($conn));
// //$sqlCount = "select max(PurName) as HighestRequest, min(PurName) as MinimumRequest, PurName from purchase group by PurName ";
// //$executeCount = mysqli_query($conn, $sqlCount) or die (mysqli_error($conn));
// $sqlTotal = "select sum(OrderQuantity) * sum(TotalPrice)  as countTotal  from cus_order";
// $executeTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Sales</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
 
    <!-- external css -->
     <link rel="stylesheet" type ="text/css" href="bStyle.css">
</head>
<body>

<!-- main box of content-->
      <div class="report">
   
   <!-- box of header-->
    <td><a href="home.php"></a></td>
          <div class="header" align="left">
                
              </div>    
   
    
          <!-- box of content -->
          <div class="Mcontent" align="center">
		  <?php include 'menu2.php'; ?>
    <td>
	
	
             <!--<form action="report.php" method="post">-->
			 <!--  <form action="" method="post">
                <br>
			          <td align="center" width="30%"> Items Name
                <input class="Minput" type="text" name="PurName" ></td>
                
  			        <input id="myInput" onkeyup="myFunction()" class="Minput" type="date" name=search placeholder=""  required>
               <input type="submit"  name ="search" value="search" required>
                  </form> -->
				   </div>
           
       </td>
    
    <div class="Mcontent" align="center" float="right" >

<br><br><br><br>
    <h1><b>Monthly Sales</h1>
  <center> <table border="1" cellpadding="5" cellspacing="0" width="80%" align="right">
    <tr>
    <br></br>
    <td align="center" height="50" width="3%">No.</td>
     <td align="center" height="50" width="5%">Order No</td>
     
	   <td align="center" height="50" width="10%">Order Quantity</td>
	   <td align="center" height="50" width="10%"> Price (RM) </td>
	   <td align="center" height="50" width="10%">Total Price (RM) </td>
     <td align="center" height="50" width="10%">Month </td>
	    <td align="center" height="50" width="10%">Average Sales (RM)</td>
     
     <td align="center" height="20" width="10%">Total Sales (RM)</td>
     <!--<td align="center" height="50" width="20%">Highest Request</td>
     <td align="center" height="50" width="20%">Minimum Request</td>-->
    </tr>
	 
    <?php
	
    $rowNumber=1;
    while($row = mysqli_fetch_assoc($result)){
	
    ?>
    
                <tr>
                   <td align="center"><?php echo $rowNumber;?></td>
                  <td align="center" ><?php echo $row["OrderNo"];?>
         
					<td align="center" ><?php echo $row["Quantity"];?></td>
					<td align="center" ><?php echo$row["Sell"];?></td>
						<td align="center" ><?php echo $row["total"];?></td>
              <td align="center" ><?php echo $row["month"];?></td>
				 	<td align="center" ><?php echo number_format((float) $row["average"],2,'.','');?></td> 
           <td align="center" ><?php echo number_format((float) $row["Total_Sales"],2,'.','');?></td>  
      </tr>
               </tr>
         <?php
         $rowNumber++;
         }
         
         ?>
   
           
    ?>
    </table>
    </center> 
	
 <!-- <?php
  //while ($row = mysqli_fetch_assoc($executeCount)){
 ?>-->
 <!-- <table border="0" cellpadding="8" cellspacing="5" align="center">
    <tr>
    <td align="right">Minimum Item Purchase :</td>
    <td align="center" ><?php //echo $row["MinimumRequest"];?></td>
	<td align="right">Maximum Item Purchase :</td>
    <td align="center" ><?php //echo $row["HighestRequest"];?></td>
	
	 
    </tr>
   <p><input type="hidden" name="PurName" value="<?php //echo $row["MinimumRequest"];?>"></p>
   <p><input type="hidden" name="PurName" value="<?php //echo $row["HighestRequest"];?>"></p>-->
 <!-- <?php
 // }
  ?>-->
 
              </table>
     
     <table border="0" cellpadding="5" cellspacing="0" width="98%" align="center">
    <tr>
     <br></br>
     
    
    </tr>
    </table>
   </form>


     <br></br>  <br></br>



   <?php
  include "chartmonthly2.php";
   ?>
<br/>
    <?php
  include "chartmonthly.php";
   ?>
  <!--  <form action="" method="post">
   
   <tr>
					<br></br>
					
					
					<td><input class="btn" type="submit" name="BACK" value="BACK" ></td>
					
				</tr>
				</table>
				
				<script>function goBack() {
					window.history.back()
				}</script> -->
  </div>
  </div>
</body>
</html>
<html>
