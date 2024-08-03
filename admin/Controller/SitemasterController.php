<?php
ini_set('display_errors', '1');
include "../../Model/MSitemaster.php";

$mSites = new MSitemaster();
$sites = $mSites->getAll();

// echo "<pre>";
// print_r($sites);
if (isset($_POST["update"])) {
    echo "hit";
    $id = $_POST['id'];
    $slogan = $_POST['slogan'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $success = $mSites->updateHome($id,$slogan,$title,$description);
    if($success){
        echo "success";
    }else{
        echo "failed";
    }
}
