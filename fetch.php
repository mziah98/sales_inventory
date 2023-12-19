<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "sales");
//$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM stock 
  WHERE StockName LIKE '%".$search."%'
  OR /StockGroup LIKE '%".$search."%' 
  OR StockCat '%".$search."%' 
  OR StockWeight LIKE '%".$search."%' 
  OR StockPrice LIKE '%".$search."%'
  OR SellingPrice LIKE '%".$search."%'
  OR StockQuantity LIKE '%".$search."%'
 ";


 }
else
{
 $query = "
  SELECT * FROM stock ORDER BY StockNo ASC
 ";
}
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
{
  $output .= '
<table class="table table-striped" >
            
              <tr>
                <th>Id</th>
                
                <th>Items Name</th>
                <th>Group</th>
                <th>Category</th>
                 
                <th>Unit of Measure</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody>

          ';
          
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
              <tr>

               <td>'.$row["StockNo"].'</td>
               
                  <td>'.$row["StockName"].'</td>
    <td>'.$row["StockGroup"].'</td>
    <td>'.$row["StockCat"].'</td>
    <td>'.$row["StockWeight"].'</td>
    <td>'.$row["StockPrice"].'</td>
                  
     <td>'.$row["SellingPrice"].'</td>

      <td>'.$row["StockQuantity"].'</td>
     
                  <td> .'<"img width='250px' src=\"image/" . $row["Image"] . "\"  class='img-thumbnail' alt=\"\" /><br />".'</td>

                  <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i>  </button>
                </td>


  </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>