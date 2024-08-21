<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

$classObj = new MInstructors();
$id = $_GET['instructorid'];
$results = $classObj->viewDetailsInstructor($id);

if($results){
    $encodedResults = urlencode(json_encode($results)); // Encode $results data
    $redirectUrlForView = "http://localhost/MEP/Institute/View/resources/Instructor/viewinstructor.php?data=$encodedResults";
    header("Location: $redirectUrlForView");
    exit();
}else{
    echo "No Result";
}

// echo "<pre>";
// print_r($results);

?>