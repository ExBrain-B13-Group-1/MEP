<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MInstitutes.php';
include __DIR__ . '/common/mailSender.php';

$mInstitutes = new MInstitute();
$mail = new SendMail();
$institutes = $mInstitutes->getAllInstitute();

$pendingInstitutes = $mInstitutes->getPendingInstitutes();

// echo "<pre>";
// print_r($institutes);

if (isset($_POST['action'])) {
    echo 'hit';
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'verify') {
        // Handle the verification process
        $success = $mInstitutes->updateVerified($id);
        if ($success) {
            header("Location: ../View/resources/Notification/pendingNotification.php");
        } else {
            echo "Verification failed.";
        }
    } elseif ($action == 'reject') {
        // Handle the rejection process
        $success = $mInstitutes->updateRejected($id);
        if ($success) {
            header("Location: ../View/resources/Notification/pendingNotification.php");
        } else {
            echo "Rejection failed.";
        }
    } else {
        echo "Invalid action";
    }
}


if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $institute = $mInstitutes->getInstitute($id);
} 


// echo "<pre>";
// print_r($institute);
