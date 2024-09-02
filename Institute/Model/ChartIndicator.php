<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class ChartIndicator{

    public function getMonthlyTrending($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT MONTH(e.create_date) as month, 
                COUNT(*) as total_enrollment 
                FROM t_student_classes_enroll AS e
                JOIN m_classes c ON e.class_id = c.id
                WHERE c.institute_id = :instituteID
                GROUP BY MONTH(e.create_date);"
            );
            $sql->bindValue(":instituteID",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getStudentDemographics($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT 
                    CASE 
                        WHEN s.age BETWEEN 18 AND 23 THEN '18-23'
                        WHEN s.age BETWEEN 24 AND 29 THEN '24-29'
                        WHEN s.age BETWEEN 30 AND 35 THEN '30-35'
                        ELSE '35+' 
                    END AS age_group, 
                    COUNT(*) AS count, 
                    ROUND((COUNT(*) / (SELECT COUNT(*) FROM m_students s JOIN t_student_classes_enroll e ON s.id = e.student_id JOIN m_classes c ON e.class_id = c.id WHERE c.institute_id = :instituteID)) * 100, 0) AS percentage
                FROM 
                    m_students s
                JOIN 
                    t_student_classes_enroll e ON s.id = e.student_id
                JOIN 
                    m_classes c ON e.class_id = c.id
                WHERE 
                    c.institute_id = :instituteID
                GROUP BY 
                    age_group;"
            );
            $sql->bindValue(":instituteID",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getMonthlyIncome($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT 
                MONTH(pe.create_date) as month, 
                SUM(pe.coin_amt * 1000) + SUM(pe.cash_amt) as total_income 
                FROM 
                m_classes AS mc
                INNER JOIN 
                pending_enrollment AS pe ON pe.enrolled_class_id = mc.id
                WHERE 
                mc.institute_id = :instituteID AND pe.pending_status = 1
                GROUP BY 
                MONTH(pe.create_date);"
            );
            $sql->bindValue(":instituteID",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getMonthlyCoinUsage($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT 
                MONTH(cu.create_date) as month, 
                SUM(cu.coin_amount) as total_coin 
                FROM coin_usage_history AS cu
                WHERE cu.institute_id = :instituteID
                GROUP BY MONTH(cu.create_date)"
            );
            $sql->bindValue(":instituteID",$instituteID);
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