<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstitute{
    /**
     * (Read)
     */
    public function getAllInstitute(){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_institutes"
            );
            $sql->execute(); 
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }
 
}