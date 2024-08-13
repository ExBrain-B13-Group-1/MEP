<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/Logins.php';

$mLogins = new Logins();

$old_password = $_POST["old_password"];
$password = $_POST['password'];
$email = $_POST['email'];

echo $old_password;
echo $password;

$id = $_COOKIE['user_id'];

// New Password Update
if ($old_password) {
    // Check user table
    $user = $mLogins->authLoginUser($email);
    if ($user && password_verify($old_password, $user['password'])) {
        $success = $mLogins->updateUserPs($id, $password);
        if ($success) {
            $_SESSION['notification_message'] = "Password Updated Successfully.";
        }
    } else {
        $_SESSION['password_err_message'] = "Incorrect Password! You can try Forgot Password!";
    }
}
