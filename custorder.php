<?php
  include('connection.php');
  
  // $sql = "SELECT * FROM cus_order";

  //  $query = mysqli_query($conn,$sql);

  //  $result=mysqli_fetch_array($query,MYSQLI_ASSOC);


?>


 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="table.js"> 

  <!--title>PHP and MySQL CRUD</title-->
<script src="../Static/Js/jquery.min.js"></script>
<script src="../Static/cusJs/854c41fd-b0c1-4922-97e0-4272b9e48b5d.js"></script>
<link href="../Static/cusCss/fbfb6112-32ad-432e-b871-c8b574540823.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<?php include 'menu2.php'; ?>

<style>

</style>
</head>

<body>

  <!-- Navigation >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="https://egavilanmedia.com" target="_blank" >EGavilan Media</a>
    </div>
  </nav>
  <br><br><br-->


  <div class="container" align="center">

    <div class="row" align="center">
   <!--    <div class="col-md-12 card"> -->
        <div>
          <div class="head-title" align="center">
           <!--  -->
        
            <h2 class="text-center"> Customer Orders Invoice</h2>
            <hr>
          </div>

          <ul class="nav navbar-nav">
 <a href="create_cust.php" class="btn btn-primary btn-block"> <i class="fas fa-plus"></i> Create New </button></a>
</li>
</ul>
  
   <div class=" float-right add-new-button">
 <form method="post" action="exportcust.php" align="center">  
   <input type="submit" name="export" value="Export to CSV" class="btn btn-info btn-lg">
          
                </form> 
              </div>
<!-- 
          <div class=" float-right add-new-button">
             <form method="post" action="exportcust.php" align="center">
            <a  name="export"  class="btn btn-info btn-lg">
          <i class="glyphicon glyphicon-export"></i> Export to excel</button></a>
            </a>
          </div>
          </form>  -->
          <!-- <div class="col-md-2 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block" button onclick="window.print()"></button>
              <i class="fas fa-print"></i> Print
            </a>
          </div> -->


          <br><br><br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="Type in a name">

          <br><br>
      <center>   <table align="center" class="table table-striped"  width="100%">
           
           <!--  <thead class="bg-secondary text-white" width="100%"> -->
            <thead align="center">
              <tr align="center">
                  <th align="center">No.</th>
                <th align="center">Order No.</th>
                <th align="center">Stock No.</th>
                <th align="center">Name</th>
                <!--  <th align="center">Phone No.</th> -->
                <th align="center"> Address</th>
                  <th align="center"> Email</th>
                <th align="center">Order Name</th>
              
                <th align="center">Price</th>
                  <th align="center">Order Quantity</th>
                 <th align="center">Total Price</th>
                  <th align="center">Date</th>
                <!--   <th align="center">Status Payment</th>
               -->
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody align="center" id="myTable">

             
          
         <!--  </table> -->

            <?php

              $rowNumber=1;
            
  $sql = "SELECT cus_order.OrderNo,stock.StockNo,CusPhoneNo,StockName,StockPrice,StockQuantity,OrderQuantity,OrderQuantity*SellingPrice as total,OrderDate,
  CusName,CusAdd,CusEmail,StatusPayment,stock.SellingPrice  FROM stock,cus_order
  where   stock.StockNo = cus_order.StockNo order by OrderDate asc";

              $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

              while($row = mysqli_fetch_assoc($result))
              {


            ?>
              <tr>
                <td align="center"><?php echo $rowNumber;?></div></td>
                  <td align="center"><?php echo $row['OrderNo']; ?></td>
                   <td align="center"><?php echo $row['StockNo']; ?></td>
                    <td align="center"><?php echo $row['CusName']; ?></td>
               <!--  <td align="center"><?php echo $row['CusPhoneNo']; ?></td> -->
              
                <td align="center"><?php echo $row['CusAdd']; ?></td>
              
                <td align="center"><?php echo $row['CusEmail']; ?></td>
                  <td align="center"><?php echo $row['StockName']; ?></td>
                   <td align="center">RM <?php echo $row['SellingPrice']; ?></td>
                    <td align="center"><?php echo $row['OrderQuantity']; ?></td>

                 <td align="center">RM <?php echo $row['total']; ?></td>
                  <td align="center"><?php echo $row['OrderDate']; ?></td>
              
               <!--  <td align="center"> <?php echo  $row['StatusPayment']; ?></td>
                -->
                     <td>  <a href="receiptcust.php?OrderNo=<?php echo $row["OrderNo"];?>" target="_blank" class="btn btn-success btn-block" ></button>
              <i class="fas fa-print"></i>

                   <!--  <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td> -->
               
                 </td> 
                <td>
                  <a href="updatecust.php?OrderNo=<?php echo $row["OrderNo"] ;?>" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button></a>
                </td>
                <td>
                  <a button type="button" class="btn btn-danger deleteBtn" onClick="return confirm('Are you sure to delete?')" href="deletecust.php?OrderNo=<?php echo $row["OrderNo"] ;?>"> <i class="fas fa-trash-alt"></i>  </button></a>
                </td>
              </form>


                          <?php
              
                 $rowNumber++;

                   }
                ?>
                  
              

             </center> 

            </tbody>
          </table>

             <?php
                mysqli_close($conn);
                ?>
  
        </div>
      </div>
    </div>
  </div>


                   <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
   // td = tr[i].getElementsByTagName("td")[0];


     td = tr[i].getElementsByTagName("td")[4];
    // td = tr[i].getElementsByTagName("td")[2];
    // td = tr[i].getElementsByTagName("td")[3];
    // td = tr[i].getElementsByTagName("td")[4];
    // td = tr[i].getElementsByTagName("td")[5];
    // td = tr[i].getElementsByTagName("td")[6];
    //  td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";




      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

  <!-- MODALS -->

  

  

  
</body>

</html>