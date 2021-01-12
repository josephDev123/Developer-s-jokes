<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include '../Database_conf/Database.php';
include '../model/CRUD.php';

//database class
$database = new Database();
 $db = $database->connection();

 //joke queries class
 $new_crud = new Crud_Functionalities($db);
 
 $id = '';
 $id = isset($_GET['id'])?$_GET['id']:NULL;


 $new_crud->id = $id;
 if (isset($new_crud->id)) {
   
      $singlePost = $new_crud->single_read();
      $finalData = [];
      if ($singlePost){
         
         $fetchData = $singlePost->fetch(PDO::FETCH_ASSOC);
         $arr =[
            'id'=>$fetchData['id'],
            'author'=>$fetchData['author'],
            'joke'=>$fetchData['joke_content']
         ];

         array_push($finalData, $arr);

         echo json_encode($finalData);
      }else{
         echo json_encode(array("message"=> "no developers' Joke"));
 }
 }else{
   echo json_encode(array("message"=> "No developers' Joke 'id' was indicated"));
 }
