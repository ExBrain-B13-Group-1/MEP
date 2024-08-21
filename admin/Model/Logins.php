<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Logins
{
    /**
     * (Admin Auth)
     */
    public function authLoginAdmin($email)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_admins WHERE email = :email"
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
    public function updateAdminPs($id, $password)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_admins SET password = :password WHERE id = :id"
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
