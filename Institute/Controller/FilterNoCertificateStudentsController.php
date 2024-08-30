<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Students.php';

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $obj = new Students();
    $certifiedStudents = $obj->getNoCertificateStudents($id);
    echo json_encode($certifiedStudents);
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

?>