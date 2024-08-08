<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../../Model/MClasses.php';

function getAllClassCategories(){
    $cateObj = new MClasses();
    $results = $cateObj->getAllCategories();
    return $results;
}

// echo "<pre>";
// print_r(getAllClassCategories());


?>