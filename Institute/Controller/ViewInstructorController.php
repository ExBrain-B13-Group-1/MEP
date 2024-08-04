<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructor.php';

$instructorObj = new MInstructors();
$instructorlists = $instructorObj->getAllInstructors();


// echo "<pre>";
// print_r($instructorlists);

echo json_encode($instructorlists);

?>