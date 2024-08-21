<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class Citys
{
    /**
     * (Read)
     */
    public function getAll()
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT c.*,
                 sr.name as srName
                 FROM citys as c
                 JOIN
                 state_regions as sr 
                 on 
                 c.id = sr.id
                 "
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }
}
