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
</head>
<body>
    <h1> Welcome <?php echo $_SESSION['username']?></h1>
    <a href="logout.php">logout</a>
    <?php
    $username = $_SESSION['username'];
    echo "<h2> Hi ".$username."</h2>";
    ?>
    <a href="main.php">mainpage</a>
</body>
</html>