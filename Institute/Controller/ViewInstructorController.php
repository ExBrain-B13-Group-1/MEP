<?php 

ini_set('display_errors','1');
include "../Model/MInstructors.php";

$instructorObj = new MInstructors();
$instructorlists = $instructorObj->getAllInstructors();

echo json_encode($instructorlists);

?>