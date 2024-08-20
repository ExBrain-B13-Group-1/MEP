<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MSlot
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
                "SELECT slot.*, 
       i.name, 
       i.photo, 
       i.slider_image,
       -- Extract up to two class titles along with the corresponding instructor full names
       (
           SELECT GROUP_CONCAT(DISTINCT CONCAT(c.c_title, ' (', ins.full_name, ')') ORDER BY c.id ASC SEPARATOR ', ')
           FROM m_classes AS c
           JOIN m_instructors AS ins ON c.instructor_id = ins.id
           WHERE c.institute_id = i.id
           LIMIT 2
       ) AS class_titles
FROM ad_slots AS slot
JOIN m_institutes AS i ON slot.institute_id = i.id;

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
