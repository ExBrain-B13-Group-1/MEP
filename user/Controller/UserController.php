<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MUsers.php';

$mUsers = new MUser();
// $users = $mUsers->getAllUser();


if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$mUsers->isDuplicateEmail($email)) {
        // Handle file uploads as previously discussed
        $user_id = $mUsers->createUser($name, $email, $password);

        if ($user_id) {
            $remain_amount = 20;
            $successCoin = $mUsers->createCoin($user_id, $remain_amount);
            if ($successCoin) {
                header("Location: ../View/resources/Auth/login.php");
            }
        } else {
            echo "Error creating user record.";
        }
    } else {
        $_SESSION['error_message'] = "Email is already Exist! Try another email!";
        header("Location: ../View/resources/Auth/signUp.php");
        echo "Email is already Exist!Try another email";
    }
}
