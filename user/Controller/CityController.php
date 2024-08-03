<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MCities.php';

$mCities = new MCity();
$cities = $mCities->getAll();


