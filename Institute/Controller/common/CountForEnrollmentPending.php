<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../../Model/EnrollmentPending.php';

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $obj = new EnrollmentPending();
    $count = $obj->getCountForEnrollmentPending($id);
    // echo "$results";
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}


?>