<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/EnrollmentPending.php';
require_once  __DIR__ . '/../Controller/common/mailSender.php';

$student_id = $_POST['id'];

$obj = new EnrollmentPending(); // Fixed typo in class name
$success = $obj->updatePendingStatusForApprove($student_id);

if($success){
    $obj = new SendMail();
    $obj->sendMail($student_email,"","");
    echo json_encode("success");
}else{
    echo "Fail";
}

?>