<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

$instructorId = isset($_POST['instructorid']) ? $_POST['instructorid'] : null;

if (!$instructorId) {
    echo json_encode(array("success" => false, "message" => "Instructor ID is missing"));
    exit;
}

if(isset($_COOKIE['institute_id'])){
    $instituteId = $_COOKIE['institute_id'];
    $instructorObj = new MInstructors();
    $success = $instructorObj->updateDeleteFlagUpdate($instructorId,$instituteId);
    if($success){
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false, "message" => "Failed to update delete flag"));
    }
}else{
    echo json_encode(array("success" => false, "message" => "Session timed out"));
}

?>