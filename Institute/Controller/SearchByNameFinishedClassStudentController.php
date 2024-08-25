<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

if(isset($_COOKIE['institute_id'])){
    $name = $_POST['studentname'];
    $classid = $_POST['classid'];
    $obj = new Students();
    $certifiedStudents = $obj->getFinishedClassStudentListByName($classid,$name);
    echo json_encode($certifiedStudents);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>