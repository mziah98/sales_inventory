<?php
 
//session_start();
include "connection.php";

$dt= date("Y");
$sql = "SELECT EXTRACT( MONTH FROM `OrderDate` ) as 'month',cus_order.OrderNo,stock.StockNo,CatName,category.CatNo,StockName,SUM(OrderQuantity) as Quantity,SUM(stock.SellingPrice) as Sell, OrderQuantity * stock.SellingPrice as total,OrderDate,IFNULL(SUM(OrderQuantity),0)* (SUM(stock.SellingPrice)) AS Total_Sales,SUM(OrderQuantity)* SUM(stock.SellingPrice)/30 as average FROM cus_order,stock,category WHERE cus_order.StockNo=stock.StockNo AND category.CatNo=stock.CatNo 
AND OrderDate BETWEEN ('$dt-01-01') AND ('$dt-12-31')
      GROUP BY month";
$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>

<html>
<head>
  <title>Report</title>
</head>
<body>
  
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales by Month'],
      <?php
        
        while ($row=mysqli_fetch_assoc($query)){
        $month=$row['month']; // month in number
        $displayName=date("F",mktime(0,0,0,$month,10)); // function to convert number to name 
        ?>
        ['<?php echo $displayName?>', <?php echo $row['Total_Sales']?>],
        <?php
        }
      ?>
        ]);

        var options = {
          title : '',
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
    <div id="chart_div3" style="width: 60%; height: 300%;"></div>
  </body>
  </td>