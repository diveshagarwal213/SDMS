<?php

header('Content-Type: application/json');
header('Acces-Controle-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"),true);
$api_id = $_GET['api_insert_id'];

include "database.php";

$db = new Database();

if($api_id == 1){ //insert new user data into data base

    $fullname = $data['fullname'] ;
    $username = $data['username'];
    $email = $data['email'] ;
    $password = md5($data['password']);

    if ($fullname == "" || $username == "" || $email == "" || $password == "") {

        echo json_encode(array( "message" => "please fillup all ", "status" => false));

    }elseif(!$db->select("userdata","*",null,"uemail = '$email' OR username = '$username'")){//double 
        
        $db->getResult();//to empty result value 
        if($db->insert('userdata',['fname'=>$fullname,'username'=>$username,'uemail'=>$email,'upass'=>$password])){
            $db->getResult();//new user id
            echo json_encode(array( "message" => " data updated ", "status" => true));
        }else {
            echo $db->getResult();
        }
    }else{
        echo json_encode(array( "message" => "Email or User-Name alredy in use", "status" => false));
    }
}elseif ($api_id == 2) {
    $tbodyE = $data['tbodyE'];
    $cname = $data['cname'];
    $cyear = $data['cyear'];
    $csubject = $data['csubject'];
    $sunit = $data['sunit'];
    $title = $data['title'];

    if($title == "" || $tbodyE == ""){
        echo json_encode(array( "message" => "please fillup all ", "status" => false));
    }else{
        //$sql = "INSERT INTO topic(cname, cyear, csubject, sunit, title, tbody) VALUES ('{$cname}', '{$cyear}', '{$csubject}', '{$sunit}', '{$title}', '{$tbodyE}')";
        if ($db->insert('topic',['cname'=>$cname,'cyear'=>$cyear,'csubject'=>$csubject,'sunit'=>$sunit,'title'=>$title,'tbody'=>$tbodyE,])) {
            $db->getResult();//new topic id
            echo json_encode(array( "message" => " topic inserted ", "status" => true));
        }else {
            echo $db->getResult();
        }
        
    }
}elseif ($api_id == 3) {
    $id = $data['id'];
    $tbodyE = $data['tbodyE'];
    $cname = $data['cname'];
    $cyear = $data['cyear'];
    $csubject = $data['csubject'];
    $sunit = $data['sunit'];
    $title = $data['title'];

    if($title == "" || $tbodyE == ""){
        echo json_encode(array( "message" => "please fill * ", "status" => false));
    }else{
        if ($db->update('topic',['cname'=>$cname,'cyear'=>$cyear,'csubject'=>$csubject,'sunit'=>$sunit,'title'=>$title,'tbody'=>$tbodyE,],"tid = $id")) {
            $db->getResult();//new topic id
            echo json_encode(array( "message" => " topic updated ", "status" => true));
        } else {
            echo $db->getResult();
        }
        
    }

}else {
    echo json_encode(array('message' => 'api_id not found', 'status' => false ));
}
//$db->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//$db->update('students',['mobileno'=>''],'sid ="1"');
?>