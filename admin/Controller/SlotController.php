<?php 
ini_set('display_errors','1');
include "../../Model/MSlots.php";

$mSlots = new MSlot();
$slots = $mSlots->getAll();



