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

$id = $_COOKIE['admin_id'];

// New Password Update
if ($old_password) {
    // Check user table
    $admin = $mLogins->authLoginAdmin($email);
    if ($admin && password_verify($old_password, $admin['password'])) {
        $success = $mLogins->updateAdminPs($id, $password);
        if ($success) {
            $_SESSION['notification_message'] = "Password Updated Successfully.";
        }
    } else {
        $_SESSION['password_err_message'] = "Incorrect Password! You can try Forgot Password!";
    }
}
