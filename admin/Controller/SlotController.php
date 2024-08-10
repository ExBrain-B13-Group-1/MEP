<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MSlots.php';

$mSlots = new MSlot();
$slots = $mSlots->getAll();





