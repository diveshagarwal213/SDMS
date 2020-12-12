<?php
header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

 $tbodyE = $data['tbodyE'];
 $cname = $data['cname'];
 $cyear = $data['cyear'];
 $csubject = $data['csubject'];
 $sunit = $data['sunit'];
 $title = $data['title'];


 include "conn.php";
 
 if($title == "" || $tbodyE == ""){
    echo json_encode(array('message' => 'Please Fill all Fileds', 'status' => false));
 }else{
    $sql = "UPDATE topic SET cname = '{$cname}', cyear = '{$cyear}', csubject = '{$csubject}', sunit = '{$sunit}', title = '{$title}', tbody = '{$tbodyE}' WHERE tid = '{$id}'";
 
    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'data Updated', 'status' => true));
    }else{
       echo json_encode(array('message' => ' not Updated', 'status' => false));
    }
 }

?>