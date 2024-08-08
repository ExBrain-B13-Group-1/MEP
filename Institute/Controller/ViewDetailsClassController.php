<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$id = $_GET['classid'];
$results = $classObj->viewDetailsClass($id);

if($results){
    $encodedResults = urlencode(json_encode($results)); // Encode $results data
    $redirectUrl = "../View/resources/Class/viewdetailsclass.php?data=$encodedResults";
    header("Location: $redirectUrl");
    exit();
}else{
    echo "No Result";
}

// echo "<pre>";
// print_r($results);

?>