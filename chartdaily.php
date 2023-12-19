<?php
 
//session_start();
include "connection.php";

$sql = "SELECT cus_order.OrderNo,stock.StockNo,StockName,OrderQuantity,SellingPrice,OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* SUM(SellingPrice) AS Total_Sales,CatName,SUM(OrderQuantity) as number FROM cus_order,stock,category where stock.StockNo=cus_order.StockNo AND stock.CatNo=category.CatNo group by StockName";	

$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));;
//$result=mysqli_fetch_array($query,MYSQLI_ASSOC);

   if($query)
{
$dataPoints = array();
 while($row = mysqli_fetch_assoc($query))
 {
	$point = array("label" => $row['StockName'],"y" => $row['number']);
	array_push($dataPoints, $point);
 }
 }
?>
<!DOCTYPE HTML>
<html>
<head>

<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">
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
</head>


<?php  
 include"connection.php";
 $query = "SELECT cus_order.OrderNo,stock.StockNo,CatName,SUM(OrderQuantity) AS number FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo  GROUP BY CatName";  
 $result = mysqli_query($conn, $query);  
 ?>  
<body>
<div id="chartContainer" align="center" style="height: 370px; width: 50%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Category', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["CatName"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage based on Items Category Sold',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
               <!--  <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>   -->
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  


 