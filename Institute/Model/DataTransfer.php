<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class DataTransfer
{
    /**
     * (Data Transfer to m_students table)
     */
    public function getUserDataWithId($user_id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user WHERE id = :user_id"
            );
            $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function createStudent(array $transferData)
    {
        $user_id = $transferData[0]['id'];
        $name = $transferData[0]['name'];
        $email = $transferData[0]['email'];
        $age = $transferData[0]['age'];
        $gender = $transferData[0]['gender'];
        $phone = $transferData[0]['contact'];

        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                "INSERT INTO m_students (user_id, name, email, age, gender, phone) 
                VALUES (:user_id, :name, :email, :age, :gender, :phone);"
            );
            $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $sql->bindValue(':name', $name, PDO::PARAM_STR);
            $sql->bindValue(':email', $email, PDO::PARAM_STR);
            $sql->bindValue(':age', $age, PDO::PARAM_STR);
            $sql->bindValue(':gender', $gender, PDO::PARAM_STR);
            $sql->bindValue(':phone', $phone, PDO::PARAM_STR);
            $sql->execute();
            return $sql->rowCount();
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    public function createEnrollTable($student_id, $enrolled_class_id){
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                "INSERT INTO t_student_classes_enroll (student_id, class_id) VALUES (:student_id, :class_id)"
            );
            $sql->bindValue(':student_id', $student_id, PDO::PARAM_INT);
            $sql->bindValue(':class_id', $enrolled_class_id, PDO::PARAM_INT);
            $sql->execute();
            return $sql->rowCount();
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    public function getStudentId($userEmail){
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                "SELECT id FROM m_students WHERE email = :email"
            );
            $sql->bindValue(':email', $userEmail, PDO::PARAM_STR);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['id'];
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}
