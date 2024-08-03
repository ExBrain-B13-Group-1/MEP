<?php 
ini_set('display_errors','1');
include "../../Model/MUsers.php";

$mUsers = new MUser();
$users = $mUsers->getAllUser();
// echo "<pre>";
// print_r($users);


