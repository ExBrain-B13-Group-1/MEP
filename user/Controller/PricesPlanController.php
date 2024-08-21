<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MPricesPlan.php';

$mPrices = new MPricesPlan();
$prices = $mPrices->getAll();

