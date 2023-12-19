<?php
  include('connection.php');
?>

<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSS Layout</title>
  <!-- <link rel="stylesheet" href="subnav.css" type="text/css"> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 <!--  <link rel="stylesheet" href="navbar.css"> -->

  <!--title>PHP and MySQL CRUD</title-->

</head>

                <br><br>
              <h2><center>Housekeeping </h2></center>

  <br>

          <div class="col-md-2 float-right add-new-button">
            <a href="" text-align="center" float="right" target="_blank" class="btn btn-success btn-block" button onclick="window.print()">
              <i class="fas fa-print"></i> Print
            </a>
          </div>
          <br><br><br>

   <div class="border1">
<form action=""  method="post">
              <table align="right" float="right" border="2"  width="100%" cellpadding="1" cellspacing="0">

                <tr align="center">
                 <td width="3%" style="background-color:;"> No</td>
                   <td width="5%" style="background-color:;">Stock No</td>
                    <td width="5%" style="background-color:;">Cat No</td>
                  <td width="15%" style="background-color: ;">Product</td>
                  <td width="8%" style="background-color:;"> Cost Price</td>
                  <td width="8%" style="background-color:;"> Selling Price</td>
                 
                  <td width="10%" style="background-color:;"> Date</td>
                  <td width="10%" style="background-color:;"> Particular</td>
                  <td width="5%" style="background-color:;"> Quantity</td>  
                 
                  <td width="10%" style="background-color:;"> Remarks</td>                  
                  <td  width="10%" style="background-color:;">Action</td>
                </tr>
                    
                       <?php
                   $i=0;
                   $query = mysqli_query($conn, "select stock.StockNo,StockName,StockPrice,SellingPrice,Date,Particular,StockQuantity,Remarks,category.CatNo 
             FROM stock,category
             WHERE  category.CatNo='C006'
             AND category.CatNo=stock.CatNo");

                while($result2=mysqli_fetch_array($query))
                {
                  $i++;
                ?>
                                
                  <tr>
                  <td><?php echo $i;?></td>
                   <td><?php echo $result2["StockNo"];?></td>
                    <td><?php echo $result2["CatNo"];?></td>
                    <td><?php echo $result2["StockName"];?></td>
                     <td><?php echo $result2["StockPrice"];?></td>
                                    
                                    <td><?php echo $result2["SellingPrice"];?></td>
                                    <td><?php echo $result2["Date"];?></td>
                                     <td><?php echo $result2["Particular"];?></td>
                                      <td><?php echo $result2["StockQuantity"];?></td>
                                       
                                         <td><?php echo $result2["Remarks"];?></td>
                                        


                
                  
          <td>
                   <a button type="button"   class="btn btn-success updateBtn"  data-target="#update"> EDIT</button></a>
              
               <!-- 
                  <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i>  </button> -->

         
            <a button type="button" onClick="return confirm('Are you sure to delete?')" href="deletehouse.php?StockNo=<?php echo $result2["StockNo"] ;?>" class="btn btn-danger deleteBtn"  data-target="#delete">
        Delete </a>
            </button>
      
  
                </td>
          </tr>
      </div>
              </form> 


                                    <?php
                }
                ?>
                </table>
                <?php
                mysqli_close($conn);
                ?>
                      </tbody>
                    </table>
              </br>
              </br>
              

              




<!-- update --> 
<div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit  </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="edithouse.php" method="POST">
               <input type="hidden" name="updateNo" id="updateNo">
              <input type="text" name="updateId" readonly id="updateId">

               <input type="hidden" name="updateCatNo" id="updateCatNo">
      
            <!--   <div class="form-group">
               <label for="title">Cat No.</label> -->
              <!-- <input type="hidden" name="updateCatNo" id="updateCatNo" class="form-control" placeholder="Enter cat no" maxlength="30"
                required> -->

                 <div class="form-group">


              <label for="title">Product</label>
              <input type="text" name="updateStockName" id="updateStockName" class="form-control" placeholder="Enter name" maxlength="100"
                required>
            </div>

               <div class="form-group">

              <label for="title"> Cost Price</label>
              <input type="price" name="updateStockPrice" id="updateStockPrice" min="0" step="0.01" class="form-control" placeholder="Enter cost price" maxlength="100"
                required>
            </div>

               <div class="form-group">

               <label for="title"> Selling Price</label>
              <input type="price" name="updateSellingPrice" id="updateSellingPrice" min="0" step="0.01" class="form-control" placeholder="Enter selling name" maxlength="100"
                required>
            </div>

                 <div class="form-group">

                <label for="title"> Date</label>
              <input type="Date" name="updateDate" id="updateDate" class="form-control" placeholder="Enter date" maxlength="100"
               >
            </div>

                 <div class="form-group">

                <label for="title"> Particulars</label>
              <input type="text" name="updateParticular" id="updateParticular" class="form-control" placeholder="Enter particular" maxlength="100"
               >
            </div>

                   <div class="form-group">

                 <label for="title"> Quantity</label>
              <input type="number" min="0" name="updateStockQuantity" id="updateStockQuantity" class="form-control" placeholder="Enter stock quantity" maxlength="10" required="">
            </div>

                

                 <div class="form-group">

                <label for="title"> Remarks</label>
              <input type="text" name="updateRemarks" id="updateRemarks" class="form-control" placeholder="Enter remarks" maxlength="100"
                >
            </div>
           
           
            
      

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
         </div>


      <!--   delete -->

     <!--  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletecat.php" method="POST">

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
  </div> -->

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
       
          $('#updateCatNo').val(data[2]);
        $('#updateStockName').val(data[3]);
        $('#updateStockPrice').val(data[4]);
        $('#updateSellingPrice').val(data[5]);
        $('#updateDate').val(data[6]);
        $('#updateParticular').val(data[7]);
        $('#updateStockQuantity').val(data[8]);
       
        $('#updateRemarks').val(data[9]);


       
        });
        
    });
  </script>

  <!-- <script>
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
     
  </script>
 -->
</body>
</html>