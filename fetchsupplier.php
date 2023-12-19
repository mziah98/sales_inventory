<?php include 'menu.php'; ?>
<?php include 'listofsupplier2.php'; ?>


<?php
//session_start();
include "connection.php";
//fetch_data.php

$connection = new PDO("mysql:host=localhost;dbname=sales", "root", "");

$method = $_SERVER['REQUEST_METHOD'];


if($method == 'POST')
{
 $data = array(
  ':name'   => "%" . $_POST['SupName'] . "%",
  ':company'   => "%" . $_POST['SupCompany'] . "%",
  ':add'     => "%" . $_POST['SupAdd'] . "%",
  ':phoneno'    => "%" . $_POST['SupPhoneNo'] . "%",
  ':email'    => "%" . $_POST['SupEmail'] . "%"

 );
}
 $query = "SELECT * FROM supplier WHERE SupName LIKE :name   AND SupCompany LIKE :company AND SupAdd LIKE :add AND SupPhoneNo LIKE :phoneno AND SupEmail LIKE :email  ORDER BY SupNo DESC";

 $statement = $connection->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['SupNo'],   
   'name'  => $row['SupName'],
   'company'   => $row['SupCompany'],
   'add'    => $row['SupAdd'],
   'phoneno'   => $row['SupPhoneNo'],
   'email'   => $row['SupEmail']
  );
 }

 header("Content-Type: application/json");
 echo json_encode($output);
//}

if($method == "POST")
{
 $data = array(
  //':first_name'  => $_POST['first_name'],
  ':id'    => $_POST['SupNo'],   
   ':name'  => $_POST['SupName'],
   ':company'   => $_POST['SupCompany'],
   ':add'    => $_POST['SupAdd'],
   ':phoneno'   => $_POST['SupPhoneNo'],
   ':email'   => $_POST['SupEmail']
 );

 $query = "INSERT INTO supplier (SupName, SupCompany,SupAdd, SupPhoneNo,SupEmail) VALUES (:name, :company, :add, :phoneno,:email)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
 // ':id'   => $_PUT['id'],
  ':id'    => $_PUT['SupNo'],   
   ':name'  => $_PUT['SupName'],
   ':company'   => $_PUT['SupCompany'],
   ':add'    => $_PUT['SupAdd'],
   ':phoneno'   => $_PUT['SupPhoneNo'],
   ':email'   => $_PUT['SupEmail']
 );
 $query = "
 UPDATE supplier 
 SET SupName= :name, 
 SupCompany = :company, 
 SupAdd = :add, 
 SupPhoneNo = :phoneno,
 SupEmail = :email,

 WHERE SupNo = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM supplier WHERE SupNo= '".$_DELETE["SupNo"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>