<?php

class Database{
    // properties
    // private $host = 'localhost';
    // private $dbname = 'developer_joke';
    // private $dbSurname = 'root';
    // private $password = '';

    private $host = 'sql306.epizy.com';
    private $dbname = 'epiz_27596606_jokes';
    private $dbSurname = 'epiz_27596606';
    private $password = 'WAIoZYyHTGX9';
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

