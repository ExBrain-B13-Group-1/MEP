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

    /**
     * 
     */
    public function getAllCategories(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT cat.id,cat.cat_name FROM m_categories AS cat"
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
                mc.cat_name AS category_name,
                mi.full_name AS instructor_name,
                mit.name AS institute_name
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
                mc.cat_name AS category_name,
                mi.full_name AS instructor_name
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

    public function addClass(array $classdatas,$id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();

            $photo = $classdatas['photo'];
            $title = $classdatas['title'];
            $description = $classdatas['description'];
            $categoryid = $classdatas['categoryid'];
            $startdate = $classdatas['startdate'];
            $enddate = $classdatas['enddate'];
            $days = $classdatas['days'];
            $starttime = $classdatas['starttime'];
            $endtime = $classdatas['endtime'];
            $instructorid = $classdatas['instructorid'];
            $classfee = $classdatas['classfee'];
            $maxenrollment = $classdatas['maxenrollment'];
            $enrollementdeadline = $classdatas['enrollementdeadline'];
            $creditpoint = $classdatas['creditpoint'];

            $sql = $pdo->prepare(
                "UPDATE m_classes
                SET 
                    c_photo = '$photo',                       
                    c_title = '$title',                    
                    c_des = '$description',                     
                    cate_id = $categoryid,                          
                    c_fee = $classfee,                        
                    start_date = '$startdate',            
                    end_date = '$enddate',              
                    start_time = '$starttime',                 
                    end_time = '$endtime',                   
                    days = '$days',                     
                    instructor_id = $instructorid,                    
                    max_enrollment = $maxenrollment,                 
                    enrollment_deadline = '$enrollementdeadline',   
                    credit_point = $creditpoint                   
                WHERE id = :id;
                "
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function modifyClass(array $modifydatas,$id){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();

            $photo = $modifydatas['photo'];
            $title = $modifydatas['title'];
            $description = $modifydatas['description'];
            $categoryid = $modifydatas['categoryid'];
            $startdate = $modifydatas['startdate'];
            $enddate = $modifydatas['enddate'];
            $days = $modifydatas['days'];
            $starttime = $modifydatas['starttime'];
            $endtime = $modifydatas['endtime'];
            $instructorid = $modifydatas['instructorid'];
            $classfee = $modifydatas['classfee'];
            $maxenrollment = $modifydatas['maxenrollment'];
            $enrollementdeadline = $modifydatas['enrollementdeadline'];
            $creditpoint = $modifydatas['creditpoint'];

            $sql = $pdo->prepare(
                "UPDATE m_classes
                SET 
                    c_photo = '$photo',                       
                    c_title = '$title',                    
                    c_des = '$description',                     
                    cate_id = $categoryid,                          
                    c_fee = $classfee,                        
                    start_date = '$startdate',            
                    end_date = '$enddate',              
                    start_time = '$starttime',                 
                    end_time = '$endtime',                   
                    days = '$days',                     
                    instructor_id = $instructorid,                    
                    max_enrollment = $maxenrollment,                 
                    enrollment_deadline = '$enrollementdeadline',   
                    credit_point = $creditpoint                   
                WHERE id = :id;
                "
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function remove($id){
        
    }

}


?>