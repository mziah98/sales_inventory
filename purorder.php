<?php
  include("connection.php");

  $sql = "SELECT * FROM purchase_order";

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
<link href="css/style2.css" rel="stylesheet">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->


<?php include 'menu2.php'; ?>

<style>

</style>
</head>

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
        
            <h2 class="text-center"> List Of Purchase Order</h2>
            <hr>
          </div>
           
          <ul class="nav navbar-nav">
 <a href="create_pur.php" class="btn btn-primary btn-block"> <i class="fas fa-plus"></i> Create New </button></a>
</li>
</ul>
          <div class=" float-right add-new-button">
        <form method="post" action="exportpo.php" align="center">  
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
          <table  align="center" class="table table-striped"  width="100%">
           
           <!--  <thead class="bg-secondary text-white" width="100%"> -->
            <thead align="center">
              <tr  align="center">
                  <th>No.</th>
                <th>Po No.</th>
              
                  <th>Company Name</th>
                   <th>Company Address</th>
                    <th>Company Email</th>
               
                   <th>Description</th>
           
                <th>Quantity</th>
           
                <th>Date</th>
              
               
               
                <th></th>
                <th></th>
                <th></th>
               

                
              </tr>
            </thead>
            <tbody  align="center" id="myTable">

             
          
         <!--  </table> -->

            <?php

              
              $sql = "SELECT * from purchase_order";

              $result = mysqli_query($conn, $sql);

            if($result)
            {
              $rowNumber=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $rowNumber;?></div></td>
                  <td><?php echo $row['PoNo']; ?></td>
                <td><?php echo $row['CompName']; ?></td>
                  <td><?php echo $row['CompAdd']; ?></td>
                    <td><?php echo $row['CompEmail']; ?></td>
                     
                <td><?php echo $row['Description']; ?></td>
              
               <!--  <td><?php //echo $row['CatName']; ?></td> -->
              
                  <td><?php echo $row['Quantity']; ?></td>
             
                <td><?php echo $row['Date']; ?></td>
              
               
                     <td>  <a href="receiptpur.php?PoNo=<?php echo $row["PoNo"];?>" target="_blank" class="btn btn-success btn-block" ></button>
              <i class="fas fa-print"></i></a></td>

                   <!--  <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td> -->
                <td>
                  <a href="updatepur.php?PoNo=<?php echo $row["PoNo"] ;?>" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button></a>
                </td>
                <td>
                  <a button type="button" class="btn btn-danger deleteBtn" onClick="return confirm('Are you sure to delete?')" href="deletepur.php?PoNo=<?php echo $row["PoNo"] ;?>"> <i class="fas fa-trash-alt"></i>  </button></a>
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
          <form action="insertpur.php" method="POST">
            <div class="form-group">

               <?php 

    include ('connection.php');
    $query = "SELECT * FROM staff "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Staff No.</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="StaffNo" name="StaffNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['StaffNo'];?>"><?php echo $objresult['StaffNo'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

            <br/>

               <div class="form-group">
              <label for="title">Company Name</label>
              <input type="text" name="CompName" class="form-control" placeholder="Enter company's name" maxlength="100"
                required>
            </div>

        
               <div class="form-group">
              <label for="title">Company Address</label>
              <input type="text" name="CompAdd" class="form-control" placeholder="Enter company's Address" maxlength="100"
                required>
            </div>

              
               <div class="form-group">
              <label for="title">Company Email</label>
              <input type="email" name="CompEmail" class="form-control" placeholder="Enter company's email" maxlength="100"
                required>
            </div>


               <div class="form-group">
              <label for="title">Contact Number</label>
              <input type="number" name="CompPhone" class="form-control" placeholder="Enter company's contact number" maxlength="20"
                required>
            </div>


               <div class="form-group">
              <label for="title">Description</label>
              <input type="text" name="Description" class="form-control" placeholder="Enter description of the items" maxlength="100"
                required>
            </div>


        
           

               <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="Quantity" class="form-control" min="0" placeholder="Enter quantity" maxlength="10"
                required>

                </div>

                  

            
            <div class="form-group">
              <label for="title">Date</label>
              <input type="date" name="Date" class="form-control"  placeholder="Enter date" maxlength="20"
                required>
            </div>


          


          


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Save</button>
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
          <!-- <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Invoice No:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewInNo"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital">
              <strong>Supplier No.:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupNo"></div>
            </div> -->
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Invoice Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewInName"></div>
            </div>
            
            
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Price:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewInPrice"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>InQuantity:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewInQuantity"></div>
            </div>

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Total Price:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewTotalPrice"></div>
            </div>

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Date:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewDate"></div>
            </div>

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Payment Due:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewPaymentDue"></div>
            </div>

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
          <form action="updatepur.php" method="POST">
              <input type="hidden" name="updateNo" id="updateNo">
            <input type="hidden" name="updateId" id="updateId">
          

               <input type="hidden" name="updateStaffNo" id="updateStaffNo">
     <br/>
              <div class="form-group">
         
              <label for="title">Company Name</label>
              <input type="text" name="updateCompName" id="updateCompName" class="form-control" placeholder="Enter company's name" maxlength="100"
                required>
            </div>

              
              <div class="form-group">
              <label for="title">Company Address</label>
              <input type="text" name="updateCompAdd" id="updateCompAdd" class="form-control" placeholder="Enter company's Address" maxlength="100"
                required>
            </div>

              
              <div class="form-group">
              <label for="title">Company Email</label>
              <input type="email" name="updateCompEmail"  id="updateCompEmail" class="form-control" placeholder="Enter company's email" maxlength="100"
                required>
            </div>


              <div class="form-group">

              <label for="title">Contact Number</label>
              <input type="number" name="updateCompPhone"  id="updateCompPhone" class="form-control" placeholder="Enter company's contact number" maxlength="20"
                required>
            </div>

              <div class="form-group">
              <label for="title">Description</label>
              <input type="text" name="updateDescription" id="updateDescription" class="form-control" placeholder="Enter description of the items" maxlength="100"
                required>
            </div>


        
           

               <div class="form-group">
              <label for="title">Quantity</label>
              <input type="number" name="updateQuantity" id="updateQuantity" class="form-control" min="1" placeholder="Enter quantity" maxlength="10"
                required>

                </div>

                  

            
            <div class="form-group">
              <label for="title">Date</label>
              <input type="date" name="updateDate" id="updateDate" class="form-control"  placeholder="Enter date" maxlength="20"
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
     $('#updateCompName').val(data[2]);
        $('#updateCompAdd').val(data[3]);
          $('#updateCompEmail').val(data[4]);
        $('#updateCompPhone').val(data[5]);
       
        $('#updateStaffNo').val(data[6]);
        $('#updateDescription').val(data[7]);
        $('#updateQuantity').val(data[8]);
          $('#updateDate').val(data[9]);
       
       

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

        $('#viewInName').text(data[1]);
        $('#viewInPrice').text(data[2]);
        $('#viewInQuantity').text(data[3]);
        $('#viewTotalPrice').text(data[4]);
        $('#viewDate').text(data[5]);
        $('#viewPaymentDue').text(data[6]);
     
        });
    
    });
  </script>

  
  
</body>

</html>