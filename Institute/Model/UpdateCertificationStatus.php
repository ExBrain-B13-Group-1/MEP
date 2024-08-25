<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class UpdateCertificationStatus{

    /**
     * this method is used for update remaining coin when the institute create class and create event
     */
    public function updateCertificationStatus($studentId, $certified, $classId){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "UPDATE t_student_classes_enroll
                SET certified = :certified
                WHERE student_id = :studentId AND class_id = :classId;"
            );
            $sql->bindValue(":certified", $certified);
            $sql->bindValue(":studentId", $studentId);
            $sql->bindValue(":classId", $classId);
            $result = $sql->execute();
            
            if ($result) {
                return true;
            } else {
                $errorInfo = $sql->errorInfo();
                echo "SQL Error: " . $errorInfo[2];
                return false;
            }
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}