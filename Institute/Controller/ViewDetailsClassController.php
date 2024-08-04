<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$id = $_GET['id'];
$result = $classObj->viewDetailsClass($id);


?>