




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




<?php
session_start();
include "connection.php";

if(isset($_POST['insertcat'])){
    $name = $_POST['CatName'];
	
	//if($password == $confirmPassword){
	
	$sql ="INSERT INTO category(CatName)VALUES ('$name')";
	$execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	if($execute){
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=insertcat.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Success!');</script>";
		 }
	
}

?>


<body>

		 <?php include 'menu.php'; ?>


		 	<br><br><br>
		 <form action="insertcat.php" method="post">
							<fieldset>
                             <center> <h3>Insert new category of Inventory</h3>  </center>
                             <br>


 
                       

		   <center> <div class="container2">
    <!--label><b>Category id</b></label>
    <input type="text1" placeholder="Enter category id" id="category_id" name="category_id" required-->

    <label><b>Name : </b></label>
    <input type="text1"  placeholder="Enter name" id="CatName" name="CatName" required>
	
        <br><br>
    <center><button id="btn2" type="submit" name="submit" >Submit</button> <button id="btn2" type="reset">Reset</button></center>
    </form>
	
  </div>  </center>
  	 </fieldset> 

  	 <?php

	include "connection.php";
	if(isset($_POST['submit'])){
		
		//session_start();
		//$cate_id = $_POST['category_id'];
		$name = $_POST['CatName'];
		
		
		
		$sql = "INSERT INTO category( CatName) VALUES('$name')";
		$execute2 = mysqli_query($conn,$sql) ;
		
	if($execute2)
	{
	
	echo "<script>alert('Insert Data!')</script>";
	echo "<meta http-equiv='refresh' content='0; url=insertcat.php'/>";
	
	 }else{
	     echo "<script>alert('Insert Fail!');</script>";
		 }
	}
	
	
	
?>
							
						    
						</div>
						</br>
							

  	
  	<hr noshade="noshade">  //line panjang
  	<br>
	<h2><center>List Of Category </h2></center>

	<br>
	 <div class="border1">
<form action=""  method="post">
              <table align="right" float="right" border="2"  width="100%" cellpadding="1" cellspacing="0">

                <tr align="center">
               <!--   <td width="5%" style="background-color:;"> No</td> -->
				  
                  
                  <td width="15%" style="background-color:;"> Category Id</td>
                  <td width="30%" style="background-color: ;">Category's Name</td>
                  
				 
                  <td  width="25%" style="background-color:;">Action</td>
                </tr>
				            
				               <?php
								   // $i=0;
								   $query = mysqli_query($conn, "SELECT * FROM category");
								while($result2=mysqli_fetch_array($query))
								{
									// $i++;
								?>
                                
								  <tr>
							<!-- 	  <td><?php// echo $i;?></td> -->
                                    
                                 
                                    <td><?php echo $result2["CatNo"];?></td>
                                       <td><?php echo $result2["CatName"];?></td>


								
									
					<td> 
                  <a button type="button"   class="btn btn-success updateBtn"  data-target="#update"> EDIT</button></a>
              
               <!-- 
                  <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i>  </button> -->

         
            <a button type="button" onClick="return confirm('Are you sure to delete?')" href="deletecat.php?CatNo=<?php echo $result2["CatNo"] ;?>" class="btn btn-danger deleteBtn"  data-target="#delete">
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
          <form action="editcat.php?CatNo=<?php echo $result2["CatNo"] ;?>" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">

            	<!-- <div class="form-group">
              <label for="title">Cat No.</label>
              <input type="text" name="updateCatNo" id="updateCatNo" class="form-control" placeholder="Enter cat no" maxlength="30"
                required>

                </div> -->

              <label for="title">Category's Name</label>
              <input type="text" name="updateCatName" id="updateCatName" class="form-control" placeholder="Enter category's name" maxlength="100"
                required>
            </div>
           
           
            
       </div>
 


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
         </div>
</div>
</div>
</form>

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

        $('#updateId').val(data[0]);
        $('#updateCatName').val(data[1]);
       
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