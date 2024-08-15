<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

$student_id = $_GET['id'];

$obj = new Students(); // Fixed typo in class name
$classes = $obj->getCertifiedClasses($student_id);
// header('Content-Type: application/json');
echo json_encode($classes);

?>