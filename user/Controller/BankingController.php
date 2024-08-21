<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MBankings.php';

$mBankings = new MBankings();
$bankings = $mBankings->getAll();
// echo "<pre>";
// print_r($bankings);


