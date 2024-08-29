<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/IndicatorOfInstitute.php';

$obj = new IndicatorOfInstitute();

if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];
    $totalclasses = $obj->getTotalClass($id);
    $totalstudents = $obj->getTotalStudent($id);
    $totalinstructors = $obj->getTotalInstructor($id);
} else {
    $totalinstructors = "No Result";
}

// echo "$totalclasses <br/>";
// echo "$totalstudents <br/>";
// echo "$totalinstructors <br/>";
