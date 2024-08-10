<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MInstitutes.php';
require __DIR__ . '/common/mailSender.php';
include __DIR__ . '/../Controller/common/randomGenerator.php';
$uploadDir = __DIR__ . '/../../storages/uploads/';

$mail = new SendMail();
$mInstitutes = new MInstitute();

$response = [];


// Register
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = getRandom(6);
    $type_id = (int)$_POST['type_id'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $state = (int)$_POST['state'];
    $city = (int)$_POST['city'];
    $website = $_POST['website'] ?? null;
    $social = $_POST['social'] ?? null;

    $f_name = $_POST['f_name'];
    $f_email = $_POST['f_email'];
    $f_contact = $_POST['f_contact'];

    // Handle file uploads
    $photo = !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : null;
    $slider_image = !empty($_FILES['slider_image']['name']) ? $_FILES['slider_image']['name'] : null;

    if ($photo) {
        $photoTmpName = $_FILES['photo']['tmp_name'];
        $photoDestination = $uploadDir . $photo;
        move_uploaded_file($photoTmpName, $photoDestination);
    }

    if ($slider_image) {
        $sliderImageTmpName = $_FILES['slider_image']['tmp_name'];
        $sliderImageDestination = $uploadDir . $slider_image;
        move_uploaded_file($sliderImageTmpName, $sliderImageDestination);
    }

    // Handle NRC files
    $nrc_front = !empty($_FILES['nrc_front']['name']) ? $_FILES['nrc_front']['name'] : null;
    $nrc_back = !empty($_FILES['nrc_back']['name']) ? $_FILES['nrc_back']['name'] : null;

    if ($nrc_front) {
        $nrcFrontTmpName = $_FILES['nrc_front']['tmp_name'];
        $nrcFrontDestination = $uploadDir . $nrc_front;
        move_uploaded_file($nrcFrontTmpName, $nrcFrontDestination);
    }

    if ($nrc_back) {
        $nrcBackTmpName = $_FILES['nrc_back']['tmp_name'];
        $nrcBackDestination = $uploadDir . $nrc_back;
        move_uploaded_file($nrcBackTmpName, $nrcBackDestination);
    }


    if (!$mInstitutes->isDuplicateEmail($email)) {
        // Handle file uploads as previously discussed
        $institute_id = $mInstitutes->createInstitute($name, $photo, $slider_image, $email, $password, $type_id, $contact, $address, $state, $city, $website, $social);

        if ($institute_id) {
            $remain_amount = 500;
            $success = $mInstitutes->createFounder($institute_id, $f_name, $f_email, $f_contact, $nrc_front, $nrc_back);
            $successCoin = $mInstitutes->createCoin($institute_id, $remain_amount);
            if ($success && $successCoin) {
                $_SESSION['success_message'] = "success!";
                $response['success'] = true;
                // Send JSON response
                header('Content-Type: application/json');
                header("Location: ../View/resources/Auth/instituteSignUp.php");
                exit();
            } else {
                echo json_encode(["success" => false, "message" => "Error creating founder record."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Error creating institute record."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Email is already Exist! Try another email!"]);
        $response['message'] = "Email is already Exist! Try another email!";
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    header("Location: ../View/resources/Auth/instituteSignUp.php");
}



// echo "<pre>";
// print_r($institute);
