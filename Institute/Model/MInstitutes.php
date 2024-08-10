<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstitute
{
    /**
     * (Read)
     */
    public function getInstituteInfo($id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT mit.* ,
                it.itype AS institute_type,
                sr.name AS state,
                ci.name AS city,
                mr.role AS institute_role,
                mic.remain_amount AS remaining_coin		
                FROM m_institutes AS mit
                LEFT JOIN i_types AS it ON mit.type_id = it.id
                LEFT JOIN state_regions AS sr ON mit.state = sr.id
                LEFT JOIN citys AS ci ON mit.city = ci.id
                LEFT JOIN m_roles AS mr ON mit.role_id = mr.id 
                LEFT JOIN m_institute_coins AS mic ON mit.id = mic.institute_id
                WHERE mit.id = :id;"
            );
            $sql->bindValue(':id', $id);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

}
