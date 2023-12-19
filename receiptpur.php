<?php
session_start();
include "connection.php";

$Po ="";
if(isset($_GET['PoNo']))
{
$Po= $_GET['PoNo'];
 }
$sql = "SELECT * FROM purchase_order where PoNo='$Po'";
$result = $conn->query($sql);
  $data= $result->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
<head>
  <meta charset="UTF-8">
 


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="table.js">  -->
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  
  <link rel='stylesheet' type='text/css' href='css/style.css' />
  <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
  <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='js/example.js'></script>

 
  <!--title>PHP and MySQL CRUD</title-->


<title>Receipt</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">




<style>

</style>
</head>

<body>

  <div class="container content-invoice">
      <form action="update_pur.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              <br><br><br>
              <h1 class="title" align="center"> Purchase Order </h1>
            <!-- <?php //include('menu.php');?>    -->  
                <br><br><br>
            </div>            
          </div>
            <input id="currency" type="hidden" value="$">
          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <h3>From,</h3>
            <p>Maziah</p>                                           
              </div>          
              <div class="col-xs-12 col-sm-2 col-md-8 col-lg-8 float-right " text-align="center">
                <h3 >To,</h3>
                <div class="form-group col-md-15 right"  align="right">
              <input value="<?php echo $data['CompName']; ?>" type="text"  class="form-control" name="CompName" id="CompName" placeholder="Company Name" autocomplete="off">
            </div>
            <div class="form-group col-md-15 right" align="right">
              <textarea class="form-control" rows="3" name="CompAdd" id="CompAdd" placeholder="Address"><?php echo $data['CompAdd']; ?></textarea>
            </div>
            <div class="form-group col-md-15 right" align="right">
              <input value="<?php echo $data['CompEmail']; ?>" type="text" class="form-control" name="CompEmail" id="CompEmail" placeholder="Company Email" autocomplete="off" align="right">
            </div>
              </div>
            </div>
            <br>  <br>  <br>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered table-hover" id="invoiceItem"> 
              <tr>
                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                <th width="15%">Po No</th>
                <th width="38%">Description</th>
                 <th width="15%">Quantity</th>
                
                <th width="15%">Created Date</th>
              </tr>
              </tr>
              <?php 
              // $count = 0;
               //  while($data = mysqli_fetch_assoc($result)){
                // $count++;
              ?>                
              <tr>
                <td><input class="itemRow" type="checkbox"></td>
             <td><input type="text" value="<?php echo $data["PoNo"]; ?>" name="PoNo" id="PoNo" class="form-control" readonly autocomplete="off"></td>

                <td><input type="text" value="<?php echo $data["Description"]; ?>" name="Description" id="Description" class="form-control"  required></td>     
                <td><input type="number" value="<?php echo $data["Quantity"]; ?>"  min="1" name="Quantity" id="Quantity" class="form-control quantity" autocomplete="off" required></td>
                
                <td><input type="date" value="<?php echo $data["Date"]; ?>" name="Date" id="Date" class="form-control total" autocomplete="off"></td>
                
                <input type="hidden" value="<?php echo $data['PoNo']; ?>" class="form-control" name="PoNo">
              </tr> 
            
            </table>
              </div>
            </div>
            
            <div class="row"> 
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h3>Notes: </h3>
                <div class="form-group">
              <textarea class="form-control txt" rows="5" name="Notes" id="Notes" placeholder="Your Notes"><?php echo $data['Notes']; ?></textarea>
            </div>
            <br>
            <div class="form-group">
              <!-- <input type="hidden" value="<?php //echo $_SESSION['userid']; ?>" class="form-control" name="userId"> -->
              <input type="hidden" value="<?php echo $data['PoNo']; ?>" class="form-control" name="PoNo" id="PoNo">
                  
                </div>
            
              </div>
             <!--  -->
          </div>
            </div>
            <div class="clearfix"></div>            
          </div>
    </form>     
    </div>

          

 <form action="purorder.php" method="post">
        <tr>
          <br></br><br> <br>  <br>  <br>  <br>  <br>  <br>
         
          
          <td><center><input class="btn" type="submit" name="submit" value="BACK" href="purorder.php">
        <input title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;" class="btn" type="submit" name="submit" value="PRINT"> </center></td>
          
        </tr>
        </table>
        
        <script>function goBack() {
          window.history.back()
        }</script>
      </form>
    </div>
    </div>
         
    
             
  </body>
</html>