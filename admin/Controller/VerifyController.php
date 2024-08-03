<?php
include "../Model/MUsers.php";

$vcode = $_GET['vcode'];

$mUsers = new MUsers();

$result = $mUsers->Activate($vcode);

if($result){
    header("Location: ../View/login.php");
}

?>