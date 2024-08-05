<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MUsers.php';

$mUsers = new MUser();
$users = $mUsers->getAllUser();

$pendingUsers = $mUsers->getPendingUsers();
// echo "<pre>";
// print_r($users);

if(isset($_POST['action'])){
    $id = $_POST['id'];
    $action = $_POST['action'];
    echo $action;
    echo $id;

    if ($action === 'verify') {
        // Handle the verification process
        $success = $mUsers->updateVerified($id);  
        if ($success) {
            header("Location: ../View/resources/Notification/pendingNotification.php");
        } else {
            echo "Verification failed.";
        }
    } elseif ($action === 'reject') {
        // Handle the rejection process
        $success = $mUsers->updateRejected($id);
        if ($success) {
            header("Location: ../View/resources/Notification/pendingNotification.php");
        } else {
            echo "Rejection failed.";
        }
    } else {
        echo "Invalid action";
    }
}


