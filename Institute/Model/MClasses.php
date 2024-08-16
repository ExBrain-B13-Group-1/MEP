<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MClasses{

    /**
     * this method is used for get all classes records from database
     */
    public function getAllClasses($id){
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
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id 
                WHERE c.institute_id = :id 
                ORDER BY c.c_id DESC"
            );
            $sql->bindValue(":id",$id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getAllClassesBySearchTitle($id, $title) {
        try {
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
                LEFT JOIN m_categories AS mc ON c.cate_id = mc.id 
                WHERE c.institute_id = :id AND c.c_title LIKE :title
                ORDER BY c.c_id DESC"
            );
            $sql->bindValue(":id", $id);
            $sql->bindValue(":title", '%' . $title . '%'); // Using wildcard for partial matching
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
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

    public function finishedClasses($id){
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
                WHERE c.c_status_id = 3 AND c.institute_id = :id;"
            );
            $sql->bindValue(":id",$id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function searchFinishedClassByTitle($id,$title){
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
                WHERE c.c_status_id = 3 AND c.institute_id = :id AND c.c_title LIKE :title"
            );
            $sql->bindValue(":id",$id);
            $sql->bindValue(":title", '%' . $title . '%');
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

    public function addClass(array $classdatas){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            
            $classid = $classdatas['classid'];
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
            $enrollmentdeadline = $classdatas['enrollementdeadline'];
            $creditpoint = $classdatas['creditpoint'];
            $instituteid = $classdatas['instituteid'];

            $sql = $pdo->prepare(
                "INSERT INTO m_classes (
                    c_id,
                    c_photo,
                    c_title,
                    c_des,
                    cate_id,
                    c_fee,
                    start_date,
                    end_date,
                    start_time,
                    end_time,
                    days,
                    instructor_id,
                    max_enrollment,
                    enrollment_deadline,
                    credit_point,
                    institute_id
                ) VALUES (
                    :classid,
                    :photo,
                    :title,
                    :description,
                    :categoryid,
                    :classfee,
                    :startdate,
                    :enddate,
                    :starttime,
                    :endtime,
                    :days,
                    :instructorid,
                    :maxenrollment,
                    :enrollmentdeadline,
                    :creditpoint,
                    :instituteid
                )"
            );
            
            // Bind parameters
            $sql->bindValue(':classid', $classid);
            $sql->bindValue(':photo', $photo);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':categoryid', $categoryid);
            $sql->bindValue(':classfee', $classfee);
            $sql->bindValue(':startdate', $startdate);
            $sql->bindValue(':enddate', $enddate);
            $sql->bindValue(':starttime', $starttime);
            $sql->bindValue(':endtime', $endtime);
            $sql->bindValue(':days', $days);
            $sql->bindValue(':instructorid', $instructorid);
            $sql->bindValue(':maxenrollment', $maxenrollment);
            $sql->bindValue(':enrollmentdeadline', $enrollmentdeadline);
            $sql->bindValue(':creditpoint', $creditpoint);
            $sql->bindValue(':instituteid', $instituteid);
            
            // Execute the query
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
            $enrollmentdeadline = $modifydatas['enrollementdeadline'];
            $creditpoint = $modifydatas['creditpoint'];

            $sql = $pdo->prepare(
                "UPDATE m_classes
                SET 
                    c_photo = :photo,                       
                    c_title = :title,                    
                    c_des = :description,                     
                    cate_id = :categoryid,                          
                    c_fee = :classfee,                        
                    start_date = :startdate,            
                    end_date = :enddate,              
                    start_time = :starttime,                 
                    end_time = :endtime,                   
                    days = :days,                     
                    instructor_id = :instructorid,                    
                    max_enrollment = :maxenrollment,                 
                    enrollment_deadline = :enrollmentdeadline,   
                    credit_point = :creditpoint                   
                WHERE id = :id"
            );
            
            // Bind parameters
            $sql->bindValue(":photo", $photo);
            $sql->bindValue(":title", $title);
            $sql->bindValue(":description", $description);
            $sql->bindValue(":categoryid", $categoryid);
            $sql->bindValue(":classfee", $classfee);
            $sql->bindValue(":startdate", $startdate);
            $sql->bindValue(":enddate", $enddate);
            $sql->bindValue(":starttime", $starttime);
            $sql->bindValue(":endtime", $endtime);
            $sql->bindValue(":days", $days);
            $sql->bindValue(":instructorid", $instructorid);
            $sql->bindValue(":maxenrollment", $maxenrollment);
            $sql->bindValue(":enrollmentdeadline", $enrollmentdeadline);
            $sql->bindValue(":creditpoint", $creditpoint);
            $sql->bindValue(":id", $id);
            
            // Execute the query
            $sql->execute();
            
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    public function getLatestClassID($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.c_id FROM m_classes AS c 
                WHERE c.institute_id = :id
                ORDER BY c.id DESC LIMIT 1 ;"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            if($results){
                return $results[0]['c_id'];
            }else{
                return "C1000";
            }
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function recentCreatedClassId($generateClassId){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.id FROM m_classes AS c 
                WHERE c.c_id = :id"
            );
            $sql->bindValue(":id",$generateClassId);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['id'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function remove($id){
        
    }

}


?>