<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

if(isset($_COOKIE['institute_id'])){
    $name = $_POST['studentname'];
    $id = $_COOKIE['institute_id'];
    $obj = new Students();
    $students = $obj->getStudentsFilterByName($id,$name);
    echo json_encode($students);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>