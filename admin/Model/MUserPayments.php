<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MUserPayment{
    /**
     * (Read)
     */
    public function getAll(){
        try{
            $db = new DBConnection();  
            //get connection
            $pdo = $db->connection();
            // query prepare
            $sql = $pdo->prepare(
                "SELECT tup.*,
                u.name, u.email, u.photo,
                b.bank_name,
                p.pay_name,
                price.amount as payment_amount
                 FROM t_user_payment as tup
                 JOIN
                 m_user as u on tup.user_id = u.id
                LEFT JOIN m_bankings as b ON tup.banking_id = b.id
                 LEFT JOIN pays AS p ON tup.pay_id = p.id
                 LEFT JOIN m_prices_plan as price ON tup.p_id = price.id;
                 "
            );
            $sql->execute(); 
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(\Throwable $th){
            // fail connection or query
            echo "Unexpected Error Occurs! $th";
        }
    }
}