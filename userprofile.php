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
    <link rel="stylesheet" type="text/css" href="css/userprofile.css" />
    <style>
       #navDiv{
            border-bottom: 3px solid #E66F2C;
        }
    </style>
</head>
<body>
    <!--Section-x-->
    <div id="navDiv">
      <div id="navDiv_a">
        <a id="sdmsLogo" href="index.php">SDMS</a>
        <a href="main.php">Main page</a>                
      </div>
      
      <div id="navDiv_b">
        <a href="quickSearch.php" >Quick search</a>
        <div id="userDiv">
            <a href='logout.php'>Logout</a>
            <?php
            if ($_SESSION['userimage'] !== "") {
                echo "<img src = '" . $_SESSION['userimage']. "' alt = 'not found2'> <br>";
            } else {
                echo "<img src = 'images/userdata/profile.jpg'  alt = 'not found'> <br>";
            }   
            ?>
        </div>
      </div>
    </div>
    <!--Section-x end-->
    
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
                  echo "<img  id='previewImg' src = '" . $_SESSION['userimage']. "' alt = 'error 404'> <br>";
               } else {
                echo '<img id="previewImg" src="images/userdata/profile.jpg" alt="your image" /> <br>';
               }               
            ?>
            
            </div>
            <div>
                <form id="subImg">
                    <label for="user_img">Browser</label>
                    <input type="file" name="file" id="user_img" onchange="readURL(this);"/>
                    <input type="submit" name="uploadButton" id="uploadBtn" value="Upload"/>
                    
                </form>
                <button id="cancle">cancle</button>
                <button id="deleteBtn">delete</button>
            </div>
        </div>
        
        
    </div>

    <div id="user_topics"></div>
    
    <script src="functions.js"></script>
    <script>
        //uplod image
        $(document).ready(function(){
            
            //global variables
            var gUid = <?php echo $_SESSION['userid'] ?>;
            var gUimage = "<?php echo $_SESSION['userimage'] ?>";
            
            //uplod image
            $("#subImg").on("submit", function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                if (gUimage !="") {
                    //delete old image if present
                    unlink_UserImage(gUimage,gUid);
                }
                $.ajax({
                url : "userImgUplod.php",
                type : "POST",
                data : formData,
                contentType :false,
                processData:false,
                success: function(data){
                    //$("#imagePre").html(data);
                    //$("#user_img").val('');
                    //console.log(data);
                    setTimeout(location.reload.bind(location),1000); 
                }
                });    
            });

            //delete user image
            $("#deleteBtn").on("click",function  () {
                if(confirm("are you sure?")){
                    unlink_UserImage(gUimage,gUid,1);
                }
            });

            //editbutton
            $("#editProfile ,#cancle").on("click",function () {
                $("#userImgUpDiv").slideToggle();
            });
           
        });//ready
    </script>
</body>
</html>