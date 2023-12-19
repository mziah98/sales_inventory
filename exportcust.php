<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "sales");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=cust_order.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Order No','Stock No','Cus No','In No','Cust Name',  'Phone No.', 'Address','Email','Order Quantity','Price','Status Payment','Order Date'));  
      $query = "SELECT * from cus_order ORDER BY OrderNo ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  