<?php
 include "conn.php";
 session_start();
 if (isset($_SESSION['username'])) {
     header("Location: {$hostname}/another.php");
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
    <form id="check">
    username<input type="text" id="inputname"> <br>
    password <input type="password" id="inputpass">
    <button id="login">Login</button></form>

    <h1>insert new data</h1>
    <form id="insert">
        Fullname <input id="fullname" type="text">
        username <input type="text" id="username">
        email <input type="email" id="email">
        password <input type="password" id="password">
        <button id="submit">Submit</button>
    </form>
    <div>
        <a href="main.php">Go Without login</a>
    </div>

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
                    url:"http://localhost/sdms/userdata.php",
                    type:"POST",
                    data: jsondata,
                    success: function(data){
                        //console.log(data);
                        if(data.status == false){
                            alert(data.message);
                        }else{
                            alert(data.message);
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
                        location.href = "http://localhost/sdms/another.php";
                    } 
                    else {
                        alert(data.message);
                    }
                }
                });
            });


        });
    </script>
</body>
</html>