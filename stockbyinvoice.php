<?php
  include('connection.php');

  $sql = "SELECT * FROM supplier_stock ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="navbar.css">

  <!--title>PHP and MySQL CRUD</title-->
</head>


<?php include 'menu.php'; ?>
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
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <br><br>
            <h3 class="text-center">Stocks Received by Invoice</h3>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="insertstock.php" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Create New
            </a>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block">
              <i class="fas fa-print"></i> Print
            </a>
          </div>
          <br><br><br>
          <table class="table table-striped" >
            <!--thead class="bg-secondary text-white" width="100%"-->
              <tr>
                <th>Item No</th>
                <!--th>Id</th-->
                <th>Supplier Name</th>
                <th>SupNo</th>
                <th>StockName</th>
                <th>Cost Price</th>
                <th>Quantity</th>
                
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody>

            <?php

              

              $sql = "SELECT * FROM supplier_stock";
              $result = mysqli_query($conn, $sql);

            if($result)
            {
              //$rowNumber=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <!--td><?php //echo $rowNumber;?></div></td-->
                  <td><?php echo $row['SupStockNo']; ?></td>
                <td><?php echo $row['SupName']; ?></td>
                <td><?php echo $row['SupNo']; ?></td>
                <td><?php echo $row['StockName']; ?></td>
                
                <td>RM <?php echo  $row['StockPrice']; ?></td>
               
                <td><?php echo $row['StockQuantity']; ?></td>
                  
              

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
            <!--?php
         $rowNumber++;
         }
         ?-->
                  
              
                <!--?php
                //mysqli_close($conn);
                ?-->

                <?php
              }
            }else{
              echo "<script> alert('No Record Found');</script>";
            }
          ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Create New Stock</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insertstockbyinvoice.php" method="POST">
            <div class="form-group">
              <label for="title">Supplier's Name</label>
              <input type="text" name="Su[Name" class="form-control" placeholder="Enter name" maxlength="100"
                required>
            </div>
            <div class="form-group">
              <label for="title">StockName</label>
              <input type="text" name="StockName" class="form-control" placeholder="Enter name" maxlength="100"
                required>

                </div>


            <div class="form-group">
              <label for="title">Cost Price</label>
              <input type="number" name="StockPrice" class="form-control" step="0.01" placeholder="Enter cost price" maxlength="10"
                required>
            </div>

            <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="StockQuantity" class="form-control" min="1" placeholder="Enter quantity" maxlength="20"
                required>
            </div>

    
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" href="insertstockbyinvoice.php" name="insertData">Save</button>
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
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Supplier's Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupName"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Stock's Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockName"></div>
            </div>
            
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Cost Price:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockPrice"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Quantity:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewStockQuantity"></div>
            </div>

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
          <form action="updatestockbyinvoice.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">Supplier's Name</label>
              <input type="text" name="updateSupName" id="updateSupName" class="form-control" placeholder="Enter supplier's name" maxlength="100"
                required>
            </div>
            <div class="form-group">
              <label for="title">Stock's Name</label>
              <input type="text" name="updateStockName" id="updateStockName" class="form-control" placeholder="Enter gstock;s name" maxlength="30"
                required>
                </div>

            <div class="form-group">
              <label for="title">Cost Price</label>
              <input type="number" name="updateStockPrice" id="updateStockPrice" class="form-control" placeholder="Enter cost price"  step="0.01" maxlength="15"
                required>
            </div>

               

            <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="updateStockQuantity" id="updateStockQuantity" class="form-control" placeholder="Enter quantity"   maxlength="100"
                required>
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
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletestockbyinvoice.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

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

        $('#updateId').val(data[0]);
        $('#updateSupName').val(data[1]);
        $('#updateStockName').val(data[2]);
        $('#updateStockPrice').val(data[3]);
          
        $('#updateStockQuantity').val(data[4]); 
       
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

        $('#viewSupName').text(data[1]);
        $('#viewStockName').text(data[2]);
       
        $('#viewStockPrice').text(data[3]);
        
        $('#viewStockQuantity').text(data[4]);   
            

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