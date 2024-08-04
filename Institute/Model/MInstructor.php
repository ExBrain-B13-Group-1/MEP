<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstructors{

    /**
     * this method is used for get all classes records from database
     */
    public function getAllInstructors(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_instructors"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getRelatedClasses($id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c_title FROM m_classes WHERE instructor_id = $id"
            );
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