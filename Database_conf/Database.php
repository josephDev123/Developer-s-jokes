<?php

class Database{
    // properties
    private $host = 'localhost';
    private $dbname = 'developer_joke';
    private $dbSurname = 'root';
    private $password = '';
    private $conn;

//connection 
    public function connection(){
        $this->conn = '';
        try {
                //specified dsn
            $dsn ="mysql:host=$this->host;dbname=$this->dbname";
            //database connection
            $this->conn = new PDO($dsn, $this->dbSurname, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'success';
        }catch(PDOException $e){
            echo 'connection failed:'.$e->getMessage();
        }
        return $this->conn;
    }
 

}

