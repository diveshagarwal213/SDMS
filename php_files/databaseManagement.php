<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all

$data = json_decode(file_get_contents("php://input"), true);
$function_id = $_GET['function_id'];
//$function_id = 2;

include "database.php";

$obj = new Database();

if ($function_id == 1) { //return subject names from given cource and year
    
    $cource = $data['subject'];
    $year = $data['year']; 

    $obj->select("topic","distinct csubject",null,"cname = '$cource' and cyear = $year");
    //print_r($obj->getResult()); 
    echo $obj->getResult(); 
}elseif($function_id == 2){ //return title names from given subject and unit
    
    $subject = $data['subjectId'];
    $unit = $data['unitId']; 

    $obj->select("topic","title, tid",null,"csubject = '$subject' and sunit = $unit");
    echo $obj->getResult();
}elseif ($function_id == 3) {
    
    $id = $data['id'];

    $obj->select("topic","*",null,"tid = '$id'");
    echo $obj->getResult();

}



//$obj->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//echo "result is : ";
//print_r($obj->getResult()); 

//$obj->update('students',['mobileno'=>''],'sid ="1"');
//echo " updated result is : ";
//print_r($obj->getResult()); 

//$obj->delete('students','sid = "4"');
//echo " deleted result is : ";
//print_r($obj->getResult()); 

//$obj->selectSql('select * from students');
//echo " selectsql result is : ";
//print_r($obj->getResult());

//$obj->select('students','*');
//echo " select result is : ";
//print_r($obj->getResult());
?>