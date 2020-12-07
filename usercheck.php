<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
// x methed tell that data can only be recived from ajax
include "conn.php";
$data = json_decode(file_get_contents("php://input"), true);


$inputuser = "diveshagarwal";
//$inputuser = "ashuagarwal135";
//$inputuser = $data['inputuser'];
//$inputpass = md5($data['inputpass'],true);
//$inputpass = "123";
$inputpass = "123";




$D = mysqli_query($conn,"SELECT * FROM userdata WHERE  username = '{$inputuser}' AND upass = '{$inputpass}' ");

if ($inputuser == "" || $inputpass == "") {
    echo json_encode(array( "message" => "please fill all fileds", "status" => false));
}elseif (mysqli_num_rows($D) > 0 ) {
    #$duplicate=mysqli_query($conn,"select * from crud where email='$email'");
    echo json_encode(array( "message" => "correct info ", "status" => true));
}else {
    echo json_encode(array( "message" => "query failed", "status" => false));
}
?>