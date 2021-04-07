<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: GET,POST');
$data = json_decode(file_get_contents("php://input"), true);
$api_id = $_GET['api_id'];
//$api_id = 2;

include "database.php";

$db = new Database();

if ($api_id == 3) { //fetch all data of a single title from given tid  
    
    $id =$_GET['id'];

    $db->select("topics","*",null,"tid = '$id'");
    echo $db->getResult();

}elseif($api_id == 5){ //collect all recent 50 data from topics except tbody in desc order (use only in dabaseManagement.html) 
   
    $db->select("topics","tid, title",null,null,"tid DESC",50);
    // remember if cid is empty in a row ,then api will not fetch that row-data.   
    echo $db->getResult(); 

}elseif ($api_id == 7) { // input search only title 
    
    $search = $_GET['search'];
    if ($search != "") {
        $db->selectSql("SELECT  title, tid FROM topics WHERE title LIKE '%$search%'");
        echo $db->getResult();
    }else{
        echo json_encode(array('message' => 'fill before search', 'status' => false ));
    }

}elseif ($api_id == 8) {//search title,tid,cname,csubject
    
    $search = $_GET['search'];
    if ($search != "") {
        $db->selectSql("SELECT tid, title FROM topics WHERE title LIKE '%$search%' or tid LIKE '%$search%' LIMIT 50");
        echo $db->getResult();
    }else{
        echo json_encode(array('message' => 'fill before search', 'status' => false ));
    }
}else {
    echo json_encode(array('message' => 'api_id not found', 'status' => false ));
}



//$db->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//$db->update('students',['mobileno'=>''],'sid ="1"');
//$db->delete('students','sid = "4"');
//$db->selectSql('select * from students');
//$db->select('students','*');
?>