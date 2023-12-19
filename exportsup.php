<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect("localhost", "root", "", "sales");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=supplier.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Sup No','Sup Name',  'Company', 'Deparment','Address','Phone No.','Email'));  
      $query = "SELECT * from supplier ORDER BY SupNo ASC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  