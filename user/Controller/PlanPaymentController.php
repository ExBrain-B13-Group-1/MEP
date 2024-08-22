<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MPricesPlan.php';
include __DIR__ . '/../Model/MUserPayments.php';

$mPrices = new MPricesPlan();
$mUserPayments = new MUserPayment();

// Get other form data
$label = $_POST["label"];
$banking_id = isset($_POST["banking_id"]) ? $_POST["banking_id"] : null;
$pay_id = isset($_POST["pay_id"]) ? $_POST["pay_id"] : null;

$id = null;
$planIds = $mPrices->getPlanId($label);
$planId = $planIds[0];

if (isset($_COOKIE['user_id'])) {
    $id = $_COOKIE['user_id'];
    $success = $mUserPayments->createPayment($id, $planId, $banking_id, $pay_id);
    if ($success) {
        // Check if the user is Pro
        $isPro = $mUserPayments->checkProPlan($id, 1);
        
        if ($isPro) {
            setcookie('pro_user_id', $id, time() + (86400 * 365), '/');
        } 
        $_SESSION['notification_message'] = "Purchased Plan Successfully.";
    }
   
} elseif (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];
}
