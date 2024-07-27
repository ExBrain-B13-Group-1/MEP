<?php 
ini_set('display_errors','1');
include "../Model/MAdmins.php";

$mAdmins = new MAdmins();
$admins = $mAdmins->getAll();
print_r($admins);

