<?php
 
//session_start();
include "connection.php";

$dt= date("Y");
$sql = "SELECT EXTRACT( year FROM `OrderDate` ) as 'year',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo   GROUP BY year";
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
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",// "light1", "light2", "dark1", "dark2"
	title:{
		text: "Sales of each items"
	},
	axisY: {
		title: "Quantity that have been sold"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		//dataPoints: [     array("label" => $row['PurName'] , "y" => $row['PurQuantity'])
	}]
});
chart.render();
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
</html>


<?php  
 include"connection.php";


$dt= date("Y");
$sql2 = "SELECT EXTRACT( year FROM `OrderDate` ) as 'year',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category,invoice WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo   GROUP BY year";
$query2= mysqli_query($conn,$sql2) or die (mysqli_error($conn));;
//$result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   if($query2)
{
$dataPoints = array();
 while($row = mysqli_fetch_assoc($query2))
 {
  $point = array("label" => $row['year'],"y" => $row['Total_Sales']);
  array_push($dataPoints, $point);
 }
 
}

?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: "Sales by Year"
  },
  axisY: {
    title: "Total Sales"
  },
  data: [{
    type: "line",
    yValueFormatString: "#,##\"\"",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                 