<?php 
ini_set('display_errors','1');
include "../../../Model/MInstituteTypes.php";

$mTypes = new MInstituteType();
$types = $mTypes->getAll();


