<?php
 include "conn.php";
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: {$hostname}/login.php");
 }
 $id = $_SESSION['userid'];

    if(!empty($_POST['path'])){
        if (unlink($_POST['path'])) {
            echo "image Deleted";
        }
        $sql = "UPDATE userdata SET uimage = NULL  WHERE uid = '{$id}'";
        if(mysqli_query($conn,$sql)){
            echo "<script>console.log('image deleted from database');</script>";
            $_SESSION['userimage'] = "";    
        }
    }

?>