<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MStateRegions.php';

$mStateRegions = new MStateRegion();
$stateRegions = $mStateRegions->getAll();


