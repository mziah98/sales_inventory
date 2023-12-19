<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "sales");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=stock.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Stock No','Stock Name','Stock Quantity','Weight','Group',  'Cost Price', 'Selling Price','Image','Date','Particular','Remarks',
      'In No','Cat No'));  
      $query = "SELECT * from stock ORDER BY StockNo ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  