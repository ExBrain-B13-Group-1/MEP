<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$results = $classObj->getStudentsAlsoEnrolled();

if ($results) {
    echo json_encode($results);
} else {
    echo "No Result";
}

// echo "<pre>";
// print_r($results);

?>
