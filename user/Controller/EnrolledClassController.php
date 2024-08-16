<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MStudents.php';
$uploadDir = __DIR__ . '/../../storages/uploads/';

$mUsers = new MUser();
$mStudents = new MStudent();
// $users = $mUsers->getAllUser();

// Check if the cookie for the user ID exists
if (isset($_COOKIE['user_id'])) {
    $userId = $_COOKIE['user_id'];
    // Fetch the user's details based on the ID from the cookie
    $user = $mUsers->getUserById($userId);
    if($user){
        $student = $mStudents->getStudentId($user[0]['email']);
        if($student){
            $data = $mStudents->getDetailsEnrolled(($student[0]['id']));
            // echo "<pre>";
            // print_r($data);
        }
       
    }

} 


