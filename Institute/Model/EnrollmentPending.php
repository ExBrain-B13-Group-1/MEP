<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class EnrollmentPending{

    /**
     * this method is used for get all coupon code from database
     */
    public function getAllEnrollmentPending($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT pe.*,
                    mc.institute_id,
                    mu.id AS user_id,
                    mu.name AS user_name,
                    mu.email AS user_email,
                    mu.gender,
                    mu.photo,
                    mc.c_title,
                    mc.c_fee,
                    mc.days,
                    mc.start_time,
                    mc.end_time,
                    mc.start_date,
                    mc.end_date
                FROM pending_enrollment AS pe
                INNER JOIN m_classes AS mc ON mc.id = pe.enrolled_class_id
                INNER JOIN m_user AS mu ON mu.id = pe.user_id
                WHERE pe.pending_status = 0 AND mc.institute_id = :id"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getPendingListByStudentName($instituteID, $name) {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            
            $sql = $pdo->prepare(
                "SELECT pe.*,
                    mc.institute_id,
                    mu.id AS s_unique_id,
                    mu.name AS student_name,
                    mu.email AS student_email,
                    mu.gender,
                    mc.c_title,
                    mc.c_fee,
                    mu.contact,
                    mc.days,
                    mc.start_time,
                    mc.end_time,
                    mc.start_date,
                    mc.end_date
                FROM pending_enrollment AS pe
                INNER JOIN m_classes AS mc ON mc.id = pe.enrolled_class_id
                INNER JOIN m_user AS mu ON mu.id = pe.user_id
                WHERE pe.pending_status = 0 AND mc.institute_id = :id AND mu.name LIKE :studentname"
            );
            
            $sql->bindValue(':id', $instituteID);
            // Add wildcard characters for partial matching
            $sql->bindValue(':studentname', '%' . $name . '%');
            
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurred! $th";
        }
    }


    public function getCountForEnrollmentPending($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) AS pending_enrollment_count
                FROM pending_enrollment AS pe
                INNER JOIN m_classes AS mc ON mc.id = pe.enrolled_class_id
                WHERE pe.pending_status = 0 AND mc.institute_id = :id"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['pending_enrollment_count'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getRelatedReceiptImage($userID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT pe.receipt_image
                FROM pending_enrollment AS pe
                WHERE pe.user_id = :id"
            );
            $sql->bindValue(":id",$userID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function updatePendingStatusForReject($userID,$enrolledClassID,$reason){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "UPDATE pending_enrollment AS pe
                    SET pe.pending_status = -1 ,
                    pe.rejected_reason = :reason
                    WHERE pe.user_id = :id AND pe.enrolled_class_id = :enrolledClassID"
            );
            $sql->bindValue(":id",$userID);
            $sql->bindValue(":enrolledClassID",$enrolledClassID);
            $sql->bindValue(":reason",$reason);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function updatePendingStatusForApprove($userID,$enrolledClassID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "UPDATE pending_enrollment AS pe
                    SET pe.pending_status = 1 
                    WHERE pe.user_id = :id AND pe.enrolled_class_id = :enrolledClassID"
            );
            $sql->bindValue(":id",$userID);
            $sql->bindValue(":enrolledClassID",$enrolledClassID);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}


?>