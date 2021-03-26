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
}elseif($api_id == 5){ //insert new data to topics  
    
    //tid auto increment
    $title = $data['title'];
    $h_one = $data['h_one'];
    $h_two = $data['h_two'];
    $h_three = $data['h_three'];
    $t_one = $data['t_one'];
    $t_two = $data['t_two'];
    $t_three = $data['t_three'];
    $topic_by = $data['topic_by'];
    $youtube = $data['youtube'];
    // empty fields image-one-two-three, t_likes , reports, active => total(19-7 = 12)

    if($title == "" || $h_one == "" ){
        echo json_encode(array( "message" => "please fillup all * ", "status" => false));
    }else{
        if ($db->insert('topics',['title'=>$title,'h_one'=>$h_one,'h_two'=>$h_two,'h_three'=>$h_three,'t_one'=>$t_one,'t_two'=>$t_two,'t_three'=>$t_three, 'youtube_link'=> $youtube ,'topic_by'=>$topic_by])) {
            $Smessage = $db->getResult(); 
            echo json_encode(array("message" => "$Smessage", "status" => true ));
        }else{
            $Emessage = $db->getResult(); 
            echo json_encode(array("message" => "$Emessage", "status" => false ));
        }
    }
}elseif ($api_id == 6) {
    $id = $data['id'];
    $title = $data['title'];
    $h_one = $data['h_one'];
    $h_two = $data['h_two'];
    $h_three = $data['h_three'];
    $t_one = $data['t_one'];
    $t_two = $data['t_two'];
    $t_three = $data['t_three'];
    $youtube = $data['youtube'];
    if($title == "" || $h_one == "" ){
        echo json_encode(array( "message" => "please fillup all * ", "status" => false));
    }else{
        if ($db->update('topics',['title'=>$title,'h_one'=>$h_one,'h_two'=>$h_two,'h_three'=>$h_three,'t_one'=>$t_one,'t_two'=>$t_two,'t_three'=>$t_three,'youtube_link'=> $youtube],"tid = $id")) {
            $Smessage = $db->getResult(); 
            echo json_encode(array("message" => "$Smessage", "status" => true ));
        }else{
            $Emessage = $db->getResult(); 
            echo json_encode(array("message" => "$Emessage", "status" => false ));
        }
    }
}else{
    echo json_encode(array('message' => 'api_id not found', 'status' => false ));
}
//$db->insert('students',['sname'=>'Ram2','age'=>'18','mobileno'=>'0123456789']);
//$db->update('students',['mobileno'=>''],'sid ="1"');
?>