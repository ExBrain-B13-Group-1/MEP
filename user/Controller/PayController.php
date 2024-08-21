<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MPays.php';

$mPays = new MPays();
$pays = $mPays->getAll();


