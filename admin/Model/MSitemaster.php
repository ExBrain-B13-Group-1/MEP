<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MSitemaster
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
                "SELECT * FROM m_sitemaster"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Update Home)
     */
    public function updateHome($id, $slogan, $title, $description)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_sitemaster SET slogan = :slogan, title = :title, description = :description WHERE id = :id"
            );
            $sql->bindValue(":slogan", $slogan);
            $sql->bindValue(":title", $title);
            $sql->bindValue(":description", $description);
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
     * (Update About)
     */
    public function updateAbout($id, $title, $description) {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_sitemaster SET title = :title, description = :description WHERE id = :id"
            );
            $sql->bindValue(":title", $title);
            $sql->bindValue(":description", $description);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }

}
