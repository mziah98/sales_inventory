<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "sales");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=invoice.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('In No','In Name','In Quantity','In Price','In Date',  'Cus No.',
       'Sup No'));  
      $query = "SELECT * from invoice ORDER BY InNo ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  