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
     * (Get Institute Details)
     */
    public function getInstitute($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT i.*,
                it.itype,
                sr.name as srName,
                c.name as cityName,
                f.f_name as founderName, f.f_email as founderEmail, f.f_contact as founderContact, f.nrc_front as nrcFront, f.nrc_back as nrcBack
                FROM m_institutes as i
                LEFT JOIN i_types as it ON i.type_id = it.id
                LEFT JOIN state_regions as sr ON i.state = sr.id
                LEFT JOIN citys as c ON i.city = c.id
                LEFT JOIN i_founder_infos as f ON  i.id = f.institute_id
                WHERE i.id = :id"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Read, Pending)
     */
    public function getPendingInstitutes()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT * FROM m_institutes WHERE status = 0"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Update Verified)
     */
    public function updateVerified($id, $password)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_institutes SET status = 1, password = :password WHERE id = :id"
            );
            $sql->bindValue(":password", password_hash($password,PASSWORD_DEFAULT) );
            $sql->bindValue(":id", $id);
           
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

    /**
     * (Update Reject)
     */
    public function updateRejected($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_institutes SET status = 2 WHERE id = :id"
            );
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }


     /**
     * (Read)
     */
    public function getInstitutes()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT 
                    i.*,
                    i.name AS institute_name,
                    t.itype AS institute_type,
                    COUNT(c.id) AS total_classes_opened,
                    CASE 
                        WHEN SUM(CASE WHEN iip.p_id IN (4, 5) THEN 1 ELSE 0 END) > 0 THEN 'Premium'
                        ELSE 'Free'
                    END AS institute_status
                FROM 
                    m_institutes AS i
                LEFT JOIN 
                    m_classes AS c ON i.id = c.institute_id 
                LEFT JOIN
                    i_types AS t ON i.type_id = t.id
                LEFT JOIN 
                    i_institute_payment AS iip ON i.id = iip.institute_id
                GROUP BY 
                    i.id, i.name;"
            );   
            
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }
}
