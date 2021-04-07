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
        padding: 8px 8px;
        margin-bottom: 5px;
        background: rgba(187, 134, 252, 0.200);
        border-radius: 5px;
        transition: background-color 1s;
        border-radius: 25px;
        display: none;
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
        <a id="sdmsLogo" href="index.php">SDFS</a>              
      </div>
      
      <div id="navDiv_b">
        <a href="quickSearch.php" >Notes</a>
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
    <div id="mobNav">
        <button id="searchBar_btn"> &#9776; </button>
    </div>
    <div id="mainBox">
      <div id="searchBar">
        <div id="inputDiv">
          <input type="text" id="searchBox" placeholder="More than 2 words  ...search">
          <!--<img src="css/icons/search_icon.svg" alt="search">-->
        </div>
        <div id="loadDiv"></div>
        <div id="popular"></div>
        <div id="recents"></div>
      </div>
      <div id="titleBody">
      <h2>Default Text</h2>
        
        <h1 id="h1"></h1>
        <button class ="youtubeBtn">Youtube</button>
        <div class="ytcont">
          <iframe class="responsiveif"  frameborder="0" allowfullscreen></iframe>
        </div>
        <p id="t1" ></p>
        <h1 id="h2"></h1>
        <p id="t2"></p>
        <h1 id="h3"></h1>
        <p id="t3"></p>
      </div>
    </div>

    <div id="message_box">
        <div id="success"></div>
        <div id="error"></div>
    </div>
    <?php include "footer.php"?>
    
    <script src="functions.js"></script>

    <script>


      let test = async (url) => {
        try {
          const response = await fetch(url);
          const res = await response.json();
          //console.log(res);
          if(res[0].status == false){
            throw new Error('test status false')
          }else{
            return res;
          } 
        } catch (error) {
            console.log(`${error}. so, tata bye bye `);
            //message("no record found", false);
        }
      };
      
      //search Notes
      $("#searchBox").keyup( function ()  {
        $("#loadDiv").html(""); 
        if(this.value.length >= 3){
          var serach_key = $("#searchBox").val();
          test(`http://localhost/sdms/php_files/databaseApi.php?api_id=7&search=${serach_key}`)
          .then( data => {
            $.each(data, (key, value) => {
              $("#loadDiv").append(`<button class= "same" data-id= "${value.tid}"  > ${value.title} </button>`);
            });
          }
          );
        }
      });
      
      //load body
      $(document).on('click','.same', function(){
        var id = $(this).data("id");
        test(`http://localhost/sdms/php_files/databaseApi.php?api_id=3&id=${id}`)
        .then(data => {
          console.log(data);
          $("#title").html(data[0].title);
          $("#h1").html(data[0].h_one);
          $("#t1").html(data[0].t_one);
          $("#h2").html(data[0].h_two);
          $("#t2").html(data[0].t_two);
          $("#h3").html(data[0].h_three);
          $("#t3").text(data[0].t_three);
          $(".responsiveif").attr("src","https://www.youtube.com/embed/" + data[0].youtube_link);
            $(".youtubeBtn").slideDown(1000);
        });
      });

      //ready document
      $(document).ready( function(){
        //active button color
        $(document).on("click",".same", function(){
            $("#loadDiv button").css({"background-color": "#121212"});
            $(this).css({"background-color": "rgba(187, 134, 252, 0.300)"});
        });
        //youtube btn
        $(document).on("click",".youtubeBtn", function(){
            $(".ytcont").slideToggle(600);
        });
        //media searchBar
        $(document).on("click","#searchBar_btn", function(){
          var width = $("#searchBar").width();
          if (width >= 10) {
            $("#searchBar").css({"width": 0});
          }else{
            $("#searchBar").css({"width": 250});
          }
        });
      });//ready
    </script>
</body>
</html>