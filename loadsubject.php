<?php

header('Content-Type: application/json');//tells which type of data will this api return  
  header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all

  $data = json_decode(file_get_contents("php://input"), true);

  $subject = $data['subject'];
  $year = $data['year'];
  
  include "conn.php";

  $sql = "SELECT distinct csubject FROM topic WHERE cname = '{$subject}' and cyear = {$year} ";

  $result = mysqli_query($conn, $sql) or die("query failed");

  if(mysqli_num_rows($result) > 0){
      $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
      echo json_encode($output);

  }else{
      echo json_encode(array('message' => 'no Record found', 'status' => false));
  }

?>