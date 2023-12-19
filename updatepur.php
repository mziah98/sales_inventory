<?php 
session_start();
include('connection.php');

// $invoice = new Invoice();
// $invoice->checkLoggedIn();
$id = isset($_GET['PoNo']) ? $_GET['PoNo'] : '';

$sql= "SELECT * FROM purchase_order where PoNo= '$id'";

$result = $conn->query($sql);
  $data= $result->fetch_assoc();

// if(!empty($_POST['cusName']) && $_POST['CusName'] && !empty($_POST['OrderNo']) && $_POST['OrderNo']) { 
//  $invoice->updateInvoice($_POST);  
//  header("Location:custorder.php"); 
// }
// if(!empty($_GET['update_id']) && $_GET['update_id']) {
//  $invoiceValues = $invoice->getInvoice($_GET['update_id']);    
//  $invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);    
// }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<title>Purchase Order</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">

<div class="container content-invoice">
      <form action="update_pur.php" id="invoice-form" method="post" class="invoice-form" role="form" > 
        <div class="load-animate animated fadeInUp">
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              <h1 class="title" align="center"> Purchase Order </h1>
            <!-- <?php //include('menu.php');?>    -->  
            </div>            
          </div>
            <input id="currency" type="hidden" value="$">
          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <h3>From,</h3>
            <p>Maziah</p>                                           
              </div>          
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                <h3>To,</h3>
                <div class="form-group">
              <input value="<?php echo $data['CompName']; ?>" type="text" class="form-control" name="CompName" id="CompName" placeholder="Company Name" autocomplete="off">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="CompAdd" id="CompAdd" placeholder="Address"><?php echo $data['CompAdd']; ?></textarea>
            </div>
            <div class="form-group">
              <input value="<?php echo $data['CompEmail']; ?>" type="text" class="form-control" name="CompEmail" id="CompEmail" placeholder="Company Email" autocomplete="off">
            </div>
              </div>
            </div>
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
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                
                <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                <button class="btn btn-danger" id="removeRows" type="button">- Delete</button>
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
                  <input data-loading-text="Updating Invoice..." type="submit" name="update" href="update_pur.php?PoNo=<?php echo $row["PoNo"] ;?>"value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
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
          <br></br><br> <br>  
            
          
          <td><center><input class="btn" type="submit" name="submit" value="BACK" href="purorder.php">
        
        </tr>
     
        
        <script>function goBack() {
          window.history.back()
        }</script>
      </form>
</div>  
