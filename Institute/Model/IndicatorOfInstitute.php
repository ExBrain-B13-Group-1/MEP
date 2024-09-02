<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class IndicatorOfInstitute{

    public function getTotalClass($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) as total_classes FROM m_classes WHERE del_flg != 1 AND institute_id = :id"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_classes'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getTotalStudent($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(DISTINCT s.id) as total_students 
                    FROM m_students AS s
                    INNER JOIN t_student_classes_enroll AS tsce ON tsce.student_id = s.id
                    INNER JOIN m_classes AS c ON tsce.class_id = c.id
                    WHERE s.del_flg = 0 AND c.institute_id = :id"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_students'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getTotalInstructor($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) as total_instructors FROM m_instructors WHERE del_flg != 1 AND institute_id = :id"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_instructors'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getTotalCash($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT SUM(pe.cash_amt) AS total_cash_amt
                FROM m_classes AS mc
                INNER JOIN pending_enrollment AS pe ON pe.enrolled_class_id = mc.id
                WHERE mc.institute_id = :id AND pe.pending_status = 1;"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_cash_amt'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getTotalCoin($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT SUM(pe.coin_amt) AS total_coin_amt
                FROM m_classes AS mc
                INNER JOIN pending_enrollment AS pe ON pe.enrolled_class_id = mc.id
                WHERE mc.institute_id = :id AND pe.pending_status = 1;"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_coin_amt'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getRecentEnrollments($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT tsce.create_date,ms.name, mc.c_title, pe.cash_amt, pe.coin_amt
                    FROM m_students AS ms 
                    INNER JOIN t_student_classes_enroll AS tsce ON tsce.student_id = ms.id
                    INNER JOIN m_classes AS mc ON mc.id = tsce.class_id
                    INNER JOIN pending_enrollment AS pe ON pe.enrolled_class_id = mc.id
                    WHERE mc.institute_id = :id
                    ORDER BY tsce.create_date DESC
                    LIMIT 8"
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


    public function getTodayUsageCoinHistory($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT cu.*,
                    mc.c_title,
                    mc.c_fee
                FROM coin_usage_history AS cu
                INNER JOIN m_institutes AS mit ON mit.id = cu.institute_id
                INNER JOIN m_classes AS mc ON mc.id = cu.class_id
                WHERE cu.institute_id = :id
                AND DATE(cu.create_date) = CURDATE()
                ORDER BY cu.update_date DESC;"
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

}

?>