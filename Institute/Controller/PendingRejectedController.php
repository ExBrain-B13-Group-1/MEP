<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/EnrollmentPending.php';
require_once  __DIR__ . '/../Controller/common/mailSender.php';

header("Access-Control-Allow-Origin:*");		// any website (*)
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");
header('Content-Type: application/json'); // Set content type to JSON

if (isset($_POST['datas']) && !empty($_POST['datas'])) {
    $datas = $_POST['datas'];
    $dataobj = json_decode($datas);

    if (isset($dataobj->id, $dataobj->email, $dataobj->reason)) {
        $student_id = $dataobj->id;
        $student_email = $dataobj->email;
        $reason = $dataobj->reason;

        $obj = new EnrollmentPending(); // Fixed typo in class name
        $success = $obj->updatePendingStatusForReject($student_id, $reason);

        $datas = [
            "success" => $success,
            "message" => "Rejected Enrollment",
        ];

        if ($success) {
            $obj = new SendMail();
            $obj->sendMail($student_email, "Rejected Enrollment", $reason);
            echo json_encode($datas);
        } else {
            echo json_encode($datas); // Use json_encode for failure response
        }
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Missing required data fields"
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid input data"
    ]);
}

?>