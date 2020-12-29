<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Database_conf/Database.php';
include '../model/CRUD.php';

//database class
$database = new Database();
 $db = $database->connection();

  //joke queries class
 $new_crud = new Crud_Functionalities($db);
  $rawData = json_decode(file_get_contents('php://input'));
  
  //assigning data to CRUD class
  $new_crud->author = $rawData->author;
  $new_crud->joke = $rawData->joke;

  if($new_crud->create()){
      echo(json_encode(array("message"=>"Joke Insert successful")));
  }else{
    echo(json_encode(array("message"=>"Joke Insert fails")));
  }