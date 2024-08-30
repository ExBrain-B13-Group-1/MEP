<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class UpdateRemainingCoin{

    /**
     * this method is used for updade remaining coin when the institute create class and create event
     */
    public function updateRemainingCoin($updateCoinAmt,$instituteId){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "UPDATE m_institute_coins AS mic
                SET remain_amount = :coinAmt
                WHERE institute_id = :id;
                "
            );
            $sql->bindValue(":coinAmt",$updateCoinAmt);
            $sql->bindValue(":id",$instituteId);
            $sql->execute();
            return true;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    public function getCurrentCoin($instituteId){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mic.remain_amount
                    FROM m_institute_coins AS mic 
                    WHERE mic.institute_id = :id"
            );
            $sql->bindValue(":id",$instituteId);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC); // Fetch the result
            return $result['remain_amount'];
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}


?>