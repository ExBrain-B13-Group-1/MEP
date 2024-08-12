<?php

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';
require_once  __DIR__ . '/../Model/MInstitutes.php';
require_once  __DIR__ . '/../Model/UpdateRemainingCoin.php';
require_once  __DIR__ . '/../Controller/common/GenerateClassId.php';

$mInstitutes = new MInstitute();

if (isset($_POST["submit"]) && isset($_COOKIE['institute_id'])) {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $id = $_COOKIE['institute_id'];
    $instituteInfos = $mInstitutes->getInstituteInfo($id);
    $instututeID = $instituteInfos['id'];
    $classObj = new MClasses();
    $lastID = $classObj->getLatestClassID($instituteInfos['id']);
    $newClassID = generateClassID($lastID);

    // Directory where files will be uploaded
    $uploadDir = "../storages/uploads/";

    // Ensure the upload directory exists and has the correct permissions
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 777, true);
    }

    $name = $_FILES['image']['name'];
    $filename = rand(1000, 100000) . "-" . $name;
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowedTypes = array("jpg", "jpeg");
    $tempname = $_FILES["image"]["tmp_name"];
    $targetpath = $uploadDir . basename($filename);

    $class_id = $newClassID;
    $class_title = $_POST['title'];
    $calss_des = $_POST['description'];
    $category_id = $_POST['category-id'];
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'];

    $binaryDays = $_POST['binarydays'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];

    $instructor_id = $_POST['instructor-id'];
    $class_fee = $_POST['class-fee'];
    $max_enrollment = $_POST['max-enrollment'];
    $enrollment_deadline = $_POST['enrollment-deadline'];
    $creditpoint = $_POST['creditpoint'];
    $instituteid = $instututeID;

    // $classid = $_POST['classid'];
    echo "class_id = $class_id <br/>";
    echo "photo_path = $filename <br/>";
    echo "title = $class_title <br/>";
    echo "description = $calss_des <br/>";
    echo "category = $category_id <br/>";
    echo "start date = $start_date <br/>";
    echo "end date = $end_date <br/>";
    echo "binary days = $binaryDays <br/>";
    echo "start time = $start_time <br/>";
    echo "end time = $end_time <br/>";
    echo "instructor = $instructor_id <br/>";
    echo "class fee = " . str_replace(",", "", $class_fee) . " <br/>";
    echo "max enrollment = $max_enrollment <br/>";
    echo "enrollment deadline = $enrollment_deadline <br/>";
    echo "creditpoint = $creditpoint <br/>";
    echo "instituteid = $instituteid <br/>";

    $datasarr = [
        "photo" => $filename,
        "classid" => $class_id,
        "title" => $class_title,
        "description" => $calss_des,
        "categoryid" => (int)$category_id,
        "startdate" => date('Y-m-d', strtotime($start_date)),
        "enddate" => date('Y-m-d', strtotime($end_date)),
        "days" => $binaryDays,
        "starttime" => $start_time,
        "endtime" => $end_time,
        "instructorid" => (int)$instructor_id,
        "classfee" => (int)str_replace(",", "", $class_fee),
        "maxenrollment" => (int)$max_enrollment,
        "enrollementdeadline" => date('Y-m-d', strtotime($enrollment_deadline)),
        "creditpoint" => (int)$creditpoint,
        "instituteid" => (int)$instituteid
    ];

    echo "<pre>";
    print_r($datasarr);

    // Check if the file extension is allowed
    if (in_array($ext, $allowedTypes)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($tempname, $targetpath)) {
            $classobj = new MClasses();
            $success = $classobj->addClass($datasarr, $instututeID);
            $updateCoinAmt = $instituteInfos['remaining_coin'] - ($creditpoint * 0.1);
            $coinObj = new UpdateRemainingCoin();
            $isUpdateCoin = $coinObj->updateRemainingCoin($updateCoinAmt, $instututeID);
            if ($success && $isUpdateCoin) {
                $classid = $classobj->recentCreatedClassId($class_id);
                $redirectUrl = "../Controller/ViewDetailsClassController.php?classid=$classid";
                header("Location: $redirectUrl");
                exit();
            } else {
                echo "Fail modify process.";
            }
        } else {
            echo "Something went wrong while moving the uploaded file.";
        }
    } else {
        echo "Only JPG and JPEG files are allowed.";
    }
}
