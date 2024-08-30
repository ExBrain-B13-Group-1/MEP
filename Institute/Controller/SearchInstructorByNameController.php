<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';

if(isset($_COOKIE['institute_id'])){
    $name = $_POST['instructorname'];
    $id = $_COOKIE['institute_id'];
    $obj = new MInstructors();
    $instructors = $obj->searchInstructorByName($id,$name);
    echo json_encode($instructors);
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

?>