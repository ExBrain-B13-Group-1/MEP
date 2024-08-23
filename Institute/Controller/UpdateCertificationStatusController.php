<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/UpdateCertificationStatus.php';

header("Access-Control-Allow-Origin:*");		// any website (*)
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");

if(isset($_POST['datas'])){
    $datas = json_decode($_POST['datas'], true); // Decode as associative array
    $dataarr = $datas['updates'];

    $obj = new UpdateCertificationStatus();

    foreach ($dataarr as $update) {
        // Destructure the array
        $student_id = $update['student_id'];
        $certified = $update['certified'] ? 1 : 0;
        $class_id = $update['class_id'];

        // echo $student_id." ".$certified." ".$class_id;

        // Log the data being processed
        // error_log("Updating student_id: $student_id, certified: $certified, class_id: $class_id");

        try {
            $success = $obj->updateCertificationStatus($student_id, $certified, $class_id);
            if(!$success){
                // Log the failure
                error_log("Failed to update certification status for student_id: $student_id");
                echo json_encode(array("success" => false, "message" => "Certification status update failed"));
                exit;
            }
        } catch (Exception $e) {
            // Log the exception
            error_log("Exception occurred: " . $e->getMessage());
            echo json_encode(array("success" => false, "message" => "An error occurred while updating certification status"));
            exit;
        }
    }
    echo json_encode(array("success" => true, "message" => "Certification status updated successfully"));
} else {
    echo json_encode(array("success" => false, "message" => "No updates provided"));
}

?>