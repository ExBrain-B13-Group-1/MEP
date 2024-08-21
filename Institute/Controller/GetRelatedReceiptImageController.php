<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/EnrollmentPending.php';

$student_id = $_POST['id'];

$obj = new EnrollmentPending(); // Fixed typo in class name
$image = $obj->getRelatedReceiptImage($student_id);
// header('Content-Type: application/json');
echo json_encode($image);

?>