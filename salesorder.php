<?php
session_start();
include "connection.php";
 
//$purname= $_GET['PurID'];        
  $sql = "SELECT stock.StockNo,cus_order.OrderNo,CusPhoneNo,StockName,OrderQuantity,OrderQuantity*SellingPrice as total,OrderDate,CatName,
  CusName,CusAdd,CusEmail,SUM(OrderQuantity) as OrderQuantity,StatusPayment,SellingPrice FROM stock,cus_order,category
  where   stock.StockNo=cus_order.StockNo and stock.CatNo=category.CatNo group by OrderDate,StockName";

$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

//$sqlCount = "select max(PurName) as HighestRequest, min(PurName) as MinimumRequest, PurName from purchase group by PurName ";
//$executeCount = mysqli_query($conn, $sqlCount) or die (mysqli_error($conn));
$sqlTotal = "select sum(OrderQuantity) * sum(SellingPrice)  as countTotal  from cus_order  join stock on stock.StockNo=cus_order.StockNo";
$executeTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));

// if(isset($_POST['search']))
// {
// 	$purname= $_POST['PurName'];
// 	$sql = "select  PurID,PurName,PurQuantity,PurPrice,PurQuantity*PurPrice as TotalPrice,PurDate,CusName FROM purchase natural join customer where PurName ='$purname'";;
// 	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
// }
// if(!isset($_POST['search'])){

// $sql = "select  PurID,PurName,PurQuantity,PurPrice,PurQuantity*PurPrice as TotalPrice,PurDate,CusName FROM purchase natural join customer order by PurQuantity asc ";
// $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
// }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Sales Order</title>
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
    <h1><b>Sales Order</h1>
  <center> <table border="1" cellpadding="5" cellspacing="0" width="80%" align="right">
    <tr>
  
     <td align="center" height="50" width="3%">No.</td>
     <td align="center" height="50" width="5%">Order No</td>
      <td align="center" height="50" width="15%">Cat Name</td>
     <td align="center" height="50" width="15%">Customer Name</td>
	   <td align="center" height="50" width="15%">Items name</td>
	   <td align="center" height="50" width="10%">Order Quantity</td>
	   <td align="center" height="50" width="10%"> Price (RM)</td>
	   <td align="center" height="50" width="10%">Total Price (RM)</td>
	   <td align="center" height="20" width="15%">Order Date</td>
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
              <td align="center" ><?php echo $row["CatName"];?>
             <td align="center" ><?php echo $row["CusName"];?></td>
				     <td align="center" ><?php echo $row["StockName"];?></td>
					   <td align="center" ><?php echo $row["OrderQuantity"];?></td>
					   <td align="center" ><?php echo $row["SellingPrice"];?></td>
						 <td align="center" ><?php echo $row["total"];?></td>
					   <td align="center" ><?php echo $row["OrderDate"];?></td>
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
   <table border="0" cellpadding="5" cellspacing="0" width="98%" align="center">
    <tr>
     <br></br>
     
    
    </tr>
    </table>
   </form>

    

    <?php
  while ($row = mysqli_fetch_assoc($executeTotal)){
 ?>
  <table border="0" cellpadding="8" cellspacing="5" align="center">
    <tr>
    <td align="right">Total Sales :</td>
    <td align="center" ><?php echo number_format((float) $row["countTotal"],2,'.','');?></td> 
  
    </tr>
    <p><input type="hidden" name="total" value="<?php echo $row["countTotal"];?>"></p>
   
  <?php
  }
  ?>
 
              </table>
     
    





   <?php
  include "chartsales.php";
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
