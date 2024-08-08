<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../../Model/MInstructors.php';

function getAllInstructorNames(){
    $classObj = new MInstructors();
    $results = $classObj->getAllInstructorNames();
    return $results;
}

// echo "<pre>";
// print_r(getAllInstructorNames());


?>