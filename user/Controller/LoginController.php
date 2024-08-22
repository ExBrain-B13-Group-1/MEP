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

    // Check user table
    $user = $mLogins->authLoginUser($email);
    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Check if "Remember Me" is checked
            if (isset($_POST['remember_me'])) {
                // Set a cookie that lasts for 30 days
                setcookie('user-email', $email, time() + (86400 * 30), '/');
            } else {
                // If "Remember Me" is not checked, remove the cookie
                setcookie('user-email', '', time() - 3600, '/');
            }
            // Set the cookie for user ID
            setcookie('user_id', $user['id'], time() + (86400 * 30), '/');

            // Optional: Clear institute_id
            if (isset($_COOKIE['institute_id'])) {
                setcookie('institute_id', '', time() - 3600, '/');
            }

            header("Location: ../View/resources/home.php");
            exit();
        } else {
            $_SESSION['ps_error'] = "Incorrect Password!";
            header("Location: ../View/resources/Auth/login.php");
            exit();
        }
    }

    // Check institute table
    $institute = $mLogins->authLoginInstitute($email);
    if ($institute) {

        // Check if the institute status is 0 (pending)
        if ($institute['status'] == 0) {
            // Redirect to the pending stage page if the status is 0
            $_SESSION['email'] = $email;
            header("Location: ../View/resources/Auth/pendingStage.php");
            exit();
        }

        if (password_verify($password, $institute['password'])) {
            // Check if "Remember Me" is checked
            if (isset($_POST['remember_me'])) {
                // Set a cookie that lasts for 30 days
                setcookie('institute-email', $email, time() + (86400 * 30), '/');
            } else {
                // If "Remember Me" is not checked, remove the cookie
                setcookie('institute-email', '', time() - 3600, '/');
            }
            // Set the cookie for institute ID
            setcookie('institute_id', $institute['id'], time() + (86400 * 30), '/');

             // Optional: Clear user_id
             if (isset($_COOKIE['user_id'])) {
                setcookie('user_id', '', time() - 3600, '/');
            }

            header("Location: http://localhost/MEP/Institute/View/resources/Dashboard/dashoverview.php");
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
    $user = $mLogins->authLoginUser($email);
    if ($user) {
        $success = $mLogins->updateUserPs($user['id'], $password);
        if ($success) {
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id'];
            $userName = $user['name'];
            $template = file_get_contents("./mailtemplate/eamilTemplate.html");
            $template = str_replace("###username", $userName, $template);
            $template = str_replace("###password", $password, $template);
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

    // Check institute table
    $institute = $mLogins->authLoginInstitute($email);
    if ($institute) {
        $success = $mLogins->updateInstitutePs($institute['id'], $password);
        if ($success) {
            $_SESSION['email'] = $email;
            $_SESSION['institute_id'] = $institute['id'];
            $instituteName = $institute['name'];
            $template = file_get_contents("./mailtemplate/eamilTemplate.html");
            $template = str_replace("###username", $instituteName, $template);
            $template = str_replace("###password", $password, $template);
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

    // Check user table
    $user = $mLogins->authLoginUser($email);
    if ($user && password_verify($enteredOtp, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../View/resources/Auth/newPassword.php");
        exit();
    }

    // Check institute table
    $institute = $mLogins->authLoginInstitute($email);
    if ($institute && password_verify($enteredOtp, $institute['password'])) {
        $_SESSION['institute_id'] = $institute['id'];
        header("Location: ../View/resources/Auth/newPassword.php");
        exit();
    }

    // If OTP is incorrect
    $_SESSION['otp_error'] = "Invalid OTP!";
    header("Location: ../View/resources/Auth/otp.php");
    exit();
}


// New Password Update
if (isset($_POST['updatePassword'])) {
    $password = $_POST['password'];
    $email = $_SESSION['email'];

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $success = $mLogins->updateUserPs($userId, $password);
        if ($success) {
            unset($_SESSION['email']);
            unset($_SESSION['user_id']);
            header("Location: ../View/resources/Auth/login.php");
            exit();
        }
    } elseif (isset($_SESSION['institute_id'])) {
        $instituteId = $_SESSION['institute_id'];
        $success = $mLogins->updateInstitutePs($instituteId, $password);
        if ($success) {
            unset($_SESSION['email']);
            unset($_SESSION['institute_id']);
            header("Location: ../View/resources/Auth/login.php");
            exit();
        }
    }
}
