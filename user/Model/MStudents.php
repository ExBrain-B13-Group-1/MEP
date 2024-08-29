<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MStudent
{
    /**
     * (Get Student ID)
     */
    public function getStudentId($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT m_students.id
                 FROM m_students
                 WHERE m_students.email = :email"
            );

            $sql->bindValue(":email", $email);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getStudentNameAndEmail($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT mu.name,mu.email
                FROM m_user AS mu
                WHERE mu.id = :id"
            );

            $sql->bindValue(":id", $id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function getEnrollClassInfo($id)
    {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT c.id,
                    c.c_title,
                    c.start_date,
                    c.end_date,
                    c.c_fee,
                    c.credit_point,
                    mit.name AS institute_name,
                    mi.full_name AS instructor_name
                FROM m_classes AS c
                INNER JOIN c_status AS cs ON c.c_status_id = cs.id
                INNER JOIN m_categories AS mc ON c.cate_id = mc.id
                INNER JOIN m_instructors AS mi ON c.instructor_id = mi.id
                INNER JOIN m_institutes AS mit ON c.institute_id = mit.id
                WHERE c.id = :id AND c.del_flg = 0;"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (\Throwable $th) {
            // fail connections
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getLatestStudentID($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT s.student_id FROM m_students AS s 
                WHERE s.institute_id = :id
                ORDER BY s.student_id DESC LIMIT 1 ;"
            );
            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            if($results){
                return $results[0]['student_id'];
            }else{
                return "S1000";
            }
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }
}