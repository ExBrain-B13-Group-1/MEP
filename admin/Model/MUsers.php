<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MUser{
    /**
     * (Read)
     */
    public function getAllUser(){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user"
            );
            $sql->execute(); 
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Read, Pending)
     */
    public function getPendingUsers()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_user WHERE nrc_verify = 0"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

       /**
     * (Update Verified)
     */
    public function updateVerified($id) {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET nrc_verify = 1 WHERE id = :id"
            );
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
     * (Update Reject)
     */
    public function updateRejected($id) {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_user SET nrc_verify = 2 WHERE id = :id"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}