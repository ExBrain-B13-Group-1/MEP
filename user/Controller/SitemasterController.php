<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MSitemaster.php';

$mSites = new MSitemaster();
$sites = $mSites->getAll();

// echo "<pre>";
// print_r($sites);

