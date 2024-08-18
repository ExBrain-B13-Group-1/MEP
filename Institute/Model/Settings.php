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


    public function getAllSocialLinks($instituteID){
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

    public function updateSocialLinks(array $datas, $instituteID) {
        try {
            $dbconn = new DBConnection();
            // get connection
            $pdo = $dbconn->connection();
    
            $sql = $pdo->prepare(
                "UPDATE social_links 
                SET 
                    facebook_link = :fblink,
                    telegram_link = :tglink,
                    instagram_link = :instalink,
                    x_link = :xlink
                WHERE 
                    institute_id = :id"
            );
    
            // Bind the parameters
            $sql->bindValue(":fblink", $datas['facebooklink']);
            $sql->bindValue(":tglink", $datas['telegramlink']);
            $sql->bindValue(":instalink", $datas['instagramlink']);
            $sql->bindValue(":xlink", $datas['xlink']);
            $sql->bindValue(":id", $instituteID);
    
            // Execute the query
            $sql->execute();
            
            // Return success
            return true;
        } catch (\Throwable $th) {
            // Handle exceptions
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
    

    public function updateSetting(array $datas, $instituteID) {
        try {
            $dbconn = new DBConnection();
            // Get connection
            $pdo = $dbconn->connection();
            
            $sql = $pdo->prepare(
                "UPDATE m_institutes
                SET 
                    photo = :photo,
                    name = :institute_name,
                    email = :email,
                    contact = :phone,
                    website = :website,
                    address = :address,
                    update_date = NOW()
                WHERE 
                    id = :id"
            );
            
            // Bind the parameters
            $sql->bindValue(":photo", $datas['photo']);
            $sql->bindValue(":institute_name", $datas['institute_name']); // Correct key here
            $sql->bindValue(":email", $datas['email']);
            $sql->bindValue(":phone", $datas['phone']);
            $sql->bindValue(":website", $datas['website']);
            $sql->bindValue(":address", $datas['address']);
            $sql->bindValue(":id", $instituteID);
            
            // Execute the query
            $sql->execute();
            return true;
        } catch (\Exception $e) { // Changed to \Exception for consistency
            // Handle exceptions
            echo "Unexpected Error Occurs! " . $e->getMessage();
            return false;
        }
    }

}


?>