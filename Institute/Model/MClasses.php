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
                "SELECT c.*,
                mit.name AS institute_name,
                mi.full_name AS instructor_name,
                mc.cat_name AS category_name,
                cs.status AS class_status
                FROM m_classes AS c
                LEFT JOIN c_status AS cs ON c.c_status_id = cs.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id;"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function finishedClasses(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.*,
                mc.cat_name AS c_name,
                mi.full_name,
                mit.name
                FROM m_classes AS c
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
                LEFT JOIN m_institutes AS mit ON c.institute_id = mit.id
                WHERE c.c_status_id = 3;"
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
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id
                LEFT JOIN m_instructors AS mi ON c.instructor_id = mi.id
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