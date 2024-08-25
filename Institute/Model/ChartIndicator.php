<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class ChartIndicator{

    public function getMonthlyTrending(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT MONTH(create_date) as month, COUNT(*) as total_enrollment FROM t_student_classes_enroll GROUP BY MONTH(create_date)"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getStudentDemographics(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT 
                    CASE 
                        WHEN age BETWEEN 18 AND 23 THEN '18-23'
                        WHEN age BETWEEN 24 AND 29 THEN '24-29'
                        WHEN age BETWEEN 30 AND 35 THEN '30-35'
                        ELSE '35+' 
                    END AS age_group, 
                    COUNT(*) AS count, 
                    ROUND((COUNT(*) / (SELECT COUNT(*) FROM m_students)) * 100, 0) AS percentage
                FROM 
                    m_students 
                GROUP BY 
                    age_group;"
            );
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