<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$finishedclasses = $classObj->finishedClasses();

echo json_encode($finishedclasses);

?>