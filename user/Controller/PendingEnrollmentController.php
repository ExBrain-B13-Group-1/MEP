<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/PendingEnrollment.php';
include __DIR__ . '/../Model/MUsers.php';
include __DIR__ . '/../Model/MCoinRemainCheck.php';
include __DIR__ . '/../Model/DataTransfer.php';

$uploadDir = __DIR__ . '/../../storages/uploads/';

$pending = new PendingEnrollment();
$mUsers = new MUser();
$mCoinRemain = new MCoinRemainCheck();
$dataTransfer = new DataTransfer();

// Get other form data
$enrolled_class_id = $_POST["enrolled_class_id"];
$user_id = $_COOKIE['user_id'];
$userEmail = $mUsers->getUserById($user_id)[0]['email'];

// Handle file uploads
$receipt_image = !empty($_FILES['receipt_image']['name']) ? $_FILES['receipt_image']['name'] : null;

if ($receipt_image) {
    move_uploaded_file($_FILES['receipt_image']['tmp_name'], $uploadDir . $receipt_image);
    $isVerified = $pending->isVerified($user_id);
    $isDuplicated = $pending->isDuplicatedForPendingState($user_id, $enrolled_class_id);
    $student_id = $dataTransfer->getStudentId($userEmail);
    $cash_amt = $pending->getCashAmt($enrolled_class_id);
    $coin_amt = 0;    
    if ($isVerified) {
        if (!$isDuplicated) {
            $isDuplicatedEnrollClass = $student_id ? $dataTransfer->isDuplicatedForEnrollClass($student_id, $enrolled_class_id) : false;
            if (!$isDuplicatedEnrollClass) {
                $pending->createPending($user_id, $enrolled_class_id, $receipt_image, $cash_amt, $coin_amt);
                echo json_encode(["success" => true, "payment_type" => "receipt", "message" => "Enrollment Successful"]);
            } else {
                echo json_encode(["success" => false, "message" => "Duplicate Enrolled"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Duplicate Enrolled"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Unauthorized! User not verified!"]);
    }
} else {
    $cash_amt = 0;
    $costCoins = $pending->getCostCoins($enrolled_class_id);
    $isVerified = $pending->isVerified($user_id);
    $isDuplicatedPendingState = $pending->isDuplicatedForPendingState($user_id, $enrolled_class_id);
    $userCoins = $mCoinRemain->getCoinRemain($user_id);

    if ($isVerified && $userCoins >= $costCoins) {
        $student_id = $dataTransfer->getStudentId($userEmail);
        if ($student_id) {
            $isDuplicatedEnrollClass = $dataTransfer->isDuplicatedForEnrollClass($student_id, $enrolled_class_id);
            if (!$isDuplicatedPendingState && !$isDuplicatedEnrollClass) {
                $pending->createPending($user_id, $enrolled_class_id, $receipt_image, $cash_amt, $costCoins);
                echo json_encode(["success" => true, "payment_type" => "coins", "message" => "Enrollment Successful"]);
            } else {
                echo json_encode(["success" => false, "message" => "Duplicate Enrolled"]);
            }
        } else {
            if (!$isDuplicatedPendingState) {
                $pending->createPending($user_id, $enrolled_class_id, $receipt_image, $cash_amt, $costCoins);
                echo json_encode(["success" => true, "payment_type" => "coins", "message" => "Enrollment Successful"]);
            } else {
                echo json_encode(["success" => false, "message" => "Duplicate Enrolled"]);
            }
        }
    } else {
        echo json_encode(["success" => false, "message" => $isVerified ? "Coin Not Enough!" : "Unauthorized! User not verified!"]);
    }
}
