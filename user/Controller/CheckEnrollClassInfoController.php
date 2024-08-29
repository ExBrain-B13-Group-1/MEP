<?php

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MStudents.php';

$studentObj = new MStudent();

$id = $_GET['classid'];
$results = $studentObj->getEnrollClassInfo($id);

if($results){
    $encodedResults = urlencode(json_encode($results)); // Encode $results data
    $redirectUrl = "http://localhost/MEP/user/View/resources/Auth/enrollment.php?data=$encodedResults";
    header("Location: $redirectUrl");
    exit();
}else{
    echo "No Result";
}

// echo "<pre>";
// print_r($results);

?>