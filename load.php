<?php

  header('Content-Type: application/json');//tells which type of data will this api return  
  header('Access-Control-Allow-Origin: *');// which site have acess to this api *->all

  include "conn.php";

  $sql = "SELECT tid, cname, cyear, csubject, sunit, title  FROM topic ORDER BY tid DESC";
  $result = mysqli_query($conn, $sql) or die("query failed");
  
  if(mysqli_num_rows($result) > 0){
      $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
      echo json_encode($output);
  }else{
      echo json_encode(array('message' => 'no Record found', 'status' => false));
  }

?>