<?php 
session_start();
include('connection.php');
// include 'custinvoice.php';
// $invoice = new Invoice();
// $invoice->checkLoggedIn();
// if(!empty($_POST['companyName']) && $_POST['companyName']) {	
// 	$invoice->saveInvoice($_POST);
// 	header("Location:invoice_list.php");	

$sql = "SELECT cus_order.OrderNo,CusPhoneNo,StockName,StockPrice,StockQuantity,OrderQuantity,OrderQuantity*SellingPrice as total,OrderDate,
  CusName,CusAdd,CusEmail,StatusPayment,SellingPrice,AmountPaid,cus_order.Balance FROM stock,cus_order
  where   stock.StockNo = cus_order.StockNo order by OrderNo";

      $data = mysqli_query($conn, $sql) or die (mysqli_error($conn));
// // 
// $test = !empty($_POST['OrderQuantity'])?$_POST['OrderQuantity']:'-';
// $test2 = !empty($_POST['InQuantity'])?$_POST['InQuantity']:'-';
// //trigger error
// // $test=$_POST['OrderQuantity'];
// // $test2=$_POST['InQuantity'];
// if ($test> $test2) {
//   trigger_error("Invalid Quantity",E_USER_WARNING);}
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

<title>Customer Orders</title>
<script src="js/invoice.js"></script>
<link href="css/style2.css" rel="stylesheet">

<div class="container content-invoice">
	<form action="insertcust.php" id="invoice-form" method="post" class="invoice-form" role="form" > 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title" align="center">Invoice </h2>
				<!-- 	<?php //include('menu.php');?>	 -->
				</div>		    		
			</div>
			<br><br>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>From,</h3>
					<p>Maziah</p>
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>To,</h3>
					<div class="form-group">
						<input type="text" class="form-control" name="CusName" id="CusName" placeholder="Company Name" autocomplete="off" required not null>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="CusAdd" id="CusAdd" placeholder=" Address" required not null></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" rows="2" name="CusEmail" id="CusEmail" placeholder="Email">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<!-- <th width="15%">Item No</th> -->
							     <?php 

    include ('connection.php');
    $query = "SELECT * FROM stock "; 
    $result = mysqli_query ($conn, $query) or exit("The query could not be performed");
    
  ?>  
   
   
          <label for="title">Items Name</label>
             <!--  <input type="text" name="StockCat" class="form-control" placeholder="Enter category" maxlength="50"
                required> -->
              <select id="StockNo" name="StockNo" input class="Minput"  required >
    <option value=""></option>
  
    <?php 
     while ( $objresult = mysqli_fetch_array($result) ){
    ?>
    <option value="<?php echo $objresult['StockNo'];?>"><?php echo $objresult['StockNo'];?><?php echo $objresult['StockName'];?></option>
    <?php 
    }
    ?>
            </div>
    </select>

    			

							<!-- <th width="38%">Item Name</th> -->
							<th width="15%">Quantity</th>
							
							<th width="15%">Date</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>

						<!-- 	<td><input type="text" name="StockNo[]" id="StockNo_1" class="form-control" autocomplete="off"></td> -->
							<!-- <td><input type="text" name="StockName[]" id="StockName_1" class="form-control" autocomplete="off"></td> -->
							 	
							<td><input type="number" name="OrderQuantity" id="OrderQuantity" min="1"  class="form-control quantity"  required not null></td>
							

							<td><input type="date" name="OrderDate" id="OrderDate" class="form-control date" required not null></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
					<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h3>Notes: </h3>
					<div class="form-group">
						<textarea class="form-control txt" rows="5" name="StatusPayment" id="StatusPayment" placeholder="Your Notes"></textarea>
					</div>
					<br>
					 <div class="modal-footer">
              <input data-loading-text="Updating Invoice..." type="submit" name="insertData" href="insertcust.php" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
            </div>
					
				</div>
				<!-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" min="1" step="0.01" name="total" id="total" placeholder="Subtotal" required>
							</div>
						</div>
						<br> -->
						<!-- <div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div> -->
					
						<!-- 	<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						<!-- </div> >
						<br>
						<div class="form-group">
							<label>Amount Paid: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="AmountPaid" id="AmountPaid" placeholder="Amount Paid">
							</div>
						</div>
							<br>
						<div class="form-group">
								<br>
							<label>Amount Balance: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="Balance" id="Balance" placeholder="Amount Balance">
							</div>
						</div> -->
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>	

	
                                           
                                           </td>
								</form>		
</div>
</div>	

 <form action="custorder.php" method="post">
        <tr>
          <br></br>  
           
          
          <td><center><input class="btn" type="submit" name="submit" value="BACK" href="custorder.php">
        </center></td>
          
        </tr>
     
        
        <script>function goBack() {
          window.history.back()
        }</script>
      </form>