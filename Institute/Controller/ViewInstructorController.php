<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

$instructorObj = new MInstructors();
$instructorlists = $instructorObj->getAllInstructors();


echo json_encode($instructorlists);

// echo "<pre>";
// print_r($instructorlists);

?>