<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

$instructorid = isset($_POST['instructorid']) ? $_POST['instructorid'] : null;
$qualify = array();

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $instructorObj = new MInstructors();
    $qualifiedForDelete = $instructorObj->instructorQualifiedForDelete($instructorid,$id);
    // print_r($qualifiedForDelete);
    if($qualifiedForDelete){
        $qualify['qualify'] = true;
    }else{
        $qualify['qualify'] = false;
    }
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