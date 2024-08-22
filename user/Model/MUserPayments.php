<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MUserPayment
{
    /**
     * (Checking Pro Plan)
     */
    public function checkProPlan($user_id, $p_id)
    {
        try {
            $db = new DBConnection();
            // Get connection
            $pdo = $db->connection();

            // Prepare the query to check if the user_id and p_id exist together
            $sql = $pdo->prepare(
                "SELECT * FROM t_user_payment WHERE user_id = :user_id AND p_id = :p_id"
            );

            // Bind the parameters
            $sql->bindParam(':user_id', $user_id);
            $sql->bindParam(':p_id', $p_id);

            // Execute the query
            $sql->execute();

            // Fetch the result as an associative array
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Check if any record exists
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false; // Return false to indicate failure
        }
    }

    /**
     * (Add to DB)
     */
    public function createPayment($user_id, $p_id, $banking_id = NULL, $pay_id = NULL)
    {
        try {
            $db = new DBConnection();
            // Get connection
            $pdo = $db->connection();

            // Prepare the insert query
            $sql = $pdo->prepare(
                "INSERT INTO t_user_payment (user_id, p_id, banking_id, pay_id) VALUES (:user_id, :p_id, :banking_id, :pay_id)"
            );

            // Bind the parameters
            $sql->bindValue(':user_id', $user_id);
            $sql->bindValue(':p_id', $p_id);
            $sql->bindValue(':banking_id', $banking_id);
            $sql->bindValue(':pay_id', $pay_id);

            $sql->execute();

            // Check if the p_id is 2
            if ($p_id == 2) {
                // Prepare the update query for m_user_coins
                $sqlUpdate = $pdo->prepare(
                    "UPDATE m_user_coins 
                SET remain_amount = remain_amount + 30.00 
                WHERE user_id = :user_id"
                );

                // Bind the parameter
                $sqlUpdate->bindValue(':user_id', $user_id);

                // Execute the update query
                $sqlUpdate->execute();
            }
            return true;
        } catch (\Throwable $th) {
            return false; // Return false to indicate failure
        }
    }
}
