<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MInstitutePayments.php';

$mInstitutePays = new MInstitutePayment();
$institutePays = $mInstitutePays->getAll();



