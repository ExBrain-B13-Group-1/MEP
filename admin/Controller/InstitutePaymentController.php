<?php 
ini_set('display_errors','1');
include "../../Model/MInstitutePayments.php";

$mInstitutePays = new MInstitutePayment();
$institutePays = $mInstitutePays->getAll();
// echo "<pre>";
// print_r($institutePays);


