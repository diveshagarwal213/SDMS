<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search And Read</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/searchTopics.css">
    <style>
      .fig1{
        max-width: 500px;
      }
      .youtubeBtn {
        outline: none;
        cursor: pointer;
        border: none;
        color: white;
        padding: 10px 8px;
        background: rgba(187, 134, 252, 0.200);
        border-radius: 5px;
        transition: background-color 1s;
        border-radius: 25px;
      }
      .youtubeBtn:hover {
        background-color: rgba(187, 134, 252, 0.400);
      }
      .ytcont{
        border: 1px solid #BB86FC;
      }
      .f-hline{
        background-color: rgba(187, 134, 252, 0.300);
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
          <?php
            session_start();
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

    <div id="inputDiv">
        <input type="text" id="searchBox" placeholder="Type at least 3 characters">
        <img src="css/icons/search_icon.svg" alt="search">
    </div>
    <div id="loadDiv"></div>
    <div id="titleBody"></div>
    <?php include "footer.php"?>

    <script>

        $(document).ready( function(){

            //key up
            $("#searchBox").keyup(function () {
                if(this.value.length >= 3){
                    var search1 = $("#searchBox").val();
                    $("#loadDiv").html(""); 
                    //console.log(search1);   
                    $.ajax({
                        url: "http://localhost/sdms/php_files/databaseApi.php?api_id=7&search=" + search1,
                        type: "GET",
                        success: function(data){
                            if(data[0].status == false){
                                $("#loadDiv").append("<tr><td><h2>" + data[0].message + "</h2></td></tr>"); 
                            }else{
                                $.each(data, function(key, value){
                                    $("#loadDiv").append("<button class='same' data-id='" + value.tid + "'>" + value.title + "</button>");
                                });
                            }
                        }
                    });
                }
            })

            //load tbody
            $(document).on("click",".same", function(){
                var idarr = $(this).data("id");
                var idobj = {id: idarr};
                var idjson = JSON.stringify(idobj);
                //console.log(idjson);
                $.ajax({
                    url:"http://localhost/sdms/php_files/databaseApi.php?api_id=3",
                    type:"POST",
                    data: idjson,
                    success: function(data){
                        if(data.status == false){
                            alert(data.message);
                        }else{
                            var tbody2 = data[0].tbody;
                            $("#titleBody").html(tbody2);
                        }
                    }
                });
            });
            
            //active button color
            $(document).on("click",".same", function(){
                $("#loadDiv button:nth-child(even)").css({"background-color": "#EEEEEE"});
                $("#loadDiv button:nth-child(odd)").css({"background-color": "#121212"});
                $(this).css({"background-color": "rgba(187, 134, 252, 0.300)"});
            });
            //youtube btn
            $(document).on("click",".youtubeBtn", function(){
                $(".ytcont").slideToggle(600);
            });

        });//ready
        
    </script>
</body>
</html>