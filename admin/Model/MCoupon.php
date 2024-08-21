<?php
include "../../Model/DBConnection.php";

class MCoupon { 


    public function getAllCoupons() {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                "SELECT
                    c.*,
                    a.first_name as fname,
                    a.last_name as lname
                FROM
                    coupon_codes as c
                    LEFT JOIN m_admins as a ON c.created_by = a.id"
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        };  
    }

    public function getCoupon($data) {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                `SELECT * FROM coupon_codes WHERE code=?`
            );
            $sql->execute([$data]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        };  
    }

    public function postCoupon($data) {
        try {
            $db = new DBConnection();
            $pdo = $db->connection();
            $sql = $pdo->prepare(
                `SELECT * FROM coupon_codes`
            );
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        };  
    }
};

