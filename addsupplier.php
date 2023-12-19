<?php 
session_start();
include "connection.php";

$response = array( 
    'status' => 0, 
    'msg' => 'Some problems occurred, please try again.' 
); 
if(!empty($_REQUEST['SupName']) && !empty($_REQUEST['SupCompany']) && !empty($_REQUEST['Deparment'])&& !empty( $_REQUEST['SupAdd']) && !empty($_REQUEST['SupPhoneNo']) && !empty($_REQUEST['SupEmail'])){ 
    $name = $_POST['SupName'];
    $company = $_POST['SupCompany'];
    $department = $_POST['Deparment'];
    $add = $_POST['SupAdd'];
    $phoneno = $_POST['SupPhoneNo'];
    $email = $_POST['SupEmail']; 
     
    // Include the database config file  
     
    $sql ="INSERT INTO supplier(SupName,SupCompany,Department,SupAdd,SupPhoneNo,SupEmail)VALUES ('$name','$company','$department',$add','$phoneno','$email')";
    $insert = $db->query($sql); 
     
    if($insert){ 
        $response['status'] = 1; 
        $response['msg'] = 'Supplier data has been added successfully!'; 
    echo "<meta http-equiv='refresh' content='0; url=supplierlist.php'/>";
    
    } 
}else{ 
    $response['msg'] = 'Please fill all the mandatory fields.'; 
} 
 
echo json_encode($response); 