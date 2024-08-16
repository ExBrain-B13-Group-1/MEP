<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Settings{

    public function getInstituteProfileDatas($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT mi.*,
                    t.itype,
                    sr.name AS state_name,
                    c.name AS city_name,
                    mr.role
                FROM m_institutes AS mi
                LEFT JOIN i_types AS t ON t.id = mi.type_id
                LEFT JOIN state_regions AS sr ON sr.id = mi.state
                LEFT JOIN citys AS c ON c.id = mi.city
                LEFT JOIN m_roles AS mr ON mr.id = mi.role_id 
                WHERE mi.id = :id"
            );

            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function getSocialLinks($instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
            $sql = $pdo->prepare(
                "SELECT sl.* 
                FROM social_links AS sl 
                INNER JOIN m_institutes AS mi ON mi.id = sl.institute_id
                WHERE mi.id = :id"
            );

            $sql->bindValue(":id",$instituteID);
            $sql->execute();
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch(\Throwable $th){
            // fail connection
            echo "Unexpected Error Occurs! $th";
        }
    }

    public function updateSetting(array $datas,$instituteID){
        try{
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();

            

            $sql = $pdo->prepare(
                "SELECT sl.* 
                FROM social_links AS sl 
                INNER JOIN m_institutes AS mi ON mi.id = sl.institute_id
                WHERE mi.id = :id"
            );

            $sql->bindValue(":id",$instituteID);
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