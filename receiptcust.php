<?php
session_start();
include "connection.php";

$Po ="";
if(isset($_GET['OrderNo']))
{
$Po= $_GET['OrderNo'];
 }
$sql= "SELECT cus_order.OrderNo,CusPhoneNo,StockName,StockPrice,StockQuantity,OrderQuantity,OrderQuantity*SellingPrice as total,OrderDate,
  CusName,CusAdd,CusEmail,StatusPayment,SellingPrice,AmountPaid,cus_order.Balance FROM stock,cus_order
  where   stock.StockNo = cus_order.StockNo and OrderNo= '$Po'";

// $result = $conn->query($sql);
//   $data= $result->fetch_assoc();

     $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));;

   $data=mysqli_fetch_array($result,MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<!-- jQuery -->
  <!--title>PHP and MySQL CRUD</title-->


<title>Receipt</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">

<div class="container content-invoice">
      <form action="update_cust.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
        <div class="load-animate animated fadeInUp">
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              <br>     <br>    <br>     <br>    <br>
              <h1 class="title" align="center"> Invoice </h1>
                  <br>    <br>   
            <!-- <?php //include('menu.php');?>    -->  
            </div>            
          </div>
            <input id="currency" type="hidden" value="$">
          <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <h3>From,</h3>
            <p>Maziah</p>                                           
              </div>          
              <div class="col-xs-12 col-sm-4 col-md-8 col-lg-8 pull-right" text-align="center">
                <h3>To,</h3>
                <div class="form-group">
              <input value="<?php echo $data['CusName']; ?>" type="text" class="form-control" name="CusName" id="CusName" placeholder="Customer Name" autocomplete="off">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="CusAdd" id="CusAdd" placeholder="Address"><?php echo $data['CusAdd']; ?></textarea>
            </div>
            <div class="form-group">
              <input value="<?php echo $data['CusEmail']; ?>" type="text" class="form-control" name="CusEmail" id="CusEmail" placeholder="Customer Email" autocomplete="off">
            </div>
              </div>
            </div>
            <br><br><br>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered table-hover" id="invoiceItem"> 
              <tr>
                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                <!-- <th width="15%">Item No</th> -->
                <th width="38%">Item Name</th>
                <th width="15%">Quantity</th>
                <th width="15%">Price</th>                
                <th width="15%">Total Price</th>
                <th width="15%">Date</th>
              </tr>
              </tr>
              <?php 
              // $count = 0;
               //  while($data = mysqli_fetch_assoc($result)){
                // $count++;
              ?>                
              <tr>
                <td><input class="itemRow" type="checkbox"></td>
                <!-- <td><input type="text" value="<?php// echo $data["StockNo"]; ?>" name="StockNo[]" id="StockNo_<?php// echo $count; ?>" class="form-control" autocomplete="off"></td> -->

                <td><input type="text" value="<?php echo $data["StockName"]; ?>" name="StockName" id="StockName" class="form-control"  required></td>     
                <td><input type="number" value="<?php echo $data["OrderQuantity"]; ?>"  min="1" name="OrderQuantity" id="OrderQuantity" class="form-control quantity" autocomplete="off" required></td>
                <td><input type="number" value="<?php echo $data["SellingPrice"]; ?>" min="1" step="0.01" name="SellingPrice" id="SellingPrice" class="form-control price" autocomplete="off" required></td>
                <td><input type="number" value="<?php echo $data["total"]; ?>"  min="1" step="0.01" name="total" id="total" class="form-control total" autocomplete="off" required></td>
                <td><input type="date" value="<?php echo $data["OrderDate"]; ?>" name="Date" id="Date" class="form-control total" autocomplete="off"></td>
                
                <input type="hidden" value="<?php echo $data['OrderNo']; ?>" class="form-control" name="OrderNo">
              </tr> 
            
            </table>
              </div>
            </div>
           <!--  <div class="row">
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                
                <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                <button class="btn btn-danger" id="removeRows" type="button">- Delete</button>
              </div>
            </div> -->
            <div class="row"> 
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h3>Notes: </h3>
                <div class="form-group">
              <textarea class="form-control txt" rows="5" name="StatusPayment" id="StatusPayment" placeholder="Your Notes"><?php echo $data['StatusPayment']; ?></textarea>
            </div>
            <br>
            <div class="form-group">
              <!-- <input type="hidden" value="<?php //echo $_SESSION['userid']; ?>" class="form-control" name="userId"> -->
              <input type="hidden" value="<?php echo $data['OrderNo']; ?>" class="form-control" name="OrderNo" id="OrderNo">
                 <!--  <input data-loading-text="Updating Invoice..." type="submit" n href="" value="Print" class="btn btn-success submit_btn invoice-save-btm" button onclick="window.print()"></button>  -->

                </div>
            
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <span class="form-inline">
              <div class="form-group">

                <label>Subtotal: &nbsp;</label>
                <div class="input-group">
                  <div class="input-group-addon currency">$</div>
                  <input value="<?php echo $data['total']; ?>" type="number" class="form-control" name="total" id="total" placeholder="Subtotal">
                </div>
              </div>
              <!-- <div class="form-group">
                <label>Tax Rate: &nbsp;</label>
                <div class="input-group">
                  <input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
                  <div class="input-group-addon">%</div>
                </div>
              </div>
              <div class="form-group">
                <label>Tax Amount: &nbsp;</label>
                <div class="input-group">
                  <div class="input-group-addon currency">$</div>
                  <input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                </div>
              </div>              
              <div class="form-group">
                <label>Total: &nbsp;</label>
                <div class="input-group">
                  <div class="input-group-addon currency">$</div>
                  <input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
                </div>
              </div> >
              <div class="form-group">
                <label>Amount Paid: &nbsp;</label>
                <div class="input-group">
                  <div class="input-group-addon currency">$</div>
                  <input value="<?php echo $data['AmountPaid']; ?>" type="number" class="form-control" name="AmountPaid" id="AmountPaid" placeholder="Amount Paid">
                </div>
              </div>
              <div class="form-group">
                <label>Amount Due: &nbsp;</label>
                <div class="input-group">
                  <div class="input-group-addon currency">$</div>
                  <input value="<?php echo $$data['Balance']; ?>" type="number" class="form-control" name="Balance" id="Balance" placeholder="Amount Due">
                </div>
              </div-->
            </span>
          </div>
            </div>
            <div class="clearfix"></div>            
          </div>
    </form>     
    </div>
</div>  


 <form action="custorder.php" method="post">
        <tr>
          <br></br><br> <br>  
          <br>  <br>  <br>  
          
          <td><center><input class="btn" type="submit" name="submit" value="BACK" href="custorder.php">
        <input title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;" class="btn" type="submit" name="submit" value="PRINT"> </center></td>
          
        </tr>
     
        
        <script>function goBack() {
          window.history.back()
        }</script>
      </form>