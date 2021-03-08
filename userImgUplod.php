<?php
include "conn.php";
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: {$hostname}/login.php");
 }
 $id = $_SESSION['userid'];

 if ($_FILES['file']['name'] != '') {
    
    $fileName =$_FILES['file']['name'];
    $ext = pathinfo($fileName,PATHINFO_EXTENSION);
    $valid_ext =array("jpeg","jpg","png");

    if (in_array($ext,$valid_ext)) {
        $newName = rand() . "." . $ext;
        $path = "images/userdata/" . $newName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            echo '<img src ="' .$path. '"/>';
            $sql = "UPDATE userdata SET uimage = '{$path}'  WHERE uid = '{$id}'";
            if(mysqli_query($conn,$sql)){
                echo "image saved to database";
                $_SESSION['userimage'] = $path;
            }
        }else{
            echo "<script>alert('move uplod error')</script>";
        }
    }else{
        echo"<script>alert('invalid file format')</script>";
    }
}else{
    echo"<script>alert('please select file')</script>";
}

?>