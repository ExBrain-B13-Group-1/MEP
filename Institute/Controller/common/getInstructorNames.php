<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../../Model/MInstructors.php';

function getAllInstructorNames(){
    if(isset($_COOKIE['institute_id'])){
        $id = $_COOKIE['institute_id'];
        $instructorObj = new MInstructors();
        $results = $instructorObj->getAllInstructorNames($id);
        return $results;
    }else{
        return "No Result";
    }
}

// echo "<pre>";
// print_r(getAllInstructorNames());


?>