<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MUsers.php';
$uploadDir = __DIR__ . '/../../storages/uploads/';

$mUsers = new MUser();

// Get other form data
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$contact = $_POST["contact"];
$gender = $_POST["gender"];

// Handle file uploads
$nrc_front = !empty($_FILES['nrc_front']['name']) ? $_FILES['nrc_front']['name'] : null;

if ($nrc_front) {
    $frontTmpName = $_FILES['nrc_front']['tmp_name'];
    $frontDestination = $uploadDir . $nrc_front;
    move_uploaded_file($frontTmpName, $frontDestination);
}

// Handle file uploads
$nrc_back = !empty($_FILES['nrc_back']['name']) ? $_FILES['nrc_back']['name'] : null;

if ($nrc_back) {
    $backTmpName = $_FILES['nrc_back']['tmp_name'];
    $backDestination = $uploadDir . $nrc_back;
    move_uploaded_file($backTmpName, $backDestination);
}


$id = $_COOKIE['user_id'];
$success = $mUsers->updateVerify($id, $name, $email, $age, $contact, $gender, $nrc_front, $nrc_back, 0);
