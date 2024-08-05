<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

$instructorId = $_GET['id'];

$obj = new MInstructors(); // Fixed typo in class name
$classes = $obj->getRelatedClasses($instructorId);
// header('Content-Type: application/json');
echo json_encode($classes);

?>