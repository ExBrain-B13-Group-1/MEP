<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MAdmin
{

    /**
     * (Create Admin)
     */
    public function createAdmin()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                " INSERT INTO m_admins (
            first_name, last_name, email, contact,
            state_region_id, address, password, role_id
        ) VALUES (
            :first_name, :last_name, :email, :gender, :date_of_birth, :contact,
            :state_region_id, :address, :password, :role_id
        )"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }


    /**
     * (Get Admin Details)
     */
    public function getAdminById($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT m_admins.*, roles.role_name
                 FROM m_admins 
                 INNER JOIN roles 
                 ON m_admins.role_id = roles.id 
                 WHERE m_admins.id = :id"
            );

            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }
}
