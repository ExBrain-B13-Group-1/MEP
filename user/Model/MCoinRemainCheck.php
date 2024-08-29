<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MCoinRemainCheck
{
    /**
     * (Read)
     */
    public function getCoinRemain($user_id)
    {
        try {
            $db = new DBConnection();
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT muc.remain_amount
                FROM m_user_coins AS muc 
                WHERE muc.user_id = :user_id"
            );
            $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result['remain_amount'];
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }


    public function updateCoinRemain($user_id, $costCoins)
    {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                "UPDATE m_user_coins SET remain_amount = remain_amount - :costCoins WHERE user_id = :user_id"
            );
            $sql->bindValue(':costCoins', $costCoins, PDO::PARAM_INT);
            $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $sql->execute();

            // Fetch the updated remain_amount
            $sql = $pdo->prepare(
                "SELECT remain_amount FROM m_user_coins WHERE user_id = :user_id"
            );
            $sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            return $result['remain_amount'];
        } catch (\Throwable $th) {
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
            return false;
        }
    }
}
