<?php 
ini_set('display_errors','1');
include "../../Model/MInstitutes.php";

$mInstitutes = new MInstitute();
$institutes = $mInstitutes->getAllInstitute();
// echo "<pre>";
// print_r($institutes);


