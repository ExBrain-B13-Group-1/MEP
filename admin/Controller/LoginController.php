<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/Logins.php';
include __DIR__ . '/common/mailSender.php';
include __DIR__ . '/../Controller/common/randomGenerator.php';

$mail = new SendMail();
$mLogins = new Logins();

$rememberMe = isset($_POST['remember_me']);

$template = file_get_contents("./mailtemplate/eamilTemplate.html");


// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Store email in session
    $_SESSION['email'] = $email;

    // Check admin table
    $admin = $mLogins->authLoginAdmin($email);
    if ($admin) {
        if (password_verify($password, $admin['password']) ) { 
            // Check if "Remember Me" is checked
            if (isset($_POST['remember_me'])) {
                // Set a cookie that lasts for 30 days
                setcookie('admin-email', $email, time() + (86400 * 30), '/'); 
            } else {
                // If "Remember Me" is not checked, remove the cookie
                setcookie('admin-email', '', time() - 3600, '/');
            }
            // Set the cookie for user ID
            setcookie('admin_id', $admin['id'], time() + (86400 * 30), '/'); 

            header("Location: ../View/resources/adminDashboard.php");
            exit();
        } else {
            $_SESSION['ps_error'] = "Incorrect Password!";
            header("Location: ../View/resources/Auth/login.php");
            exit();
        }
    }
    // If email not found
    $_SESSION['email_error'] = "Email does not exist!";
    header("Location: ../View/resources/Auth/login.php");
    exit();
}


// Forgot Password
if (isset($_POST['forgotPs'])) {
    $email = $_POST['email'];
    $password = getRandom(6);

    // Check user table
    $admin = $mLogins->authLoginAdmin($email);
    if ($admin) {
        $success = $mLogins->updateAdminPs($admin['id'], $password);
        if ($success) {
            $_SESSION['email'] = $email; 
            $_SESSION['admin_id'] = $admin['id'];
            $adminName = ucwords(strtolower($admin['first_name'])) . ' ' . ucwords(strtolower($admin['last_name']));
            $template = file_get_contents("./mailtemplate/eamilTemplate.html");
            $template = str_replace("###username",$adminName,$template);
            $template = str_replace("###password",$password,$template);
            // send otp
            $mail->sendMail(
                "$email",
                "Password Verification",
                "$template"
            );
            header("Location: ../View/resources/Auth/otp.php");
            exit();
        }
    }
    // If email not found
    $_SESSION['email_error'] = "Email does not exist!";
    header("Location: ../View/resources/Auth/forgotPassword.php");
    exit();
}


// Send OTP
if (isset($_POST['sendOtp'])) {
    $enteredOtp = $_POST['otp'];
    $email = $_SESSION['email'];

    // Check admin table
    $admin = $mLogins->authLoginAdmin($email);
    if ($admin && password_verify($enteredOtp, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id']; 
        header("Location: ../View/resources/Auth/newPassword.php");
        exit();
    }

    // If OTP is incorrect
    $_SESSION['otp_error'] = "Invalid OTP!";
    header("Location: ../View/resources/Auth/otp.php");
    exit();
}


// Update New Password
if (isset($_POST['updatePassword'])) {
    $password = $_POST['password'];
    $email = $_SESSION['email'];

    if (isset($_SESSION['admin_id'])) {
        $adminId = $_SESSION['admin_id'];
        $success = $mLogins->updateAdminPs($adminId, $password);
        if ($success) {
            unset($_SESSION['email']);
            unset($_SESSION['admin_id']);
            header("Location: ../View/resources/Auth/login.php");
            exit();
        }
    }
}
