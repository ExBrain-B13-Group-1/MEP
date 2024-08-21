<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Settings.php';

header("Access-Control-Allow-Origin:*");		// any website (*)
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");

$getdatas = json_decode($_POST['datas']);

$currentpassword = $getdatas->currentpassword;  
$newpassword = $getdatas->newpassword;
$confirmpassword = $getdatas->confirmpassword;

$obj = new Settings();
$hashedPassword = $obj->getCurrentPasswordHash($_COOKIE['institute_id']); // Assuming this method exists and retrieves the hashed password from the database

if(password_verify($currentpassword, $hashedPassword)){
    if($newpassword === $confirmpassword){
        $success = $obj->updatePassword($newpassword,$_COOKIE['institute_id']);
        if($success){
            echo json_encode(array("success"=>true,"message"=>"Password updated successfully"));   
        }else{
            echo json_encode(array("success"=>false,"message"=>"Password update failed"));
        }
    } else {
        echo json_encode(array("success"=>false,"message"=>"New passwords do not match"));
    }
} else {
    echo json_encode(array("success"=>false,"message"=>"Current password is incorrect"));
}

?>