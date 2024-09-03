<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';
require_once  __DIR__ . '/../Model/History.php';

$classId = $_POST['classID'];

$historyArr = [
    "module" => "Class",
    "action" => "delete",
    "remark" => "Class Cancelled",
    "instituteid" => $_COOKIE['institute_id']
];

if(isset($_COOKIE['institute_id'])){
    $instituteId = $_COOKIE['institute_id'];
    $classObj = new MClasses();
    $success = $classObj->cancelledClassStatusUpdate($classId,$instituteId);
    if($success){
        $history = new History();
        $history->addHistoryModule($historyArr);
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false));
    }
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