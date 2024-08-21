<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

if(isset($_COOKIE['institute_id'])){
    $title = $_POST['classtitle'];
    $id = $_COOKIE['institute_id'];
    $obj = new MClasses();
    $classes = $obj->getAllClassesBySearchTitle($id,$title);
    echo json_encode($classes);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>