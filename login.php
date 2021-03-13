<?php
 include "conn.php";
 session_start();
 if (isset($_SESSION['username'])) {
     header("Location: {$hostname}/userprofile.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="jquery.js"></script>
    <style>
        #navDiv{
            border-bottom: 3px solid #E66F2C;
        }
    </style>
</head>
<body>
    <!--Section-x same as quick.php --> 
    <div id="navDiv">
      <div id="navDiv_a">
        <a id="sdmsLogo" href="index.php">SDMS</a>               
      </div>
      
      <div id="navDiv_b">
        <a href="quickSearch.php" >Quick search</a>
        <div id="userDiv">
          <?php
            if (isset($_SESSION['username'])) {
              echo "<a id = 'user' href = 'userprofile.php'>". $_SESSION['username']. "</a>";
              if ($_SESSION['userimage'] !== "") {
                echo "<img src = '" . $_SESSION['userimage']. "' alt = 'not found2'> <br>";
              } else {
                echo "<img src = 'images/userdata/profile.jpg'  alt = 'not found'> <br>";
              }               
            }else{
              echo "<a id ='user' href = 'login.php'>Login</a>";
              echo "<img src = '" . "images/userdata/profile.jpg". "' alt = 'not found'>";
            }
          ?>
        </div>
      </div>
    </div>
    <!--Section-x End-->

    <div id="first_div">
        <div id="second_div">
            <div id="loginDiv">
                <h1>Login</h1>
                <h3>New to Sdms? <button id="create" >Creat an account</button></h3>
                <form id="check" spellcheck="false">
                    <input type="text" id="inputname" placeholder="Username" autocomplete="off"> <br>
                    <input type="password" id="inputpass" placeholder="Password">
                    <br> <br>
                    <button id="login">Login</button>
                    <p> <button>Forget Password ?</button></p>
                    <br>
                    <a id="main_page" href="main.php">continue Without Login</a>
                </form>
            </div>

            <div id="regDiv">
                <h1>Register</h1>
                <h3>Already have an Account? <button id="already">Login</button></h3>
                <form id="insert" spellcheck="false">
                    <input id="fullname" type="text" placeholder="Full Name" autocomplete="off"> <br>
                    <input type="text" id="username" placeholder="Username"> <br>
                    <input type="email" id="email" placeholder="Email"> <br>
                    <input type="password" id="password" placeholder="password"> <br>
                    <br>
                    <button id="submit">Submit</button>
                    <p>By signing up you agree to our <button>Terms of Use </button></p>
                </form>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>

    <script>
        $(document).ready(function(){

            //insert data
            $("#submit").on("click", function(e){
                e.preventDefault();
                var fulln = $("#fullname").val();
                var usern = $("#username").val();
                var e = $("#email").val();
                var pass = $("#password").val();
                var obj = { fullname : fulln, username: usern, email: e, password : pass};
                var jsondata = JSON.stringify(obj);

                $.ajax({
                    url:"http://localhost/sdms/php_files/databaseApi_insert.php?api_insert_id=1",
                    type:"POST",
                    data: jsondata,
                    success: function(data){
                        //console.log(data);
                        if(data.status == false){
                            alert(data.message);
                            console.log(data);
                        }else{
                            alert("please log in to continue ");
                            $("input").val("");
                        }
                    }
                });

            });
            
            //check user data
            $("#login").on("click", function(a){
                a.preventDefault();
                var inputn = $("#inputname").val();
                var inputp = $("#inputpass").val();
                var obj = {inputuser: inputn, inputpass: inputp};
                var jsondata2 = JSON.stringify(obj);
                //console.log(jsondata2);
                $.ajax({
                url:"http://localhost/sdms/usercheck.php",
                type:"POST",
                data: jsondata2,
                success: function(data){
                    //console.log(data);
                    if (data.status == true) {
                        location.href = "http://localhost/sdms/userprofile.php";
                    } 
                    else {
                        alert(data.message);
                    }
                }
                });
            });

            //hide login
            $("#create").on('click', function () {
                $("#loginDiv").slideUp(900)
            });

            //show login
            $("#already").on('click', function () {
                $("#loginDiv").slideDown(900)
            });


        });//ready
    </script>
</body>
</html>