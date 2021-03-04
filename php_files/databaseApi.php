<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all

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

}elseif($api_id == 2){ //return title names from given subject and unit
    
    $subject = $data['subjectId'];
    $unit = $data['unitId']; 

    $db->select("topic","title, tid",null,"csubject = '$subject' and sunit = $unit");
    echo $db->getResult();

}elseif ($api_id == 3) {
    
    $id = $data['id'];

    $db->select("topic","*",null,"tid = '$id'");
    echo $db->getResult();

}



//$db->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//echo "result is : ";
//print_r($db->getResult()); 

//$db->update('students',['mobileno'=>''],'sid ="1"');
//echo " updated result is : ";
//print_r($db->getResult()); 

//$db->delete('students','sid = "4"');
//echo " deleted result is : ";
//print_r($db->getResult()); 

//$db->selectSql('select * from students');
//echo " selectsql result is : ";
//print_r($db->getResult());

//$db->select('students','*');
//echo " select result is : ";
//print_r($db->getResult());
?>