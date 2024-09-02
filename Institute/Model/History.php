<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class History{

    /**
     * 
     */
        public function todayCoinUsage(array $datasarr,$classid){
        $classTitle = $datasarr['title'];
        $instituteID = $datasarr['instituteid'];
        $coinAmount = $datasarr['creditpoint'] * 0.1;
        $createDate = date('Y-m-d');
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "INSERT INTO coin_usage_history (class_title,institute_id,class_id,coin_amount,create_date) VALUES (:classTitle,:instituteID,:classID,:coinAmount,:createDate)"
            );
            $sql->bindValue(":classTitle",$classTitle);
            $sql->bindValue(":instituteID",$instituteID);
            $sql->bindValue(":classID",$classid);   
            $sql->bindValue(":coinAmount",$coinAmount);
            $sql->bindValue(":createDate",$createDate);
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