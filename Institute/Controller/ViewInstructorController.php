<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $instructorObj = new MInstructors();
    $instructorlists = $instructorObj->getAllInstructors(61);
    echo json_encode($instructorlists);
    // echo "<pre>";
    // print_r($instructorlists);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}



?>