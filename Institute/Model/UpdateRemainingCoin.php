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

}


?>