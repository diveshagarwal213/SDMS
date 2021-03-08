<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: GET,POST,DELETE');

$data = json_decode(file_get_contents("php://input"), true);
$api_id = $_GET['api_del_id'];
//$api_id = 2;

include "database.php";

$db = new Database();

if ($api_id == 1) {//delete images and update database 
    $id = $data['id'];
    $path = $data['path'];
    $empty =$data['empty'];
    session_start();

    if ($path != "") {
        if (unlink("../".$path)) {
            
            if ($id != 0) { //if user_id present delete address from database 
                $db->update("userdata",["uimage"=>null],"uid = $id ");
                echo $db->getResult();
                if ($empty !=0) { //update session
                    $_SESSION['userimage'] = "";
                }
            }else{
                echo json_encode(array('message' => 'image deleted :'. $path, 'status' => true));
            }
        }else{
            echo json_encode(array('message' => 'image not deleted :'. $path, 'status' => false));
        }
        
    }
}elseif ($api_id == 2) { //delete single topic from tid  
    $id = $data['id'];
    if (!$id == null) {

        if ($db->delete("topic","tid = $id")) {
            echo json_encode(array('message' => 'data deleted', 'status' => true));
        }else {
            echo $db->getResult();
        }

    } else {
        echo json_encode(array('message' => 'no id present ', 'status' => false));
    }
    
}else {
    echo json_encode(array('message' => 'api_id not found', 'status' => false ));
}
//$db->delete('students','sid = "4"');
?>