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

}