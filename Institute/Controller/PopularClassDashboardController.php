<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $obj = new MClasses();
    $datas = $obj->popularClassDashboard($id);
    echo json_encode($datas);
}else{
    echo "<script>alert('Your session is timed out');</script>";
}

?>