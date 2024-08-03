<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MInstitutes.php';

$mInstitutes = new MInstitute();
$institutes = $mInstitutes->getAllInstitute();
// echo "<pre>";
// print_r($institutes);


