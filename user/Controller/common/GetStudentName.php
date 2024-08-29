<?php

session_start();
require_once __DIR__ . '/../../Model/MStudents.php';

$studentObj = new MStudent();

function GetStudentName($id)
{
    $studentObj = new MStudent();
    $studentName = $studentObj->getStudentNameAndEmail($id);
    return $studentName;
}

// echo "<pre>";
// print_r(GetStudentName(37));
// echo "</pre>";

?>