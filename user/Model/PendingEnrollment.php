<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class PendingEnrollment
{
    /**
     * (Insert into pending)
     */
    public function createPending($user_id, $enrolled_class_id, $receipt_image, $cash_amt, $coin_amt)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();

            // Step 1: Insert the data into pending_enrollment table
            $sql = $pdo->prepare("
                INSERT INTO pending_enrollment (user_id, enrolled_class_id, receipt_image, cash_amt, coin_amt)
                VALUES (:user_id, :enrolled_class_id, :receipt_image, :cash_amt, :coin_amt)
            ");

            // Bind the values to the SQL statement
            $sql->bindValue(':user_id', $user_id);
            $sql->bindValue(':enrolled_class_id', $enrolled_class_id);
            $sql->bindValue(':receipt_image', $receipt_image);
            $sql->bindValue(':cash_amt', $cash_amt);
            $sql->bindValue(':coin_amt', $coin_amt);
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


    public function isDuplicatedForPendingState($user_id, $enrolled_class_id)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();

            $sql = $pdo->prepare("SELECT * FROM pending_enrollment 
            WHERE user_id = :user_id 
            AND enrolled_class_id = :enrolled_class_id 
            AND pending_status != -1");
            $sql->bindValue(":user_id", $user_id);
            $sql->bindValue(":enrolled_class_id", $enrolled_class_id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            echo "Unexpected Error Occurred: " . htmlspecialchars($th->getMessage());
            return false;
        }
    }


    public function isAlreadyEnrolled($user_id, $class_id)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();

            $sql = $pdo->prepare("");
            $sql->bindValue(":user_id", $user_id);
            $sql->bindValue(":class_id", $class_id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
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


    public function getCostCoins($enrolled_class_id)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare("SELECT credit_point FROM m_classes WHERE id = :id");
            $sql->bindValue(":id", $enrolled_class_id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result['credit_point'];
        } catch (\Throwable $th) {
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getCashAmt($enrolled_class_id)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare("SELECT c_fee FROM m_classes WHERE id = :id");
            $sql->bindValue(":id", $enrolled_class_id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);    
            return $result['c_fee'];
        } catch (\Throwable $th) {
            echo "Unexpected Error Occurs! $th";
        }
    }
}
