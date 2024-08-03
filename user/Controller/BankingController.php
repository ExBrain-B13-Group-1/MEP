<?php 
ini_set('display_errors','1');
include "../../../Model/MBankings.php";

$mBankings = new MBankings();
$bankings = $mBankings->getAll();
// echo "<pre>";
// print_r($bankings);


