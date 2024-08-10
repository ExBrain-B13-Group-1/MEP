<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstitute
{
    /**
     * (Read)
     */
    public function getAllInstitute()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_institutes"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Create Institute)
     */
    public function createInstitute($name, $photo, $slider_image, $email, $password, $type_id, $contact, $address, $state, $city, $website, $social)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO m_institutes (name, photo, slider_image, email, password, type_id, contact, address, state, city, website, social) 
                VALUES (:name, :photo, :slider_image, :email, :password, :type_id, :contact, :address, :state, :city, :website, :social)"
            );


            $sql->bindValue(':name', $name);
            $sql->bindValue(':photo', $photo);
            $sql->bindValue(':slider_image', $slider_image);
            $sql->bindValue(':email', $email);
            $sql->bindValue(":password", $password);
            $sql->bindValue(':type_id', $type_id, PDO::PARAM_INT); 
            $sql->bindValue(':contact', $contact);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':state', $state, PDO::PARAM_INT); 
            $sql->bindValue(':city', $city, PDO::PARAM_INT); 
            $sql->bindValue(':website', $website);
            $sql->bindValue(':social', $social);

            $sql->execute();

            // Get the last inserted ID
            $institute_id = $pdo->lastInsertId();
            return $institute_id;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Create Founder with institute_id)
     */
    public function createFounder($institute_id, $f_name, $f_email, $f_contact, $nrc_front, $nrc_back)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO i_founder_infos (institute_id, f_name, f_email, f_contact, nrc_front, nrc_back)
                VALUES (:institute_id, :f_name, :f_email, :f_contact, :nrc_front, :nrc_back)"
            );

            $sql->bindValue(':institute_id', $institute_id);
            $sql->bindValue(':f_name', $f_name);
            $sql->bindValue(':f_email', $f_email);
            $sql->bindValue(':f_contact', $f_contact);
            $sql->bindValue(':nrc_front', $nrc_front);
            $sql->bindValue(':nrc_back', $nrc_back);

            // Execute the query
            $sql->execute();

            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Create Founder with institute_id)
     */
    public function createCoin($institute_id, $remain_amount)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO m_institute_coins (institute_id, remain_amount)
                VALUES (:institute_id, :remain_amount)"
            );

            $sql->bindValue(':institute_id', $institute_id);
            $sql->bindValue(':remain_amount', $remain_amount);

            // Execute the query
            $sql->execute();

            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


    /**
     * (Check duplicate mail)
     */
    public function isDuplicateEmail($email)
    {
        try {
            $db = new DBConnection();
            // get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_institutes
                WHERE email = :email
                "
            );
            $sql->bindValue(":email", $email);
            $sql->execute();
            $result =  $sql->fetchAll(PDO::FETCH_ASSOC);
            // check duplicate result is exist or not
            if (count($result) == 0) {
                return false;
            }
            return true;
        } catch (\Throwable $th) {
            // fail connection or query 

            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}
