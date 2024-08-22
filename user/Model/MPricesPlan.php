<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MPricesPlan
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
                "SELECT * FROM m_prices_plan"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Get Plan ID)
     */
    public function getPlanId($label)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();

            // Prepare the query
            $sql = $pdo->prepare("SELECT id FROM m_prices_plan WHERE label = :label");

            // Bind the parameter
            $sql->bindParam(':label', $label, PDO::PARAM_STR);

            // Execute the query
            $sql->execute();

            // Fetch the ids as a simple array
            return $sql->fetchAll(PDO::FETCH_COLUMN);
        } catch (\Throwable $th) {
            // Display detailed error message
            echo "Unexpected Error Occurred: " . $th->getMessage();
            return []; // Return an empty array or handle the error as needed
        }
    }
}
