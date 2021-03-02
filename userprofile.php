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
               if ($_SESSION['userimage'] != "") {
                  echo "<img src = '" . $_SESSION['userimage']. "' alt = 'error 404'> <br>";
               } else {
                echo "<img src = 'images/userdata/profile.jpg'  alt = 'not found'> <br>";
               }               
            ?>
            <button id="editProfile">Edit profile</button>            
        </div>
        <div id="usernameDiv">
            <?php
                echo "<p> <span id='username'>". $_SESSION['fullname']. "</span> <br>". $_SESSION['username']. "</p>" ;
            ?>
        </div>
    </div>
    <div id="userImgUpDiv">
        
        <div id="imagePreDiv">
            <div id="imagePre">
            <?php
               if ($_SESSION['userimage'] != "") {
                  echo "<img src = '" . $_SESSION['userimage']. "' alt = 'error 404'> <br>";
               } else {
                echo "<img src = 'images/userdata/profile.jpg'  alt = 'not found'> <br>";
               }               
            ?>
            </div>
            <div>
                <form id="subImg">
                    <label for="user_img">Select image : </label>
                    <input type="file" name="file" id="user_img"/>
                    <input type="submit" name="uploadButton" id="uploadBtn" value="Upload"/>
                    
                </form>
                <button id="cancle">cancle</button>
                <button id="deleteBtn">delete</button>
            </div>
        </div>
        
        
    </div>

    <script>
        //uplod image
        $(document).ready(function(){
            
            //uplod image
            $("#subImg").on("submit", function (e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                url : "userImgUplod.php",
                type : "POST",
                data : formData,
                contentType :false,
                processData:false,
                success: function(data){
                    $("#imagePre").html(data);
                    $("#user_img").val('');
                    setTimeout(location.reload.bind(location),1000); 
                }
                });    
            });

            //delete user image
            $("#deleteBtn").on("click",function () {
                if (confirm("sure?")) {
                    //var path = $("#deleteBtn").data("path");
                    var path = "<?php echo $_SESSION['userimage'] ?>";

                    $.ajax({
                    url : "deleteUserPImg.php",
                    type : "POST",
                    data : {path : path},
                    success: function(data){
                        if(data != ""){
                            $("#imagePre").html('');
                            setTimeout(location.reload.bind(location),1000); 
                        }
                    }
                    });
                }
            });

            //editbutton
            $("#editProfile ,#cancle").on("click",function () {
                $("#userImgUpDiv").slideToggle();
            })
        });//ready
    </script>
</body>
</html>