<?php 
ini_set('display_errors','1');
include "../../Model/MPricesPlan.php";

$mPrices = new MPricesPlan();
$prices = $mPrices->getAll();



