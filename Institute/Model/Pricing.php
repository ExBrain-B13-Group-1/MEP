<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Pricing{

    /**
     * this method is used for get all coupon code from database
     */
    public function getPricingForInstitute(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_prices_plan WHERE scope = 'institute';"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getRoleForInstitute($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mr.role
                FROM m_institutes AS mit 
                INNER JOIN m_roles AS mr ON mr.id = mit.role_id
                WHERE mit.id = :id"
            );
            $sql->bindValue(":id","$instituteID");
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getFixCoin(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mpp.amount
                FROM m_prices_plan AS mpp
                WHERE mpp.label = 'For 500 Coins (Institute)'"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            if($results[0]['amount']){
                $coin_amt = abs((int)($results[0]['amount'] / 1000));
                return $coin_amt;
            }
            return false;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}


?>