<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MUser
{
    /**
     * (Read)
     */
    public function getAllUser()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Create User)
     */
    public function createUser($name, $email, $password)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO m_user (name, email, password) 
                VALUES (:name, :email, :password)"
            );

            $sql->bindValue(':name', $name);
            $sql->bindValue(':email', $email);
            $sql->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));

            $sql->execute();

            // Get the last inserted ID
            $user_id = $pdo->lastInsertId();
            return $user_id;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Create Coin with user_id)
     */
    public function createCoin($user_id, $remain_amount)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO m_user_coins (user_id, remain_amount)
                VALUES (:user_id, :remain_amount)"
            );

            $sql->bindValue(':user_id', $user_id);
            $sql->bindValue(':remain_amount', $remain_amount);

            // Execute the query
            $sql->execute();

            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Get User Details)
     */
    public function getUserById($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT m_user.*, m_user_coins.remain_amount 
                 FROM m_user 
                 INNER JOIN m_user_coins 
                 ON m_user.id = m_user_coins.user_id 
                 WHERE m_user.id = :id"
            );

            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }


    /**
     * (Check duplicate mail)
     */
    public function isDuplicateEmail($email)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user
                WHERE email = :email
                "
            );
            $sql->bindValue(":email", $email);
            $sql->execute();
            $result =  $sql->fetchAll(PDO::FETCH_ASSOC);
            // check duplicate result is exist or not
            if (count($result) == 0) {
                return false;
            }
            return true;
        } catch (\Throwable $th) {
            // fail connection or query 
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    /**
     * (Update profile photo)
     */
    public function updateProfile($id, $photo)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET photo = :photo WHERE id = :id"
            );
            $sql->bindValue(":photo", $photo);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query 
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    /**
     * (Update Verification NRC etc...)
     */
    public function updateVerify($id, $name, $email, $age, $contact, $gender, $nrc_front, $nrc_back, $nrc_verify)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET name = :name, email = :email, age = :age, contact = :contact, gender = :gender, nrc_front = :nrc_front, nrc_back = :nrc_back, nrc_verify = :nrc_verify WHERE id = :id"
            );
            $sql->bindValue(":name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":age", $age);
            $sql->bindValue(":contact", $contact);
            $sql->bindValue(":gender", $gender);
            $sql->bindValue(":nrc_front", $nrc_front);
            $sql->bindValue(":nrc_back", $nrc_back);
            $sql->bindValue(":nrc_verify", $nrc_verify);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Update profile information)
     */
    public function updateInfors($id, $name, $social_links)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET name = :name, social_links = :social_links WHERE id = :id"
            );
            $sql->bindValue(":name", $name);
            $sql->bindValue(":social_links", $social_links);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query 
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    /**
     * (Checking is verified)
     */
    public function isVerified($id)
    {
        try {
            $db = new DBConnection();
            // Get connection
            $pdo = $db->connection();

            // Prepare the query to check if the user_id and p_id exist together
            $sql = $pdo->prepare(
                "SELECT nrc_verify FROM m_user WHERE id = :id"
            );

            // Bind the parameters
            $sql->bindParam(':id', $id);

            // Execute the query
            $sql->execute();

            // Fetch the result as an associative array
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            // Check if nrc_verify is 1
            if ($result && $result['nrc_verify'] == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false; // Return false to indicate failure
        }
    }
}
