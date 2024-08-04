<?php

class DBConnection{

    private $host = '';
    private $port = '';
    private $dbname = '';
    private $username = '';
    private $password = '';

    public function connection(){
        $pdo = new PDO(
            "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;",
            $this->username, 
            $this->password
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

?>
