<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../Database_conf/Database.php';
include '../model/CRUD.php';

//database class
$database = new Database();
 $db = $database->connection();
 
 //joke query class
 $new_crud = new Crud_Functionalities($db);
  $rawData = json_decode(file_get_contents('php://input'));

  //assigning values to properties
  $new_crud->id = $rawData->id;
  $new_crud->author = $rawData->author;
  $new_crud->joke = $rawData->joke;

//update query
  if($new_crud->update()){
      echo json_encode(array("message"=>"joke update successful"));
  }else{
    echo json_encode(array("message"=>" joke update fails"));
  }