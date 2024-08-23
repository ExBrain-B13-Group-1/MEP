<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/common/mailSender.php';

$mail = new SendMail();

// Get other form data
$email = $_POST["email"];
$comment = $_POST["comment"];
// Handle file uploads
$errImage = !empty($_FILES['errImage']['name']) ? $_FILES['errImage']['name'] : null;

// error
if ($email) {
    // send otp
    $mail->sendMail(
        "myanmareduportal@gmail.com",
        "Support Help",
        "$comment, $errImage"
    );
}
