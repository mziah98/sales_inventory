<?php
  include('connection.php');

  $sql = "SELECT InNo,InName,CatNo,InPrice,InQuantity,InDate,SupNo,InPrice* InQuantity as Total_Price FROM invoice  ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);



  // use Dompdf\Dompdf;
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
        
            <h2 class="text-center"> List Of Invoice</h2>
            <hr>
          </div>
          <div class="col-md-2 float-left add-new-button">
            <a href="insertinvoice.php" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Create New
            </a>
          </div>
          <div class=" float-right add-new-button">
         <form method="post" action="exportinvoice.php" align="center">  
         <input type="submit" name="export" value="Export to CSV" class="btn btn-info btn-lg">
          
                </form> 
              </div>
          <!-- <div class="col-md-2 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block" button onclick="window.print()"></button>
              <i class="fas fa-print"></i> Print
            </a>
          </div> -->


          <br><br><br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="Type in a name">

          <br><br>
          <table  class="table table-striped"  width="100%">
           
           <!--  <thead class="bg-secondary text-white" width="100%"> -->
            <thead>
              <tr>
                  <th>No.</th>
                <th>Invoice No.</th>
                <th>Supplier No.</th>
                 <th>Cat No.</th>

                <th>Items Name</th>
                
                <th>Cost Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
              
               
               
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody id="myTable">

             
          
         <!--  </table> -->

            <?php

              
              // $sql = "SELECT invoice.InNo,supplier.SupNo,InName,InPrice,InQuantity,TotalPrice Date,PaymentDue,SupComp from invoice join supplier
              // on supplier.SupNo=invoice.SupNo";

              $result = mysqli_query($conn, $sql);

            if($result)
            {
              $rowNumber=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $rowNumber;?></div></td>
                  <td><?php echo $row['InNo']; ?></td>
                    <td><?php echo $row['SupNo']; ?></td>
                      <td><?php echo $row['CatNo']; ?></td>
                 <td><?php echo $row['InName']; ?></td>
              
               <!--  <td><?php //echo $row['CatName']; ?></td> -->
                <td>RM <?php echo $row['InPrice']; ?></td>
                  <td><?php echo $row['InQuantity']; ?></td>
                 <td>RM <?php echo $row['Total_Price']; ?></td>
                <td><?php echo $row['InDate']; ?></td>
              
               
                     <td>  <a href="receipt.php?InNo=<?php echo $row["InNo"];?>" target="_blank" class="btn btn-success btn-block" ></button>
              <i class="fas fa-print"></i>

                   <!--  <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td> -->
                <td>
                  <button type="button" class="btn btn-warning updateBtn"  href="updateinvoice.php?InNo=<?php echo $row["InNo"] ;?>"> <i class="fas fa-edit"></i>  </button>
                </td>
                <td>
                  <a button type="button" class="btn btn-danger deleteBtn" onClick="return confirm('Are you sure to delete?')" href="deleteinvoice.php?InNo=<?php echo $row["InNo"] ;?>"> <i class="fas fa-trash-alt"></i>  </button></a>
                </td>
                      </tr>
         <?php
         $rowNumber++;
         }
         
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

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Create New  </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="insertinvoice.php" method="POST">
            <div class="form-group">

               <?php 

    include ('connection.php');
    $query = "SELECT * FROM supplier "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Sup No.</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="SupNo" name="SupNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['SupNo'];?>"><?php echo $objresult['SupNo'];?><?php echo $objresult['SupName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

           <?php 

    include ('connection.php');
    $query = "SELECT * FROM category "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
          <br>
          <label for="title">Cat No.</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="CatNo" name="CatNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['CatNo'];?>"><?php echo $objresult['CatNo'];?><?php echo $objresult['CatName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

        

              <br/>
              <label for="title">Invoice Name</label>
              <input type="text" name="InName" class="form-control" placeholder="Enter name" maxlength="100"
                required>
            </div>


         

            
            <div class="form-group">
              <label for="title">Cost Price</label>
              <input type="number" name="InPrice" class="form-control" step="0.01" placeholder="Enter price" maxlength="10"
                required>
            </div>

               <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="InQuantity" class="form-control" placeholder="Enter quantity" maxlength="10"
                required>

                </div>
<!-- 
                  <div class="form-group">
              <label for="title">Total Price</label>
              <input type="number" name="TotalPrice" class="form-control" step="0.01" placeholder="Enter total price" maxlength="10"
                required>
            </div> -->

            
            <div class="form-group">
              <label for="title">Date</label>
              <input type="date" name="InDate" class="form-control" min="1" placeholder="Enter date" maxlength="20"
                required>
            </div>


           
            <!-- <div class="form-group">
              <label for="title">Payment Due</label>
              <input type="date" name="PaymentDue" class="form-control" min="1" placeholder="Enter date" maxlength="20"
                required>
            </div>


          
 -->

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" href="insertinvoice.php" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
 

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
          <form action="updateinvoice.php" method="POST">
              <input type="hidden" name="updateNo" id="updateNo">
            <input type="text" name="updateId" readonly id="updateId">
        
              <br><br>
              <?php 

    include ('connection.php');
    $query = "SELECT * FROM supplier "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Sup No.</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="updateSupNo" name="updateSupNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['SupNo'];?>"><?php echo $objresult['SupNo'];?><?php echo $objresult['SupName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

     <?php 

    include ('connection.php');
    $query = "SELECT * FROM category "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
          <br>
          <label for="title">Cat No.</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="updateCatNo" name="updateCatNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['CatNo'];?>"><?php echo $objresult['CatNo'];?><?php echo $objresult['CatName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>
            <div class="form-group">
              <label for="title">Invoice Name</label>
              <input type="text" name="updateInName" id="updateInName" class="form-control" placeholder="Enter name" maxlength="100"
                required>
            </div>
           
           
            <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="updateInQuantity" id="updateInQuantity" min="1" class="form-control" placeholder="Enter quantity" maxlength="10"
                required>
            <div class="form-group">
              <label for="title"> Cost Price</label>
              <input type="number" name="updateInPrice" min="1" step="0.01" id="updateInPrice" class="form-control" placeholder="Enter price" maxlength="30"
                required>
              

               <div class="form-group">
              <label for="title">Date</label>
              <input type="date" name="updateInDate" id="updateInDate" class="form-control" placeholder="Enter date "  maxlength="50"
                required>
            </div>

          <!--  <div class="form-group">
              <label for="title">Payment Due</label>
              <input type="date" name="updatePaymentDue" id="updatePaymentDue" class="form-control" placeholder="Enter payment date "  maxlength="50"
                required>
            </div>
 -->

             
      

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
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

         $('#updateNo').val(data[0]);
        $('#updateId').val(data[1]);
    
        $('#updateSupNo').val(data[2]);
         $('#updateCatNo').val(data[3]);
        $('#updateInName').val(data[4]);
        
          
       $('#updateInPrice').val(data[5]);
       $('#updateInQuantity').val(data[6]);
        $('#updateDate').val(data[7]);
        // $('#updatePaymentDue').val(data[7]);   
       

        });
        
    });
  </script>

  
  
</body>

</html>