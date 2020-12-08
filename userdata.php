<?php

header('Content-Type: application/json');//tells which type of data will this api return  
header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
// x methed tell that data can only be recived from ajax
include "conn.php";
$data = json_decode(file_get_contents("php://input"), true);

$fullname = $data['fullname'] ;
$username = $data['username'];
$email = $data['email'] ;
$password = md5($data['password']);

$D = mysqli_query($conn,"SELECT * FROM userdata WHERE uemail = '$email' or username = '$username'");

if ($fullname == "" || $username == "" || $email == "" || $password == "") {
    echo json_encode(array( "message" => "please fill all fileds", "status" => false));
}elseif (mysqli_num_rows($D) > 0 ) {
    #$duplicate=mysqli_query($conn,"select * from crud where email='$email'");
    echo json_encode(array( "message" => "Email or User-Name alredy in use", "status" => false));
}else {
    $sql = "INSERT INTO userdata (fname, username, uemail, upass) VALUES ('{$fullname}', '{$username}', '{$email}', '{$password}')";

    if (mysqli_query($conn,$sql)) {
        echo json_encode(array( "message" => "data saved", "status" => true));
    } else {
        echo json_encode(array( "message" => "Data not save error (query failed)", "status" => false));
    }

}
?>