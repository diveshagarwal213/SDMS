<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $search = isset($_GET['search']) ? $_GET['search'] : die("url error");
    
    //$conn = mysqli_connect("localhost","root","","sdms");
    include "conn.php";
    $sql = "SELECT tid, cname, cyear, csubject, sunit, title FROM topic WHERE title LIKE '%{$search}%' or tid LIKE '%{$search}%' or cname LIKE '%{$search}%' or csubject LIKE '%{$search}%'";
    //$sql = "SELECT tid, cname, cyear, csubject, sunit, title FROM topic WHERE title LIKE '%{$search}%' or tid LIKE '%{$search}%'";
    $result = mysqli_query($conn,$sql) or die("query error");

    if(mysqli_num_rows($result) > 0 ){
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('message' => 'No Record Found', 'status' => false ));
    }

?>