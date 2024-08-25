<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

$classid = isset($_POST['classid']) ? $_POST['classid'] : null;

// echo $classid;

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $studentObj = new Students();
    $studentList = $studentObj->finishedClassStudentListCertified($classid);
    echo json_encode($studentList);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}




?>