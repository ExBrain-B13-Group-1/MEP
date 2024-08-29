<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MClassApproveAndReject
{
    public function isAlreadyStudent($user_email)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare("SELECT COUNT(*) as count FROM m_students WHERE email = :email");
            $sql->bindValue(":email", $user_email);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if ($result['count'] > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "Unexpected Error Occurred: " . htmlspecialchars($th->getMessage());
            return false;
        }
    }

    /**
     * (Get Student Id)
     */
    public function getStudentByEmail($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT id
                 FROM m_students
                 WHERE m_students.email = :email"
            );

            $sql->bindValue(":email", $email);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

}
