<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MPricesPlan{
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
                "SELECT * FROM m_prices_plan"
            );
            $sql->execute(); 
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

      /**
     * (Update Price Plan)
     */
    public function updatePrice($id, $amount) {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_prices_plan SET amount = :amount WHERE id = :id"
            );
            $sql->bindValue(":amount", $amount);
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