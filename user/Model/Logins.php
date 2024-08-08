<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Logins
{
    /**
     * (User Auth)
     */
    public function authLoginUser($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user WHERE email = :email"
            );
            $sql->bindValue(':email', $email);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Institute Auth)
     */
    public function authLoginInstitute($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_institutes WHERE email = :email"
            );
            $sql->bindValue(':email', $email);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

      /**
     * (Update User Password (OTP, New Password))
     */
    public function updateUserPs($id, $password)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET password = :password WHERE id = :id"
            );
            $sql->bindValue(":password", password_hash($password,PASSWORD_DEFAULT) );
            $sql->bindValue(':id', $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


       /**
     * (Update Institute OTP)
     */
    public function updateInstitutePs($id, $password)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_institutes SET password = :password WHERE id = :id"
            );
            $sql->bindValue(":password", password_hash($password,PASSWORD_DEFAULT) );
            $sql->bindValue(':id', $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}
