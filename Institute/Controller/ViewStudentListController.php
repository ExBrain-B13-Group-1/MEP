<?php

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';


if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];
    $studentObj = new Students();
    $students = $studentObj->getAllStudents($id);
    echo json_encode($students);
} else {
    echo "<script>alert('Your session is timed out');</script>";
}


// $studentObj = new Students();
// $students = $studentObj->getAllStudents(61);
// echo json_encode($students);
