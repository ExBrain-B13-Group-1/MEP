<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class IndicatorOfInstitute{

    public function getTotalClass(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) as total_classes FROM m_classes"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_classes'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getTotalStudent(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) as total_students FROM m_students"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_students'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getTotalInstructor(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT COUNT(*) as total_instructors FROM m_instructors"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['total_instructors'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }
}

?>