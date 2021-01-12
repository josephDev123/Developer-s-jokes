<?php

class Crud_Functionalities {
    public $id;
    public $author;
    public $joke;

    public $table_name = "developer_jokes_table";
    private $conn;

    public function __construct($db){
        $this->conn =$db;
    }

//select functionality
    public function read(){
        //sql statement
        $sql = "SELECT * FROM $this->table_name";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


//select single data functionality
    public function single_read(){
    //query statement
    $sql="SELECT * FROM $this->table_name WHERE id = ?";
    //prepare statement
    $stmt= $this->conn->prepare($sql);
    //bind parameter
    $stmt->bindParam(1, $this->id);
    //execute statement
    $stmt->execute();
    return $stmt;
    }


    //create functionality
    public function create(){
        //query
        $sql = "INSERT INTO $this->table_name(author, joke_content)VALUES(?, ?)";
        // prepare statement
        $stmt = $this->conn->prepare($sql);

        // strip tag and html element from content
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->joke = htmlspecialchars(strip_tags($this->joke));

        // bind parameter to query
        $stmt->bindParam(1, $this->author);
        $stmt->bindParam(2, $this->joke);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }     
    }

// update functionality
    public function update(){
        //query statement
        $sql="UPDATE $this->table_name SET author = ?, joke_content = ? WHERE id = ? ";
        // prepare statement
        $stmt = $this->conn->prepare($sql);

        // strip tag and html element from content
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->joke = htmlspecialchars(strip_tags($this->joke));

        //bind parameter to query
        $stmt->bindParam(1, $this->author);
        $stmt->bindParam(2, $this->joke);
        $stmt->bindParam(3, $this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //delete functionality
    public function Delete(){
        //query statement 
        $sql= "DELETE FROM $this->table_name WHERE id =?";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        // strip tag and html element from content
        $this->id = htmlspecialchars(strip_tags($this->id));
        //bind parameter to query
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }



}