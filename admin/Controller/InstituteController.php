<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MInstitutes.php';

$mInstitutes = new MInstitute();
$institutes = $mInstitutes->getAllInstitute();

$pendingInstitutes = $mInstitutes->getPendingInstitutes();

// echo "<pre>";
// print_r($institutes);

if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'verify') {
        // Handle the verification process
        $success = $mInstitutes->updateVerified($id);
        if ($success) {
            header("Location: ../View/resources/Notification/pendingNotification.php");
        } else {
            echo "Verification failed.";
        }
    } elseif ($action === 'reject') {
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

// // Get parameters from the URL
// $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// $action = isset($_GET['action']) ? $_GET['action'] : '';

// // Check if the action is valid
// if ($id > 0 && $action === 'view') {
//     // Get the institute data based on the ID
//     $institute = $mInstitutes->getInstitute($id);

//     // Check if data is returned
//     if (empty($institute)) {
//         echo "No data found for the given ID.";
//     }
// } else {
//     $institute = []; // Default to an empty array if conditions aren't met
// }

// echo "<pre>";
// print_r($institute);
