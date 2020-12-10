<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
// x methed tell that data can only be recived from ajax
include "conn.php";
$data = json_decode(file_get_contents("php://input"), true);

$inputuser = $data['inputuser'];
$inputpass = md5($data['inputpass']);

$check = mysqli_query($conn,"SELECT * FROM userdata WHERE  username = '{$inputuser}' AND upass = '{$inputpass}' ");

if ($inputuser == "" || $inputpass == "") {
    echo json_encode(array( "message" => "please fill all fileds", "status" => false));
}elseif (mysqli_num_rows($check) > 0 ) {
    
    while ($row = mysqli_fetch_assoc($check)) {
        # code..
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['userid'] = $row['uid'];
        $_SESSION['uimage'] = "images/userdata/d12.jpg";
        echo json_encode(array( "message" => "correct info ", "status" => true));
    }
    //header("Location : http://localhost/sdms/another.html"); 
    //echo json_encode(array( "message" => "correct info ", "status" => true));
}else {
    echo json_encode(array( "message" => "Please Enter Correct Info", "status" => false));
}
?>