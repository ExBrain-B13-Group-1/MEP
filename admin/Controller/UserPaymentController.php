<?php 
ini_set('display_errors','1');
include "../../Model/MUserPayments.php";

$mUserPays = new MUserPayment();
$userPays = $mUserPays->getAll();
// echo "<pre>";
// print_r($bankings);


