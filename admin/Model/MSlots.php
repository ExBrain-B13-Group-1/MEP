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
                i.name, i.photo
                FROM ad_slots as slot
                JOIN m_institutes as i on slot.institute_id = i.id;
                 "
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

     /**
     * (Update) Update ad_slots for the given institute IDs
     */
    public function updateAdSlots($instituteIds)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
    
            // Get today's date
            $today = date('Y-m-d');
    
            // Fixed table IDs (corresponding to each loop iteration)
            $tableIds = [2, 5, 6, 7];
    
            // Prepare the update query
            $sql = $pdo->prepare("
                UPDATE ad_slots
                SET 
                    institute_id = :institute_id,
                    ad_start_date = CASE WHEN ad_end_date = :today THEN ad_end_date ELSE ad_start_date END,
                    ad_end_date = CASE WHEN ad_end_date = :today THEN DATE_ADD(ad_end_date, INTERVAL 30 DAY) ELSE ad_end_date END
                WHERE id = :table_id
            ");
    
            // Execute the query for each institute ID and corresponding table ID
            foreach ($instituteIds as $index => $instituteId) {
                $sql->bindValue(':today', $today);
                $sql->bindValue(':institute_id', $instituteId, PDO::PARAM_INT);
                $sql->bindValue(':table_id', $tableIds[$index], PDO::PARAM_INT); // Bind the respective table ID
                $sql->execute();
            }
    
            return true;
        } catch (\Throwable $th) {
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
    
    
 
}
