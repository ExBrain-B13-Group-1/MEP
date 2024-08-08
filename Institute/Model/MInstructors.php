<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstructors{

    /**
     * this method is used for get all instructors records from database
     */
    public function getAllInstructors(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_instructors 
                JOIN m_classes ON m_classes.id = m_instructors.id"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * this method is used for get all instructor's name from database to use in 'select option'
     */
    public function getAllInstructorNames(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT m.id,m.full_name FROM m_instructors AS m"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getRelatedClasses($instructorId){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare("SELECT id,c_title FROM m_classes WHERE instructor_id = :instructorId"); 
            $sql->bindValue(':instructorId', $instructorId);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function add($user_infos){

    }

    public function modify($user_infos,$id){

    }

    public function remove($id){

    }

}


?>