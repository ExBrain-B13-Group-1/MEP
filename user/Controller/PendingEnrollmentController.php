<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/PendingEnrollment.php';
include __DIR__ . '/../Model/MUsers.php';

$uploadDir = __DIR__ . '/../../storages/uploads/';

$pending = new PendingEnrollment();
$mUsers = new MUser();

// Get other form data
$enrolled_class_id = $_POST["enrolled_class_id"];

// Handle file uploads
$receipt_image = !empty($_FILES['receipt_image']['name']) ? $_FILES['receipt_image']['name'] : null;

if ($receipt_image) {
    $frontTmpName = $_FILES['receipt_image']['tmp_name'];
    $frontDestination = $uploadDir . $receipt_image;
    move_uploaded_file($frontTmpName, $frontDestination);
}

$user_id = $_COOKIE['user_id'];
$user = $mUsers->getUserById($user_id);
$userEmail = $user[0]['email'];

// Later combine with user table
if(!$userEmail){
    // $addNewStudent = $pending->createStudent() 
}

$studentData = $pending->getStudentByEmail($userEmail);
$student_id = $studentData['id'];
$isVerified = $pending->isVerified($user_id);
if ($isVerified) {
    echo "authorized";
    $success = $pending->createPending($student_id, $enrolled_class_id, $receipt_image);
}else{
    echo "no-authorized";
}
