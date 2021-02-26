<?php
 include "conn.php";
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: {$hostname}/login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/media.css" />
    <link rel="stylesheet" type="text/css" href="css/userprofile.css" />
</head>
<body>
    <div id="navDiv">
        <a href="index.html">SDMS</a>
        <a href="logout.php">Logout</a>
        <a href="main.php">Main page</a>
        <a href="searchTopic.html" >Quick search</a>
    </div>
    
    <hr>
    
    <div id="ucontent">
        <div id="imageDiv">
            <?php
               if ($_SESSION['userimage'] !== "") {
                  echo "<img src = 'images/userdata/" . $_SESSION['userimage']. "' alt = 'not found2'> <br>";
               } else {
                echo "<img src = 'images/userdata/profile.jpg'  alt = 'not found'> <br>";
               }               
               echo "<button>Edit profile</button>";
            ?>            
        </div>
        <div id="usernameDiv">
            <?php
                echo "<p> <span id='username'>". $_SESSION['fullname']. "</span> <br>". $_SESSION['username']. "</p>" ;
            ?>
        </div>
    </div>
</body>
</html>