<?php
header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
// x methed tell that data can only be recived from ajax


$data = json_decode(file_get_contents("php://input"), true);

$tbodyE = $data['tbodyE'];
$cname = $data['cname'];
$cyear = $data['cyear'];
$csubject = $data['csubject'];
$sunit = $data['sunit'];
$title = $data['title'];

include "conn.php";

if($title == "" || $tbodyE == ""){
    echo json_encode(array('message' => 'please fill required fields', 'status' => false));
}else{
    $sql = "INSERT INTO topic(cname, cyear, csubject, sunit, title, tbody) VALUES ('{$cname}', '{$cyear}', '{$csubject}', '{$sunit}', '{$title}', '{$tbodyE}')";

if($result = mysqli_query($conn, $sql)){
    echo json_encode(array('message' => 'data saved', 'status' => true));
}else{
    echo json_encode(array('message' => 'data not saved', 'status' => false));
}
}


?>