<?php 
session_start();
include('connection.php');
// 
// $invoice = new Invoice();
// $invoice->checkLoggedIn();
// if(!empty($_POST['companyName']) && $_POST['companyName']) {	
// 	$invoice->saveInvoice($_POST);
// 	header("Location:invoice_list.php");	
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
<link href="css/style2.css" rel="stylesheet">

<div class="container content-invoice">
	<form action="insertpur.php" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title" align="center">Purchase Orders</h2>
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
						<input type="text" class="form-control" name="CompName" id="CompName" placeholder="Company Name" autocomplete="off" required>
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="CompAdd" id="CompAdd" placeholder=" Address" required></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" rows="2" name="CompEmail" id="CompEmail" placeholder="Email">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" /id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<!-- <th width="15%">Item No</th> -->
							  <!-- \ -->


							<th width="38%">Description</th>
							<th width="15%">Quantity</th>
							
							<th width="15%"> Created Date</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>

						<!-- 	<td><input type="text" name="StockNo[]" id="StockNo_1" class="form-control" autocomplete="off"></td> -->
							<td><input type="text" name="Description" id="Description" class="form-control" autocomplete="off" required not null></td>			
							<td><input type="number" name="Quantity" id="Quantity" min="1"  class="form-control quantity"  required not null></td>
							
							<td><input type="date" name="Date" id="Date" class="form-control date" autocomplete="off" required not null></td>
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
						<textarea class="form-control txt" rows="5" name="Notes" id="Notes" placeholder="Your Notes"></textarea>
					</div>
					<br>
					 <div class="modal-footer">
              <input data-loading-text="Updating Invoice..." type="submit" name="insertData" href="insertpur.php" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
            </div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<!-- <div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" min="1" step="0.01" name="TotalPrice" id="TotalPrice" placeholder="Subtotal" required>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
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
						</div>
						<div class="form-group">
							<label>Amount Paid: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
						<div class="form-group">
							<label>Amount Due: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">$</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>
					</span>
				</div> -->
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
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