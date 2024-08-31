<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';


if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $qualifiedClasses = $classObj->classListQualifiedForDelete($id);
    echo json_encode($qualifiedClasses);
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

// echo "<pre>";
// print_r($classes);

?>