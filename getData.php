<?php 
// Include the database config file 
session_start();
include "connection.php";

$page = isset($_POST['page']) ? intval($_POST['page']) : 1; 
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10; 
 
$searchTerm = isset($_POST['term']) ? $db->real_escape_string($_POST['term']) : ''; 
 
$offset = ($page-1)*$rows; 
 
$result = array(); 
 
$whereSQL = "SupName LIKE '$searchTerm%' OR SupCompany LIKE '$searchTerm%' OR Department LIKE '$searchTerm%' OR SupAdd LIKE '$searchTerm%' OR SupPhoneNo LIKE '$searchTerm%' OR SupEmail LIKE '$searchTerm%'"; 

$row = $result->fetch_row(); 
$response["supplier"] = $row[0]; 
 
$result = $db->query( "SELECT * FROM supplier WHERE $whereSQL ORDER BY SupNo DESC LIMIT $offset,$rows"); 
 
$users = array(); 
while($row = $result->fetch_assoc()){ 
    array_push($users, $row); 
} 
$response["rows"] = $supplier; 
 
echo json_encode($response);

?>