<?php
class custinvoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "sales";   
	private $invoiceUserTable = 'cus_order';	
 //    private $invoiceOrderTable = 'invoice_order';
	// private $invoiceOrderItemTable = 'invoice_order_item';
	// private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	// public function loginUsers($email, $password){
	// 	$sqlQuery = "
	// 		SELECT id, email, first_name, last_name, address, mobile 
	// 		FROM ".$this->invoiceUserTable." 
	// 		WHERE email='".$email."' AND password='".$password."'";
 //        return  $this->getData($sqlQuery);
	// }	
	// public function checkLoggedIn(){
	// 	if(!$_SESSION['userid']) {
	// 		header("Location:index.php");
	// 	}
	// }		
	public function saveInvoice($POST) {		
		$sqlInsert = "
			INSERT INTO ".$this->cus_order."( CusName, CusPhoneNo, CusAdd, CusEmail, StockName,OrderQuantity,SellingPrice,TotalPrice,StatusPayment,Date)
			VALUES ('".$POST['CusName']."', '".$POST['CusPhoneNo']."', '".$POST['CusAdd']."', '".$POST['CusEmail']."', '".$POST['StockName']."', '".$POST['OrderQuantity']."', '".$POST['SellingPrice']."', '".$POST['TotalPrice']."', '".$POST['StatusPayment']."', '".$POST['Date']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		// $lastInsertId = mysqli_insert_id($this->dbConnect);
		// for ($i = 0; $i < count($POST['productCode']); $i++) {
		// 	$sqlInsertItem = "
		// 	INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
		// 	VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
		// 	mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
		
	public function updateInvoice($POST) {
		if($POST['OrderNo']) {	
			$sqlInsert = "
				UPDATE ".$this->cus_order." 
				SET CusName = '".$POST['CusName']."',CusAdd= '".$POST['CusAdd']."', CusPhoneNo = '".$POST['CusPhoneNo']."', CusEmail = '".$POST['CusEmail']."', StockName = '".$POST['StockName']."', OrderQuantity = '".$POST['OrderQuantity']."', SellingPrice = '".$POST['SellingPrice']."',TotalPrice= '".$POST['TotalPrice']."', Date = '".$POST['Date']."' 
				WHERE OrderNo = '".$POST['OrderNo']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		// $this->deletecustomer_order($POST['OrderNo']);
		// for ($i = 0; $i < count($POST['productCode']); $i++) {			
		// 	$sqlInsertItem = "
		// 		INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
		// 		VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
		// 	mysqli_query($this->dbConnect, $sqlInsertItem);			
		// }       	
	}	
	public function getcustlist(){
		$sqlQuery = "
			SELECT * FROM ".$this->cus_order." 
			WHERE OrderNo = '".$_SESSION['OrderNo']."'";
		return  $this->getData($sqlQuery);
	}	
	// public function getInvoice($invoiceId){
	// 	$sqlQuery = "
	// 		SELECT * FROM ".$this->invoiceOrderTable." 
	// 		WHERE user_id = '".$_SESSION['userid']."' AND order_id = '$invoiceId'";
	// 	$result = mysqli_query($this->dbConnect, $sqlQuery);	
	// 	$row = mysqli_fetch_array($result, MYSQL_ASSOC);
	// 	return $row;
	// }	
	// public function getInvoiceItems($invoiceId){
	// 	$sqlQuery = "
	// 		SELECT * FROM ".$this->invoiceOrderItemTable." 
	// 		WHERE order_id = '$invoiceId'";
	// 	return  $this->getData($sqlQuery);	
	// }
	public function deletecustomer_order($OrderNo){
		$sqlQuery = "
			DELETE FROM ".$this->cus_order." 
			WHERE OrderNo = '".$OrderNo."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	// public function deleteInvoice($invoiceId){
	// 	$sqlQuery = "
	// 		DELETE FROM ".$this->invoiceOrderTable." 
	// 		WHERE order_id = '".$invoiceId."'";
	// 	mysqli_query($this->dbConnect, $sqlQuery);	
	// 	$this->deleteInvoiceItems($invoiceId);	
	// 	return 1;
	// }
}
?>