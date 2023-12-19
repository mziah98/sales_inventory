<?php
  include('connection.php');

  $sql = "SELECT * FROM supplier ";

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
    <!--   <div class="col-md-12 card"> -->
        <div>
          <div class="head-title">
            <br><br>
            <h3 class="text-center">List Of Supplier</h3>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="insertsupplier.php" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Create New 
            </a>
          </div>
          <!-- <div class="col-md-3 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block">
              <i class="fas fa-print"></i> Print
            </a>
          </div> -->

          <div class=" float-right add-new-button">
     <form method="post" action="exportsup.php" align="center">  
     <input type="submit" name="export" value="Export to CSV" class="btn btn-info btn-lg">
          
                </form> 
              </div>
          

          <br><br><br>
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search .." title="Type in a name">

          <br><br>
          <table class="table table-striped" >
            <!--thead class="bg-secondary text-white" width="100%"-->
              <tr>
                <th>Id</th>
                <th>Supplier Name</th>
               <!--  <th>Company Name</th> -->
                 <th>Department</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <th></th>

                
              </tr>
            </thead>
              </thead>
            <tbody id="myTable">

            <?php

              $sql = "SELECT * FROM supplier";
              $result = mysqli_query($conn, $sql);

            if($result)
            {
              while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $row['SupNo']; ?></td>
                <td><?php echo $row['SupName']; ?></td>
               <!--  <td><?php //echo $row['SupCompany']; ?></td> -->
                <td><?php echo $row['Department']; ?></td>
                <td><?php echo $row['SupAdd']; ?></td>
                <td><?php echo $row['SupPhoneNo']; ?></td>
                <td><?php echo $row['SupEmail']; ?></td>
                <td>
                  <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i></button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i>  </button>
                </td>
                 <td>
                  <a button type="button" class="btn btn-danger deleteBtn" onClick="return confirm('Are you sure to delete?')" href="deletesupplier.php?SupNo=<?php echo $row["SupNo"] ;?>"> <i class="fas fa-trash-alt"></i>  </button></a>
                </td>
              </tr>
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




                   <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
   // td = tr[i].getElementsByTagName("td")[0];


     td = tr[i].getElementsByTagName("td")[1];
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
          <h5 class="modal-title">Create New Supplier </h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insertsupplier.php" method="POST">
            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" name="SupName" class="form-control" placeholder="Enter name" maxlength="100"
                required>
            </div>
          <!--   <div class="form-group">
              <label for="title">Company Name</label>
              <input type="text" name="SupCompany" class="form-control" placeholder="Enter company name" maxlength="150"
                required>

                </div> -->
            <div class="form-group">
              <label for="title">Department</label>
              <input type="text" name="Department" class="form-control" placeholder="Enter department" maxlength="30"
                required>

            </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="SupAdd" class="form-control" placeholder="Enter address" maxlength="150"
                required>
            </div>
            <div class="form-group">
              <label for="title">Contact No.</label>
              <input type="number" name="SupPhoneNo" class="form-control" placeholder="Enter phone no" minlenght="9" maxlength="15" required>
            </div>
            <div class="form-group">
              <label for="title">Email</label>
              <input type="text" name="SupEmail" class="form-control" placeholder="Enter email" maxlength="30"
                >
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" href="insertsupplier.php" name="insertData">Save</button>
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
              <strong>Supplier No.:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupNo"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Supplier Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupName"></div>
            </div>
            <!-- <div class="col-sm-5 col-xs-6 tital " >
              <strong>Company Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupCompany"></div>
            </div> -->
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Department:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewDepartment"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Address:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupAdd"></div>
            </div>
            
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Contact No.:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupPhoneNo"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Email:</strong>
            </div>

            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSupEmail"></div>
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
          <form action="updatesupplier.php" method="POST">
            <input type="text" name="updateId" readonly id="updateId">
            <div class="form-group">
              <label for="title">Supplier Name</label>
              <input type="text" name="updateSupName" id="updateSupName" class="form-control" placeholder="Enter supplier name" maxlength="50"
                required>
            </div>
            <!-- <div class="form-group">
              <label for="title">Company Name</label>
              <input type="text" name="updateSupCompany" id="updateSupCompany" class="form-control" placeholder="Enter company name" maxlength="100"
                required>
                </div> -->
            <div class="form-group">
              <label for="title">Department</label>
              <input type="text" name="updateDepartment" id="updateDepartment" class="form-control" placeholder="Enter department" maxlength="30" required>
            </div>
           
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="updateSupAdd" id="updateSupAdd" class="form-control" placeholder="Enter address" maxlength="50"
                required>
             </div>

            <div class="form-group">
              <label for="title">Contact Number</label>
              <input type="text" name="updateSupPhoneNo" id="updateSupPhoneNo" class="form-control" placeholder="Enter contact number" minlength="10" maxlength="15"
                required>
            </div>

               <div class="form-group">
              <label for="title">Email</label>
              <input type="email" name="updateSupEmail" id="updateSupEmail" class="form-control" placeholder="Enter email "  maxlength="50"
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

  <!-- DELETE MODAL >
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletesupplier.php" method="POST">

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
  </div-->

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
        // $('#updateSupCompany').val(data[2]);
        $('#updateDepartment').val(data[2]);
        $('#updateSupAdd').val(data[3]);
        $('#updateSupPhoneNo').val(data[4]);
        $('#updateSupEmail').val(data[5]);      

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

        $('#viewSupNo').text(data[0]);
        $('#viewSupName').text(data[1]);
        // $('#viewSupCompany').text(data[2]);
         $('#viewDepartment').text(data[2]);
        $('#viewSupAdd').text(data[3]);
        $('#viewSupPhoneNo').text(data[4]);
        $('#viewSupEmail').text(data[5]);      

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
  </script>
</body>

</html>