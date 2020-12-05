<?php

  header('Content-Type: application/json');//tells which type of data will this api return  
  header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
  // x methed tell that data can only be recived from ajax

  $data = json_decode(file_get_contents("php://input"), true);

  $id = $data['id'];
  
  include "conn.php";

  $sql = "DELETE FROM topic WHERE tid = {$id}";

  if(mysqli_query($conn, $sql)){
   echo json_encode(array('message' => 'Data Deleted', 'status' => True));
  }else{
      echo json_encode(array('message' => 'Not Deleted', 'status' => false));
  }

?>