<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$classes = $classObj->getAllClasses();

echo json_encode($classes);

// echo "<pre>";
// print_r($classes);

?>