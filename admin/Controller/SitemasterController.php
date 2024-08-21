<?php
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/../Model/MSitemaster.php';
$uploadDir = __DIR__ . '/../../storages/uploads/';

$mSites = new MSitemaster();
$sites = $mSites->getAll();

// Update Home
if (isset($_POST["updateHome"])) {
    $id = $_POST['id'];
    $slogan = $_POST['slogan'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $success = $mSites->updateHome($id, $slogan, $title, $description);
    if ($success) {
        $_SESSION['notification_message'] = "Home Contents Updated Successfully.";
        header("Location: ../View/resources/page.php");
    } else {
        echo "failed";
    }
}

// Update About Us
if (isset($_POST["updateAbout"])) {
    $ids = $_POST['id'];
    $lastId = end($ids);
    $titles = $_POST['title'];
    $descriptions = $_POST['description'];
   
    $about_image = !empty($_FILES['about_image']['name']) ? $_FILES['about_image']['name'] : $mSites->getAboutImage($lastId)[0]['about_image'];

    if ($about_image) {
        $photoTmpName = $_FILES['about_image']['tmp_name'];
        $photoDestination = $uploadDir . $about_image;
        move_uploaded_file($photoTmpName, $photoDestination);
    }
    $successImage = $mSites->updateAboutImage($lastId, $about_image);

    foreach ($titles as $index => $title) {
        $description = $descriptions[$index];
        $id = $ids[$index];

        $success = $mSites->updateAbout($id, $title, $description);
        if ($success) {
            $_SESSION['notification_message'] = "About Contents Updated Successfully.";
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}

// Update Service
if (isset($_POST['updateService'])) {
    $ids = $_POST['id'];
    $subtitles = $_POST['subtitle'];
    $descriptions = $_POST['description'];

    foreach ($ids as $index => $id) {
        $subtitle = $subtitles[$index];
        $description = $descriptions[$index];

        $success = $mSites->updateService($id, $subtitle, $description);

        if ($success) {
            $_SESSION['notification_message'] = "Service Contents Updated Successfully.";
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}
