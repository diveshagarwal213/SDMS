<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: GET,POST');
$data = json_decode(file_get_contents("php://input"), true);
$api_id = $_GET['api_id'];
//$api_id = 2;

include "database.php";

$db = new Database();

if ($api_id == 1) { //return subject names from given cource and year
    
    $cource = $data['cource'];
    $year = $data['year']; 

    $db->select("topic","distinct csubject",null,"cname = '$cource' and cyear = $year");
    //print_r($db->getResult()); 
    echo $db->getResult(); 

}elseif($api_id == 2){ //return title names(with there tid) from given subject and unit
    
    $subject = $data['subjectId'];
    $unit = $data['unitId']; 

    $db->select("topic","title, tid",null,"csubject = '$subject' and sunit = $unit");
    echo $db->getResult();

}elseif ($api_id == 3) { //fetch all data of a single title from given tid  
    
    $id = $data['id'];

    $db->select("topic","*",null,"tid = '$id'");
    echo $db->getResult();

}elseif($api_id == 5){ //collect all recent 50 data from topics except tbody in desc order (use only in dabaseManagement.html) 
   
    $db->select("topics","tid, cname, cyear, sub_name, sunit, title","cources ON topics.cid = cources.cid JOIN subject ON topics.subid = subject.subid ",null,"tid DESC",50);
    // remember if cid is empty in a row ,then api will not fetch that row-data.   
    echo $db->getResult(); 

}elseif ($api_id == 6) { //fetch username with given uid
    $id = $data['userid'];
    $db->select("userdata","username",null," uid = $id");
    echo $db->getResult();
}elseif ($api_id == 7) { // input search only title 
    
    $search = $_GET['search'];
    if ($search != "") {
        $db->selectSql("SELECT  title, tid FROM topic WHERE title LIKE '%$search%'");
        echo $db->getResult();
    }else{
        echo json_encode(array('message' => 'fill before search', 'status' => false ));
    }

}elseif ($api_id == 8) {//search title,tid,cname,csubject
    
    $search = $_GET['search'];
    if ($search != "") {
        $db->selectSql("SELECT tid, cname, cyear, csubject, sunit, title FROM topic WHERE title LIKE '%$search%' or tid LIKE '%$search%' or cname LIKE '%$search%' or csubject LIKE '%$search%' LIMIT 50");
        echo $db->getResult();
    }else{
        echo json_encode(array('message' => 'fill before search', 'status' => false ));
    }
}elseif ($api_id == 9) { //fetch cources 
    if ($db->select("cources","*")) {
        echo $db->getResult();
    }else {
        $message = $db->getResult();
        echo json_encode(array('message' => $message, 'status' => false ));
    }
    
    
}elseif ($api_id == 10) { //fetch subjects names according to cource name and year

    $cid = $data['c_id'];
    $cyear = $data['c_year'];

    if ($db->select("subject","sub_name, subid",null,"cid = '$cid' And C_year = '$cyear'")) {
        echo $db->getResult();
    }else {
        $message = $db->getresult();
        echo json_encode(array('message' => $message, 'status' => false ));

    }

} else {
    echo json_encode(array('message' => 'api_id not found', 'status' => false ));
}



//$db->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//$db->update('students',['mobileno'=>''],'sid ="1"');
//$db->delete('students','sid = "4"');
//$db->selectSql('select * from students');
//$db->select('students','*');
?>