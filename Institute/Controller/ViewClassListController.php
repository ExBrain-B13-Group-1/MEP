<?php 

ini_set('display_errors','1');
include "../Model/MClasses.php";

$classObj = new MClasses();
$classes = $classObj->getAllClasses();

echo json_encode($classes);

?>