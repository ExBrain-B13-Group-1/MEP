<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MAdmins.php';
$uploadDir = __DIR__ . '/../../storages/uploads/';

$mAdmins = new MAdmin();

// Check if the cookie for the user ID exists
if (isset($_COOKIE['admin_id'])) {
    $adminId = $_COOKIE['admin_id'];
    // Fetch the admin's details based on the ID from the cookie
    $admin = $mAdmins->getAdminById($adminId);
} else {
    echo "No Admin ID cookie found.";
}


// if (isset($_POST['updateProfile'])) {
//     // Handle file upload
//     $photo = !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : null;
//     echo $userId;
//     if ($photo) {
//         $photoTmpName = $_FILES['photo']['tmp_name'];
//         $photoDestination = $uploadDir . $photo;
//         move_uploaded_file($photoTmpName, $photoDestination);

//         $success = $mUsers->updateProfile($userId, $photo);
//         if ($success) {
//             $_SESSION['notification_message'] = "Profile photo updated successfully.";
//             header("Location: ../View/resources/profile.php");
//             exit();
//         }
//     }
// }


// if (isset($_POST['register'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     if (!$mUsers->isDuplicateEmail($email)) {
//         // Handle file uploads as previously discussed
//         $user_id = $mUsers->createUser($name, $email, $password);

//         if ($user_id) {
//             $remain_amount = 20;
//             $successCoin = $mUsers->createCoin($user_id, $remain_amount);
//             if ($successCoin) {
//                 header("Location: ../View/resources/Auth/login.php");
//             }
//         } else {
//             echo "Error creating user record.";
//         }
//     } else {
//         $_SESSION['error_message'] = "Email is already Exist! Try another email!";
//         header("Location: ../View/resources/Auth/signUp.php");
//         echo "Email is already Exist!Try another email";
//     }
// }
