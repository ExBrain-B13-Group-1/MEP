<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MInstructors.php';
require_once  __DIR__ . '/../Model/History.php';    

$instructorId = isset($_POST['instructorid']) ? $_POST['instructorid'] : null;

if (!$instructorId) {
    echo json_encode(array("success" => false, "message" => "Instructor ID is missing"));
    exit;
}

$historyArr = [
    "module" => "Instructor",
    "action" => "delete",
    "remark" => "Instructor Deleted",
    "instituteid" => $_COOKIE['institute_id']
];

if(isset($_COOKIE['institute_id'])){
    $instituteId = $_COOKIE['institute_id'];
    $instructorObj = new MInstructors();
    $success = $instructorObj->updateDeleteFlagUpdate($instructorId,$instituteId);
    if($success){
        $history = new History();
        $history->addHistoryModule($historyArr);
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false, "message" => "Failed to update delete flag"));
    }
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

?>