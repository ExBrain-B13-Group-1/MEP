<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $finishedclasses = $classObj->finishedClasses($id);
    echo json_encode($finishedclasses);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}




?>