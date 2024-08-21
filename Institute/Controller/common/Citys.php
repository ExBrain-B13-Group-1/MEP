<?php 
ini_set('display_errors','1');
include __DIR__ . '/../../Model/Citys.php';

$mCities = new Citys();
$cities = $mCities->getAll();

// echo "<pre>";
// print_r($cities);

?>