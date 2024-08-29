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

    if ($isVerified && !$isDuplicated) {
        $pending->createPending($user_id, $enrolled_class_id, $receipt_image);
        echo json_encode(["success" => true, "payment_type" => "receipt" , "message" => "Enrollment Successful"]);
    } else {
        echo json_encode(["success" => false, "message" => $isVerified ? "Duplicated Enrollment!" : "Unauthorized! User not verified!"]);
    }
} else {
    $costCoins = $pending->getCostCoins($enrolled_class_id);
    $isVerified = $pending->isVerified($user_id);
    $isAlreadyStudent = $pending->isAlreadyStudent($userEmail);
    $isDuplicatedPendingState = $pending->isDuplicatedForPendingState($user_id, $enrolled_class_id);
    $userCoins = $mCoinRemain->getCoinRemain($user_id);

    if ($isVerified && $userCoins >= $costCoins) {
        $student_id = $isAlreadyStudent ? $dataTransfer->getStudentId($userEmail) : $dataTransfer->createStudent($dataTransfer->getUserDataWithId($user_id)) && $dataTransfer->getStudentId($userEmail);
        $isDuplicatedEnrollClass = $dataTransfer->isDuplicatedForEnrollClass($student_id, $enrolled_class_id);

        if (!$isDuplicatedEnrollClass) {
            $addEnrollTable = $dataTransfer->createEnrollTable($student_id, $enrolled_class_id);
            $updateCoin = $mCoinRemain->updateCoinRemain($user_id, $costCoins);
            // Mail Sends
            echo json_encode(["success" => $addEnrollTable, "payment_type" => "coin" , "updateCoin" => $updateCoin, "message" => $addEnrollTable ? "Enrollment Successful" : "Failed to add enroll table!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Duplicate Enroll!"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => $isVerified ? "Coin Not Enough!" : "Unauthorized! User not verified!"]);
    }
}
