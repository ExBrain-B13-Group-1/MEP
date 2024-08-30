<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/EnrollmentPending.php';
require_once  __DIR__ . '/../Controller/common/mailSender.php';
require_once  __DIR__ . '/../Model/MInstitutes.php';
require_once  __DIR__ . '/../Model/MClassApproveAndReject.php';
require_once  __DIR__ . '/../Model/DataTransfer.php';

header("Access-Control-Allow-Origin:*");		// any website (*)
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");
header('Content-Type: application/json'); // Set content type to JSON

$mInstitutes = new MInstitute();
$instituteName = "";

// Check if the cookie for the user ID exists
if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];
    // Fetch the user's details based on the ID from the cookie
    $institute = $mInstitutes->getInstituteInfo($id);
    // echo "<pre>";
    // print_r($institute);
    $instituteName = $institute['name'];
} else {
    echo "No user ID cookie found.";
}

function binaryDaysToFormatted($binaryDays) {
    $daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    $formattedDays = [];

    for ($i = 0; $i < 7; $i++) {
        if ($binaryDays & (1 << $i)) {
            $formattedDays[] = $daysOfWeek[$i];
        }
    }
    return implode(", ", $formattedDays);
}

if (isset($_POST['datas']) && !empty($_POST['datas'])) {
    $datas = $_POST['datas'];
    $dataobj = json_decode($datas);

    if (isset($dataobj->user_id, $dataobj->user_email, $dataobj->meetingID, 
        $dataobj->meetingPassword, $dataobj->classTitle, 
        $dataobj->startDate, $dataobj->endDate, $dataobj->days, 
        $dataobj->start_time, $dataobj->end_time, $dataobj->enrolled_class_id)) {

        $user_id = $dataobj->user_id;
        $user_email = $dataobj->user_email;
        $days = binaryDaysToFormatted($dataobj->days); // Updated line
        $start_time = (new DateTime($dataobj->start_time))->format('h:i A');
        $end_time = (new DateTime($dataobj->end_time))->format('h:i A');
        $meetingID = $dataobj->meetingID;
        $meetingPassword = $dataobj->meetingPassword;
        $classTitle = $dataobj->classTitle;
        $startDate = (new DateTime($dataobj->startDate))->format('Y-m-d');
        $endDate = (new DateTime($dataobj->endDate))->format('Y-m-d');
        $enrolled_class_id = $dataobj->enrolled_class_id;

        $obj = new EnrollmentPending(); // Fixed typo in class name
        $classApproveAndReject = new MClassApproveAndReject();
        $dataTransfer = new DataTransfer();
        $isAlreadyStudent = $classApproveAndReject->isAlreadyStudent($user_email);
        if ($isAlreadyStudent) {
            $student_id = $classApproveAndReject->getStudentByEmail($user_email);
        } else {
            $dataTransfer->createStudent($dataTransfer->getUserDataWithId($user_id));
            $student_id = $classApproveAndReject->getStudentByEmail($user_email);
        }
        $addEnrollTable = $dataTransfer->createEnrollTable($student_id['id'], $enrolled_class_id);
        $success = $obj->updatePendingStatusForApprove($user_id,$enrolled_class_id);

        // echo json_encode(array("isStudent" => $isAlreadyStudent, "student_id" => $student_id, "enrolled_class_id" => $enrolled_class_id, "addEnrollTable" => $addEnrollTable));

        $datas = [
            "success" => $success,  
            "message" => "Approved Enrollment",
        ];

        if ($success) {
            $bodyText = "
                Dear Student, <br/>

                Your enrollment has been approved. Here are the details: <br/><br/>

                Meeting ID: $meetingID <br/>
                Meeting Password: $meetingPassword <br/>
                Class Title: $classTitle <br/>
                Days: $days <br/>
                Start Time: $start_time <br/>
                End Time: $end_time <br/><br/> 
                Start Date: $startDate <br/>
                End Date: $endDate <br/><br/>

                Best regards, <br/>
                $instituteName
            ";
            $obj = new SendMail();
            $obj->sendMail($user_email, "Approved Enrollment", $bodyText);   
            echo json_encode($datas);
        } else {
            echo json_encode(array("success" => false, "message" => "Failed to update enrollment status")); // Use json_encode for failure response
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