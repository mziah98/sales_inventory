
<?php
session_start();
include "connection.php";

$dt= date("Y");
$query = "SELECT EXTRACT( MONTH FROM `OrderDate` ) as 'month',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo 
AND OrderDate BETWEEN ('$dt-01-01') AND ('$dt-12-31')
      GROUP BY month";
$result1 = mysqli_query($conn,$query) or die (mysqli_error($conn));

$query1 = "SELECT EXTRACT( year FROM `OrderDate` ) as 'year',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo   GROUP BY year";
$result10 = mysqli_query($conn, $query1) or die (mysqli_error($conn));

$sql2 = "SELECT StockName, count(StockName) as total  FROM stock,cus_order where cus_order.StockNo=Stock.StockNo group by StockName ORDER BY total DESC limit 5";
$result9 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));

$sql3 = "SELECT cus_order.OrderNo,stock.StockNo,CatName,SUM(OrderQuantity) AS number FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo  GROUP BY CatName ORDER BY number DESC limit 5";
$result11 = mysqli_query($conn,$sql3) or die (mysqli_error($conn));


?>
  <?php include 'menu2.php'; ?>
  <br><br><br><br><br>
<html>
<head>
	<title>Report</title>
</head>
<div>
  <table border="3" align="center"  cellpadding="30" width="50%" cellspacing="20">
  <td align="center">
<head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart5);

      function drawChart5() {

        var data5 = google.visualization.arrayToDataTable([
          ['Category', 'Most Category of Items Sold'],
          <?php
        while ($row10=mysqli_fetch_assoc($result11)){
        ?>
        ['<?php echo $row10['CatName']?>', <?php echo $row10['number']?>],
        <?php
        }
        ?>
        ]);

        var options5= {
          title: 'Top 5 Most Category Sold'
        };

        var chart5 = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart5.draw(data5, options5);
      }
    </script>
  </head>
  <body>
    <div id="piechart3" style="width: 100%; height: 100%;"></div>
  </body>
  </td>
  </tr>
  </table>

<div>
  <table border="3" align="center"  cellpadding="30" width="50%" cellspacing="20">
  <td align="center">
<head>
  
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type of Items', 'Most Items Sold'],
          <?php
        while ($row9=mysqli_fetch_assoc($result9)){
        ?>
        ['<?php echo $row9['StockName']?>', <?php echo $row9['total']?>],
        <?php
        }
        ?>
        ]);

        var options = {
          title: 'Top 5 Most Items Sold'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart2" style="width: 100%; height: 100%;"></div>
  </body>
  </td>
  </tr>
  </table>


</body>

</html>

<div>
  <table border="2" align="center"  cellpadding="30" width="50%" cellspacing="15">
<tr>
    <td align="center">
<head>
<body>
 
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales by Month'],
      <?php
        
        while ($row=mysqli_fetch_assoc($result1)){
        $month=$row['month']; // month in number
        $displayName=date("F",mktime(0,0,0,$month,10)); // function to convert number to name 
        ?>
        ['<?php echo $displayName?>', <?php echo $row['Total_Sales']?>],
        <?php
        }
      ?>
        ]);

        var options = {
          title : 'Top Sales by Month',
          vAxis: {title: 'Total Sales'},
          hAxis: {title: 'Month'},
          series: {0: {type: 'line'}} 
                 };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div3" style="width: 100%; height: 300%;"></div>
  </body>
  </td>

  <div>
  <table border="3" align="center"  cellpadding="30" width="50%" cellspacing="20">
<tr>
  <td align="center">
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization2);

      function drawVisualization2() {
        // Some raw data (not necessarily accurate)
        var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Sales by Year'],
		  <?php
				
				while ($row2=mysqli_fetch_assoc($result10)){
				$year=$row2['year']; // month in number
				?>
				['<?php echo $year?>', <?php echo $row2['Total_Sales']?>],
				<?php
				}
			?>
        ]);

        var options2 = {
          title : 'Top Sales by Year',
          vAxis: {title: 'Total Sales'},
          hAxis: {title: 'Year'},
          series: {0: {type: 'line'}}        };

        var chart2 = new google.visualization.ComboChart(document.getElementById('chart_div4'));
        chart2.draw(data2, options2);
      }
    </script>
  </head>
  <body>
    <div id="chart_div4" style="width: 100%; height: 384;"></div>
  </body>
  </td>
