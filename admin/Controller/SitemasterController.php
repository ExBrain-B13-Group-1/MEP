<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/../Model/MSitemaster.php';

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
        header("Location: ../View/resources/page.php");
    } else {
        echo "failed";
    }
}

// Update About Us
if (isset($_POST["updateAbout"])) {
    $ids = $_POST['id'];
    $titles = $_POST['title'];
    $descriptions = $_POST['description'];

    foreach ($titles as $index => $title) {
        $description = $descriptions[$index];
        $id = $ids[$index];

        $success = $mSites->updateAbout($id, $title, $description);
        if ($success) {
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
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}
