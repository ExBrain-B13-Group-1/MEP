<?php 
ini_set('display_errors','1');
include __DIR__ . '/../../Model/StateRegions.php';

$mStateRegions = new StateRegions();
$stateRegions = $mStateRegions->getAll();

?>


