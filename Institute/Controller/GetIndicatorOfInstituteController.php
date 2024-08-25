<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/IndicatorOfInstitute.php';

$obj = new IndicatorOfInstitute();
$totalclasses = $obj->getTotalClass();
$totalstudents = $obj->getTotalStudent();
if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $totalinstructors = $obj->getTotalInstructor($id);
}else{
    $totalinstructors = "No Result";
}

// echo "$totalclasses <br/>";
// echo "$totalstudents <br/>";
// echo "$totalinstructors <br/>";

?>