<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class PendingEnrollment
{
    /**
     * (Insert into pending)
     */
    public function createPending($student_id, $enrolled_class_id, $receipt_image)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();

            // Step 1: Insert the data into pending_enrollment table
            $sql = $pdo->prepare("
                INSERT INTO pending_enrollment (student_id, enrolled_class_id, receipt_image)
                VALUES (:student_id, :enrolled_class_id, :receipt_image)
            ");

            // Bind the values to the SQL statement
            $sql->bindValue(':student_id', $student_id);
            $sql->bindValue(':enrolled_class_id', $enrolled_class_id);
            $sql->bindValue(':receipt_image', $receipt_image);
            // Execute the statement
            $sql->execute();

            return true;
        } catch (\Throwable $th) {
            // Handle errors
            echo "Unexpected Error Occurred: " . htmlspecialchars($th->getMessage());
            return false;
        }
    }


    /**
     * (Check is verified)
     */
    public function isVerified($id)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();

            // query prepare
            $sql = $pdo->prepare("SELECT nrc_verify FROM m_user WHERE id = :id");
            $sql->bindValue(":id", $id, PDO::PARAM_INT);
            $sql->execute();

            // fetch the result
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            // check if nrc_verify is 1
            if ($result && $result['nrc_verify'] == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            // fail connection or query 
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
