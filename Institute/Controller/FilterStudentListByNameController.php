<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

if(isset($_COOKIE['institute_id'])){
    $name = $_POST['studentname'];
    $id = $_COOKIE['institute_id'];
    $obj = new Students();
    $certifiedStudents = $obj->getStudentsFilterByName($id,$name);
    echo json_encode($certifiedStudents);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>