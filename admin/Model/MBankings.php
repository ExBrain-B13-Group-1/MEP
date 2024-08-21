<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MBankings
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
                "SELECT * FROM m_bankings"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }

    /**
     * (Update Account Number)
     */
    public function updateAccNumber($id, $account_number)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "UPDATE m_bankings SET account_number = :account_number WHERE id = :id"
            );
            $sql->bindValue(":account_number", $account_number);
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
     * (Add Banking Account)
     */
    public function addAccount($bank_name, $account_number, $account_name, $qr_code) {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
             // query prepare
            $sql = $pdo->prepare(
                "INSERT INTO m_bankings (bank_name, account_number, account_name, qr_code) VALUES (:bank_name, :account_number, :account_name :qr_code)"
            );
            $sql->bindValue(":bank_name", $bank_name);
            $sql->bindValue(":account_number", $account_number);
            $sql->bindValue(":account_name", $account_name);
            $sql->bindValue(":qr_code", $qr_code);
            $sql->execute();
            return true;
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}
