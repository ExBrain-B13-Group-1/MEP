<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$title = $_POST['classtitle'];

$classObj = new MClasses();
$classes = $classObj->getClassesByTitle($title);

if($classes){
    echo json_encode(["success" => true,"classes" => $classes] );
}else{
    echo json_encode(["success" => false,"message" => "No classes found"]);
}

?>