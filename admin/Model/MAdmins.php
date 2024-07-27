<?php
ini_set('display_errors', '1');
include "../Model/DBconnection.php";

class MAdmins{
    /**
     * (Read)
     */
    public function getAll(){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_admins"
            );
            $sql->execute();  
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

     /**
     * (Create)
     */
    public function add($admin){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_admins"
            );
            $sql->execute();  
            return true; 
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

     /**
     * (Update)
     */
    public function modify($admin, $id){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_admins"//update query
            );
            $sql->execute();  
            return true;
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

     /**
     * (Delete)
     */
    public function remove($id){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_admins"
            );
            $sql->execute();  
            return true; 
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}