<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/EnrollmentPending.php';

if(isset($_COOKIE['institute_id'])){
    $name = $_POST['studentname'];
    $id = $_COOKIE['institute_id'];
    $obj = new EnrollmentPending();
    $datas = $obj->getPendingListByStudentName($id,$name);

    // echo "<pre>";
    // print_r($datas);
    echo json_encode($datas);
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

?>