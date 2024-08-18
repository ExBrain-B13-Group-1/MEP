<?php

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstitutes.php';
require_once  __DIR__ . '/../Model/MInstructors.php';
require_once  __DIR__ . '/../Controller/common/GenerateInstructorId.php';

$mInstitutes = new MInstitute();

if (isset($_POST["submit"]) && isset($_COOKIE['institute_id'])) {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $id = $_COOKIE['institute_id'];
    $instituteInfos = $mInstitutes->getInstituteInfo($id);
    $instututeID = $instituteInfos['id'];
    $instructorObj = new MInstructors();
    $lastID = $instructorObj->getLatestInstructorID($instituteInfos['id']);
    $newInstructorID = generateInstructorID($lastID);

    // Directory where files will be uploaded
    $uploadDir = "../storages/uploads/";

    // Ensure the upload directory exists and has the correct permissions
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777);
    }

    // if already exists permission update 
    if (is_dir($uploadDir)) {
        chmod($uploadDir, 0777);
    }

    $name = $_FILES['image']['name'];

    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';

    $filename = rand(1000, 100000) . "-" . $name;
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowedTypes = array("jpg", "jpeg");
    $tempname = $_FILES["image"]["tmp_name"];
    $targetpath = $uploadDir . basename($filename);

    $instructor_id = $newInstructorID;
    $full_name = $_POST['fullname'];
    $professional = $_POST['professional'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $state_region = $_POST['stateregion'];
    $city = $_POST['city'];
    $bio = $_POST['bio'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $linkedin = $_POST['linkedin'];
    $portfolio = $_POST['portfolio'];
    $instituteid = $instututeID;

    // $classid = $_POST['classid'];
    echo "instructor_id = $instructor_id <br/>";
    echo "photo_path = $filename <br/>";
    echo "full_name = $full_name <br/>";
    echo "professional = $professional <br/>";
    echo "email = $email <br/>";
    echo "phone = $phone <br/>";
    echo "dob = $dob <br/>";
    echo "gender = $gender <br/>";
    echo "address = $address <br/>";
    echo "state_region = $state_region <br/>";
    echo "city = $city <br/>";
    echo "bio = $bio <br/>";
    echo "education = $education <br/>";
    echo "experience = $experience <br/>";
    echo "skills = $skills <br/>";
    echo "linkedin = $linkedin <br/>";
    echo "portfolio = $portfolio <br/>";
    echo "instituteid = $instituteid <br/>";

    $datasarr = [
        "photo" => $filename,
        "instructorid" => $instructor_id,
        "fullname" => $full_name,
        "professional" => $professional,
        "email" => $email,
        "phone" => $phone,
        "dob" => date('Y-m-d', strtotime($dob)),
        "gender" => $gender,
        "address" => $address,
        "stateregion" => $state_region,
        "city" => $city,
        "bio" => $bio,
        "education" => $education,
        "experience" => $experience,
        "skills" => $skills,
        "linkedin" => $linkedin,
        "portfolio" => $portfolio,
        "instituteid" => $instituteid
    ];

    // echo "<pre>";
    // print_r($datasarr);

    // Check if the file extension is allowed
    if (in_array($ext, $allowedTypes)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($tempname, $targetpath)) {
            $instructorObj = new MInstructors();
            $success = $instructorObj->addInstructor($datasarr);
            if($success){
                $id = $instructorObj->recentCreatedInstructorId($instructor_id);
                $redirectUrl = "../Controller/ViewDetailsInstructorController.php?instructorid=$id";
                header("Location: $redirectUrl");
                exit();
            }else{
                echo "Fail modify process.";
            }
        } else {
            echo "Something went wrong while moving the uploaded file.";
        }
    } else {
        echo "Only JPG and JPEG files are allowed.";
    }
}
