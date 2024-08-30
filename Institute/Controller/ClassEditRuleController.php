<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classid = isset($_POST['classid']) ? $_POST['classid'] : null;
$qualify = array();

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $qualifiedForEdit = $classObj->classQualifiedForEdit($id,$classid);
    if($qualifiedForEdit){
        $qualify['qualify'] = true;
    }else{
        $qualify['qualify'] = false;
    }
    // $qualify['qualify'] = $qualifiedForEdit;
    echo json_encode($qualify);
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