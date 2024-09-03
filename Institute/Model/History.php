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


    public function addHistoryModule(array $module){
        $moduletype = $module['module'];
        $moduleaction = $module['action'];
        $moduleremark = $module['remark'];
        $instituteid = $module['instituteid'];

        $dbconn = new DBConnection();
        $pdo = $dbconn->connection();
        $sql = $pdo->prepare(
            "INSERT INTO history (module,action,remark,institute_id) VALUES (:moduletype,:moduleaction,:moduleremark,:instituteid)"
        );
        $sql->bindValue(":moduletype", $moduletype);
        $sql->bindValue(":moduleaction", $moduleaction);
        $sql->bindValue(":moduleremark", $moduleremark);
        $sql->bindValue(":instituteid", $instituteid);
        $sql->execute();
        return true;
    }


    public function getHistoryModule($id, $action){ 
        $dbconn = new DBConnection();
        $pdo = $dbconn->connection();
        $sql = $pdo->prepare(
            "SELECT * FROM history WHERE institute_id = :id AND action LIKE :action ORDER BY create_date DESC"
        );
        $sql->bindValue(":id", $id);
        $sql->bindValue(":action",'%'.$action.'%');
        $sql->execute();
        return $sql->fetchAll();
    }

}


?>