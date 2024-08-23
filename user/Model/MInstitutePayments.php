<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/DBConnection.php';

class MInstitutePayment{
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
                "SELECT iip.*,
                i.name, i.photo, i.email, i.contact,
                b.bank_name ,
                p.pay_name,
                price.amount as payment_amount
                 FROM i_institute_payment as iip
                 JOIN
                 m_institutes as i on iip.institute_id = i.id
                 LEFT JOIN m_bankings as b ON iip.banking_id = b.id
                 LEFT JOIN pays AS p ON iip.pay_id = p.id
                  LEFT JOIN m_prices_plan as price ON iip.p_id = price.id;
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