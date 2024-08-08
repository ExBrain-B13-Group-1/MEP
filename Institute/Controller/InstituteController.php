<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MInstitutes.php';

$uploadDir = __DIR__ . '/../../storages/uploads/';


$mInstitutes = new MInstitute();


// Check if the cookie for the user ID exists
if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];

    // Fetch the user's details based on the ID from the cookie
    $institute = $mInstitutes->getInstituteById($id);

} else {
    echo "No user ID cookie found.";
}


// echo "<pre>";
// print_r($institute);
