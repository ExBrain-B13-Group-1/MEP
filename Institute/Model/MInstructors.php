<?php

include "../Model/DBConnection.php";

class MClasses{

    /**
     * this method is used for get all classes records from database
     */
    public function getAllClasses(){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT * FROM m_instructors"
            );
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function add($user_infos){

    }

    public function modify($user_infos,$id){

    }

    public function remove($id){

    }

}


?>