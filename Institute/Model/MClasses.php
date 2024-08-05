<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MClasses{

    /**
     * this method is used for get all classes records from database
     */
    public function getAllClasses(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_classes
                JOIN m_institutes ON m_classes.institute_id = m_institutes.id
                JOIN m_instructors ON m_classes.instructor_id = m_instructors.id"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function viewDetailsClass($id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*, 
                mc.cat_name as c_name,
                mi.full_name
                FROM m_classes AS c
                JOIN m_categories AS mc ON c.cate_id = mc.id
                JOIN m_instructors AS mi ON c.instructor_id = mi.id
                WHERE c.id = :id"
            );
            $sql->bindValue(":id", $id);
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