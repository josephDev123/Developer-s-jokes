
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

 $data= $new_crud->read();
 $num_row = $data->rowCount();
 
 if ($num_row > 0) {
    $finalData = [];
    while($row = $data->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $tableData = array(
            "id" =>$id,
            "author" => $author,
            "content" => htmlspecialchars(strip_tags($joke_content)) 
        );

        array_push($finalData, $tableData);
    }

    echo json_encode($finalData);
 }else{
    echo json_encode(array("message"=> "no developers' Joke"));
 }