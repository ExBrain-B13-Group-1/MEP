<?php
ini_set('display_errors', '1');



class DBConnection{
    private $hostname = "";
    private $port = '';
    private $dbname = "";
    private $username = "";
    private $password = "";
    /**
     * this method is used for to connect database
     */
    public function connection(){
        $pdo = new PDO(
            "mysql:host=$this->hostname;port=$this->port;dbname=$this->dbname",
            $this->username,
            $this->password
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}