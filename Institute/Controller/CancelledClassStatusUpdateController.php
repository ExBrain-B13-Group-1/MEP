<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classId = $_POST['classID'];

if(isset($_COOKIE['institute_id'])){
    $instituteId = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $success = $classObj->cancelledClassStatusUpdate($classId,$instituteId);
    if($success){
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false));
    }
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

// echo "<pre>";
// print_r($classes);

?>