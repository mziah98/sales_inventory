<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "sales");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=purchase order.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Po No','Staff No','Comp Name','Comp Address','Contact No.',  'Description',
       'Quantity','Date','Notes'));  
      $query = "SELECT * from purchase_order ORDER BY PoNo ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  