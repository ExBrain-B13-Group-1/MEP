<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Students{

    /**
     * this method is used for get all coupon code from database
     */
    public function getAllStudents($instituteid){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT DISTINCT ms.*
                FROM m_students AS ms
                INNER JOIN t_student_classes_enroll AS tsce ON ms.id = tsce.student_id
                INNER JOIN m_classes AS mc ON tsce.class_id = mc.id
                WHERE mc.institute_id = :id"    
            );
            $sql->bindValue(':id',$instituteid);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getStudentsFilterByName($instituteID, $name) {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            
            $sql = $pdo->prepare(
                "SELECT DISTINCT ms.* 
                 FROM m_students AS ms 
                 INNER JOIN t_student_classes_enroll AS tsce ON tsce.student_id = ms.id
                 INNER JOIN m_classes AS mc ON mc.id = tsce.class_id 
                 INNER JOIN t_student_certifications AS tsc ON tsc.student_id = ms.id
                 WHERE mc.institute_id = :id AND ms.name LIKE :studentname"
            );
            
            $sql->bindValue(':id', $instituteID);
            // Add wildcard characters for partial matching
            $sql->bindValue(':studentname', '%' . $name . '%');
            
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurred! $th";
        }
    }
    

    public function getCertifiedStudentList($instituteID){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT DISTINCT ms.* 
                    FROM m_students AS ms 
                    INNER JOIN t_student_classes_enroll AS tsce ON tsce.student_id = ms.id
                    INNER JOIN m_classes AS mc ON mc.id = tsce.class_id 
                    INNER JOIN t_student_certifications AS tsc ON tsc.student_id = ms.id
                    WHERE mc.institute_id = :id AND tsc.certified = 1;
                "
            );
            $sql->bindValue(':id', $instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getNoCertificateStudents($instituteID){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT DISTINCT ms.* 
                    FROM m_students AS ms 
                    INNER JOIN t_student_classes_enroll AS tsce ON tsce.student_id = ms.id
                    INNER JOIN m_classes AS mc ON mc.id = tsce.class_id 
                    INNER JOIN t_student_certifications AS tsc ON tsc.student_id = ms.id
                    WHERE mc.institute_id = :id AND tsc.certified = 0
                "
            );
            $sql->bindValue(':id', $instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getEnrolledClasses($studentId){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mc.id,mc.c_title
                FROM m_classes AS mc
                INNER JOIN t_student_classes_enroll AS tsce ON mc.id = tsce.class_id
                WHERE tsce.student_id = :id
                "
            );
            $sql->bindValue(':id', $studentId);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getCertifiedClasses($studentId){
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mc.id,mc.c_title
                FROM m_classes AS mc
                INNER JOIN t_student_certifications AS tsc ON mc.id = tsc.class_id
                WHERE tsc.student_id = :id AND tsc.certified = 1
                "
            );
            $sql->bindValue(':id', $studentId);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    

}


?>