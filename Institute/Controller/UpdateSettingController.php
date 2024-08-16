<?php 

// header("Access-Control-Allow-Origin:*");		// any website (*)
// header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
// header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Settings.php';

$photo = $_FILES['image'];
$institute_name = $_POST['institutename'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$address = $_POST['address'];

$datas = [
    "photo"=>$photo,
    "institute_name"=>$institute_name,
    "email"=>$email,
    "phone"=>$phone,
    "website"=>$website,
    "address"=>$address
];


// echo "<pre>";
// print_r($datas);


if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $obj = new Settings();
    $success = $obj->updateSetting($datas,$id);
    if($success){
        echo json_encode($datas);
    }else{
        echo "Fail Update";
    }
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>