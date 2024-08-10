<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';


if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $classes = $classObj->getAllClasses($id);
    echo json_encode($classes);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

// echo "<pre>";
// print_r($classes);

?>