<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MUsers.php';

$mUsers = new MUser();

// Get other form data
$first_name = $_POST["first_name"];
$last_name = $_POST['last_name'];
$portfolio = $_POST['portfolio'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];
$telegram = $_POST['telegram'];

$name = $first_name . ' ' . $last_name;
$social_links = implode(',', [$portfolio, $facebook, $instagram, $twitter, $telegram]);

echo $social_links;

$id = $_COOKIE['user_id'];
$success = $mUsers->updateInfors($id, $name, $social_links);
if($success){
    $_SESSION['notification_message'] = "Profile Details Updated Successfully.";
}
