<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/IndicatorOfInstitute.php';

$obj = new IndicatorOfInstitute();
$totalclasses = $obj->getTotalClass();
$totalstudents = $obj->getTotalStudent();
$totalinstructors = $obj->getTotalInstructor();

// echo "$totalclasses <br/>";
// echo "$totalstudents <br/>";
// echo "$totalinstructors <br/>";

?>