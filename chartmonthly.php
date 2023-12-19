<?php
 
//session_start();
include "connection.php";

$dt= date("Y");
$sql = "SELECT EXTRACT( MONTH FROM `OrderDate` ) as 'month',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo 
AND OrderDate BETWEEN ('$dt-01-01') AND ('$dt-12-31')
      GROUP BY month";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));;
//$result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   if($query)
{
$dataPoints = array();
 while($row = mysqli_fetch_assoc($query))
 {
	$point = array("label" => $row['StockName'],"y" => $row['Quantity']);
	array_push($dataPoints, $point);
 }
 }
?>
<!DOCTYPE HTML>
<html>
<head>
<script>

window.onload = function() {
 
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",// "light1", "light2", "dark1", "dark2"
	title:{
		text: "Sales of each items"
	},
	axisY: {
		title: "Quantity that have been sold in a Month"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		//dataPoints: [     array("label" => $row['PurName'] , "y" => $row['PurQuantity'])
	}]
});
chart3.render();
 
}
</script>
</head>
<body>
<div id="chartContainer3" style="height: 300px; width: 60%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                 

<!--  -->

