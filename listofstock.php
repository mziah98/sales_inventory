<?php
  include('connection.php');

 
              $sql = "select stock.StockNo,InPrice,SellingPrice-InPrice as Profit,InQuantity,InName,SupCompany,SupName,StockName,StockGroup,CatName,StockWeight,StockPrice,SellingPrice,StockQuantity, Image,invoice.InNo,supplier.SupNo,category.CatNo
             FROM stock,invoice,supplier,category
             WHERE  invoice.InNo=stock.InNo
            AND supplier.SupNo=invoice.SupNo

             AND category.CatNo=stock.CatNo order by StockNo";

              $result = mysqli_query($conn, $sql);

            
    $sql2 = "SELECT count(StockNo) as total FROM stock WHERE StockQuantity<=50";
    $execute2=mysqli_query($conn, $sql2) or die (mysqli_error($conn));
    //if(mysqli_num_rows($execute2)>0){
      if($row = mysqli_fetch_assoc($execute2)) 
      {

    //output data of each row

      echo "<script>alert('You have $row[total] item that less than 50!');</script>";
      //echo"<meta http-equiv='refresh' content='0; url=listofstock.php'/>";
    }

  
        else 
        { echo "<script>alert('invalid');</script>";
      }
      
        
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


<?php include 'menu.php'; ?>

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

  <div class="container">

    <div class="row">
   <!--    <div class="col-md-12 card"> -->
        <div>
          <div class="head-title">
           <!--  -->
        
            <h2 class="text-center">List of Items</h2>
            <hr>
          </div>
         <!--  <div class="col-md-2 float-left add-new-button">
            <a href="insertstock.php" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Create New
            </a>
          </div> -->
          <div class=" float-right add-new-button">
       <form method="post" action="exportstock.php" align="center">  
       <input type="submit" name="export" value="Export to CSV" class="btn btn-info btn-lg">
          
                </form> 
              </div>
          <!-- </div>
          <div class="col-md-2 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block" button onclick="window.print()"></button>
              <i class="fas fa-print"></i> Print
            </a>
          </div>
 -->

          <br><br><br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="Type in a name">

          <br><br>
          <table  class="table table-striped"  width="100%">
           
           <!--  <thead class="bg-secondary text-white" width="100%"> -->
            <thead>
              <tr>
                  <th>No.</th>
                <th>Item No.</th>
                <!--th>Id</th-->
                <th>Item's Name</th>
                <th>Group</th>
                <th>Category</th>
                 
                <th>Unit of Measure</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                 <th>Profit</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Supplier Company</th>
                <th>Invoice No</th>
                <th>Cat No</th>
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody id="myTable">

             <?php
      if(mysqli_num_rows($result)>0){
      ?>
      
          
         <!--  </table> -->

            <?php

              
              $rowNumber=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $rowNumber;?></div></td>
                  <td><?php echo $row['StockNo']; ?></td>
                <td><?php echo $row['StockName']; ?></td>
                <td><?php echo $row['StockGroup']; ?></td>
               <!--  <td><?php //echo $row['CatName']; ?></td> -->
                <td><?php echo $row['CatName']; ?></td>
                <td><?php echo $row['StockWeight']; ?></td>
                <td>RM <?php echo  $row['StockPrice']; ?></td>
                <td>RM <?php echo $row['SellingPrice']; ?></td>
                <td>RM <?php echo $row['Profit']; ?></td>
                <td><?php echo $row['StockQuantity']; ?></td>
                  
                  <td><?php echo "<img width='200px' height='200px' src=\"../sales/image/" . $row['Image'] . "\"   class='img-' alt=\"\" /><br />";?></td>

                  <td><?php echo $row['SupName']; ?></td>

                    <td><?php echo $row['InNo']; ?></td>
                  
                   <td><?php echo $row['CatNo']; ?></td>

                    <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning updateBtn"  href="updatestock.php?StockNo=<?php echo $row["StockNo"] ;?>"> <i class="fas fa-edit"></i>  </button>
                </td>
                <td>
                  <a button type="button" class="btn btn-danger deleteBtn" onClick="return confirm('Are you sure to delete?')" href="deletestock.php?StockNo=<?php echo $row["StockNo"] ;?>"> <i class="fas fa-trash-alt"></i>  </button></a>
                </td>
                      </tr>
         <?php
         $rowNumber++;
         }
         
         ?>

         <?php
        }else 
        {
        ?>
        
             
    <?php
        }
      ?>
                <!--?php
                //mysqli_close($conn);
                ?-->

             

            </tbody>
          </table>


  
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


     td = tr[i].getElementsByTagName("td")[2];
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

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Create New Item </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="insertstock.php" method="POST">

            <!-- <div class="form-group">
              <label for="title">Invoice No.</label>
              <input type="select" name="InNo" class="form-control" placeholder="Enter no" maxlength="100"
                required>
            </div> -->

             <?php 

    include ('connection.php');
    $query = "SELECT * FROM invoice "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Items Name</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="InNo" name="InNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['InNo'];?>"><?php echo $objresult['InNo'];?><?php echo $objresult['InName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

           <!--   <div class="form-group">
              <label for="title">Cat No.</label>
              <input type="select" name="CatNo" class="form-control" placeholder="Enter no" maxlength="100"
                required>
            </div> -->

            <!-- <div class="form-group">
              <label for="title">Item's Name</label>
              <input type="text" name="StockName" class="form-control" placeholder="Enter name" maxlength="100"
                >
            </div> -->


            <div class="form-group">
              <label for="title">Group</label>
              <input type="text" name="StockGroup" class="form-control" placeholder="Enter group of items" maxlength="50"
                >

                </div>
                  
            <div class="form-group">
              <label for="title">Unit of Measure</label>
              <input type="text" name="StockWeight" class="form-control"  placeholder="Enter unit of measure" maxlength="10"
                required>
            </div>

            <!-- <div class="form-group">
              <label for="title">Cost Price</label>
              <input type="number" name="StockPrice" class="form-control" step="0.01" placeholder="Enter cost price" maxlength="10"
                > -->
      
            <div class="form-group">
              <label for="title">Selling Price</label>
              <input type="number" name="SellingPrice" class="form-control" step="0.01" placeholder="Enter selling price"  maxlength="10" required>
            </div>

           <!--  <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="StockQuantity" class="form-control" min="1" placeholder="Enter quantity" maxlength="20"
                >
            </div> -->


             <?php 

    include ('connection.php');
    $query = "SELECT * FROM category "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Choose Category</label>
            
              <select id="CatNo" name="CatNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['CatNo'];?>"><?php echo $objresult['CatName'];?><?php echo $objresult['CatNo'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

                </div>
          


             <div class="form-group">
           <center> <label for="title">Image</label></center>
               
             <center> <input type="file" type="file" name="Image" name="MAX_FILE_SIZE"  value="100000"
                ></center>

                
              </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" href="insertstock.php" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <center> <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Item's No.:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockNo"></div>
            </div>
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Item's Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockName"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Group:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockGroup"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Category:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewCatName"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Unit of Measure:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockWeight"></div>
            </div>
            
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Cost Price:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockPrice"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Selling Price:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSellingPrice"></div>
            </div>

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Quantity:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockQuantity"></div>
            </div>
          </div>
            </center>
            <!--div class="col-sm-5 col-xs-6 tital " >
              <strong>Image:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewImage"></div>
            </div-->

          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="updatestock.php" method="POST">
             <input type="hidden" name="updateNo" id="updateNo">
            <input type="text" name="updateId" readonly id="updateId">
           <!--  <input type="hidden" name="updateInNo" id="updateInNo">
            <input type="hidden" name="updateCatNo" id="updateCatNo">
             -->

           
            <div class="form-group">
              <label for="title">Group</label>
              <input type="text" name="updateStockGroup" id="updateStockGroup" class="form-control" placeholder="Enter group" maxlength="30"
                >
                </div>
<!-- 
            <div class="form-group">
              <label for="title">Category</label>
              <input type="text" name="updateCatName" id="updateCatName" class="form-control" placeholder="Enter category" maxlength="100" required>
            </div>
           -->





                
            <div class="form-group">
              <label for="title">Unit of Measure</label>
              <input type="text" name="updateStockWeight" id="updateStockWeight" class="form-control" placeholder="Enter unit of measure" maxlength="10"
                required>
             </div>


               <div class="form-group">
              <label for="title">Selling Price</label>
              <input type="number" name="updateSellingPrice" id="updateSellingPrice" class="form-control" placeholder="Enter selling price " step="0.01" maxlength="15"
                required>
            </div>

          



              
          

            <div class="form-group">
            	 <center><label for="title">Image</label>
            	
              <input type="file" type="file" name="updateImage" id="updateImage"  name="MAX_FILE_SIZE"
               ></center>
            </div>

      

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
 <!--  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletestock.php?StockNo=<?php// echo $row["StockNo"] ;?>" method="POST">

          <div class="modal-body">

            <input type="hidden" name="StockNo" id="StockNo">
             

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" href= "deletestock.php?StockNo=<?php// echo $row["StockNo"] ;?>" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>
 -->
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

       $('#updateNo').val(data[0]);
        $('#updateId').val(data[1]);
       
         
      
        $('#updateStockGroup').val(data[3]);
        
           
        $('#updateStockWeight').val(data[5]);
      
        $('#updateSellingPrice').val(data[6]);   
      
        // $('#updateCatNo').val(data[5]);
        $('#updateImage').val(data[7]); 
          //$('#updateProfit').val(data[7]);        

        });
        
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

         $('#viewStockNo').text(data[1]);
        $('#viewStockName').text(data[2]);
        $('#viewStockGroup').text(data[3]);
        $('#viewCatName').text(data[4]);
        $('#viewStockWeight').text(data[5]);
        $('#viewStockPrice').text(data[6]);
        $('#viewSellingPrice').text(data[7]);
        $('#viewStockQuantity').text(data[8]);   
        // $('#viewImage').text(data[9]);           

        });
    
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

        });
    
    });
     // <!--?php
     //     $rowNumber++;
     //    // }
     //     ?-->
                  
              
     //            <?php
     //            mysqli_close($conn);
     //            ?>
  </script>
</body>
   
</html>