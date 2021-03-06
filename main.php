<?php

include "conn.php";

//check url variables are present or not
function check_index($key, $def){
  return isset($_GET[$key]) ? $_GET[$key] : $def; 
}
$cource_index = check_index("cource","BCA");
$year_index = check_index("year", 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="jquery.js"></script>
    <title>Main | SDMS.com</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/media.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/main2.css" />
    <meta name="viewport" content="Width=device-width, initial-scale=1.0" />
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
    </style>
  </head>
  
  <body>
    <!--loading start-->
    <div class="loader"><h3><span class="thumb">loading...</span></h3></div>

    <!--Section-x-->
    <div id="navDiv">
      <div id="navDiv_a">
        <a id="sdmsLogo" href="index.php">SDMS</a>
        <a id="selectcBtn" >SelectCource</a>                
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
    <!--select cource-->
    <div id="selectDiv">
      <div id="cbDiv">
        <button class="cBtn" data-idcource = "BCA">BCA</button>
        <button class="cBtn" data-idcource = "BSC">BSC</button>
        <button class="cBtn" data-idcource = "BCOM">BCOM</button>
      </div>
      <hr>
      <h4>Select Year</h4>
      <button class="yearBtn" data-idyear = "1">ONE</button>
      <button class="yearBtn" data-idyear = "2">TWO</button>
      <button class="yearBtn" data-idyear = "3">THREE</button>
    </div>
	  <!--subject-->
	  <button class="selectsub"> Select Subject <span id="cross" >  &#9652 </span> <span id="cross2" > &#9662</span> </button>
    <div class="subject"></div>
    <!--unit-->
    <div class="unit">
      <button class = "unitBtn" data-idunit = "1">I</button>
      <button class = "unitBtn" data-idunit = "2">II</button>
      <button class = "unitBtn" data-idunit = "3">III</button>
      <button class = "unitBtn" data-idunit = "4">IV</button>
      <button class = "unitBtn" data-idunit = "5">V</button>
    </div>
    <!--unit ends-->

    <!--topic-->
    <div class="topic">
      <button id="tb">Topics</button>
     <div class="unitcontent"> </div>
	   <div class="ads">ADS Block</div>
	  </div>
    <!--topic End-->
    
    <!--section M (main)-->
    <div class="sectionM">
      <div id="secMcontent">
        <h2>Tips :</h2>
        <p> First Select COURCE and YEAR then SUBJECT, UNIT and TOPIC </p>
      </div>
      <div id="topicBy"> Admin(not working)</div>
      <div class="ads2">ADS Block</div>
      <button id="scrolltop">
		    <svg height="48" viewBox="0 0 48 48" width="48"> <path d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z" /> <path d="M0 0h48v48h-48z" fill="none" /></svg> 
	    </button>
	  </div>
    <!--section ends-->

   <!--Section-footer-->
   <?php include "footer.php"?>
   <script src="main.js"></script>
   

   <script>
     //global variables
     var gunit = 0;
     var gsubject = "";
     var gtitle = "";
     var gcource = "<?php echo $cource_index?>";
     var gyear = <?php echo $year_index?>;
     var topicBy = 01;

     $(document).ready(function(){

      //get subjects from data base
      function fetch_subjects(cource_name,c_year,selectC_btn = null) {
        var obj = {cource: cource_name, year: c_year};
        var send = JSON.stringify(obj);
        //console.log(send);
        $.ajax({
          url:"http://localhost/sdms/php_files/databaseApi.php?api_id=1",
          type:"POST",
          data: send,
          success: function(data){
            //console.log(data);
            if(data[0].status == false){
              $(".subject").append("<h2>" + data[0].message + "</h2>");
            }else{
              $.each(data, function(key, value){
                  $(".subject").append("<button class = 'subBtn' data-idsub = '" + value.csubject + "'>" + value.csubject +"</button>");
              });
              if (selectC_btn != null) {
                $("#selectcBtn").html("" + gcource + "-" + gyear + "");
              }
             }
          }
        });
      }
      fetch_subjects(gcource,gyear,1);
      
      //empty;
      function emptyAll() {
        $("#secMcontent").html("<h2>Tips : - </h2> <p> First Select COURCE and YEAR then SUBJECT, UNIT and TOPIC </p>");
        $(".unitcontent").html("");
        $(".subject").html("");
        $(".unitBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
        $("#topicBy").html("");
      }
      //byuser
      function byUser() {
          if (topicBy !== 01) {
            var obj = {userid : topicBy};
          var jsondata = JSON.stringify(obj);
          //console.log(jsondata);
          $.ajax({
          url : "http://localhost/sdms/php_files/databaseApi.php?api_id=6",
          type : "POST",
          data : jsondata,
          success: function(data){
            //console.log(data);
            if (data[0].status == false) {
              $("#topicBy").html("Admin");
            } else {
              $("#topicBy").html("by " + data[0].username);
            }
          }
          });
          } else {
            $("#topicBy").html("Admin");
          }
        } byUser();
      // New gcource
      $(".cBtn").on("click", function () {
        gcource = $(this).data("idcource"); //global
      });
      
      //send New year and cource data to load subject data
      $(".yearBtn").on("click", function () {
        gyear = $(this).data("idyear"); //global
        emptyAll();
        fetch_subjects(gcource,gyear);
      }); 

      // store global subject data , select subject 
      $(document).on("click",".subBtn", function(){
        gsubject = $(this).data("idsub"); //global
        $(".selectsub").html(''+ gsubject +' <span id="cross2" >  &#9652 </span> <span id="cross" > &#9662</span>');
        if(screen.width <= 521){
          $(".selectsub").trigger("click");
        };
      });
      
      // store global unit data and load topics
      $(document).on("click",".unitBtn", function(){
        gunit = $(this).data("idunit"); //global
        var obj = {unitId: gunit, subjectId: gsubject};
        var senddata = JSON.stringify(obj);
        //console.log(senddata);
        $(".unitcontent").html("");
        $.ajax({
          url:"http://localhost/sdms/php_files/databaseApi.php?api_id=2",
          type:"POST",
          data: senddata,
          success: function(data){
            //console.log(data);
            if(data[0].status == false){
              $(".unitcontent").append("<h2>" + data[0].message + "</h2>");
            }else{
              $.each(data, function(key, value){
                $(".unitcontent").append("<button class = 'titleBtn' data-idtid = '" + value.tid + "' data-idtitle = '" + value.title + "'>" + value.title +"</button>");
              });
            }
          }
        });
      });
      
      //load tbody 
      $(document).on("click",".titleBtn", function(){
        var id2 = $(this).data("idtid");
        $("#secMcontent").html("");
        var upidobj = {id: id2};
        //console.log(upidobj);
        var upidjson = JSON.stringify(upidobj);
        $.ajax({
            url:"http://localhost/sdms/php_files/databaseApi.php?api_id=3",
            type: "POST",
            data: upidjson,
            success: function(data){
                //console.log(data);
                $("#secMcontent").prepend("<div>"+ data[0].tbody +"</div>");
                topicBy = data[0].topicby;
                byUser();
            }
        });
      });
    
      //active button color sub
      $(document).on("click",".subBtn", function(){
          $(".subBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(".unitBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(this).css({"background-color": "rgba(187, 134, 252, 0.400)"});
      });
      //active button color unit
      $(document).on("click",".unitBtn", function(){
          $(".unitBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(this).css({"background-color": "rgba(187, 134, 252, 0.400)"});
      });
      //active button color unit
      $(document).on("click",".titleBtn", function(){
          $(".titleBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(this).css({"background-color": "rgba(187, 134, 252, 0.400)"});
          //set current topic name
          gtitle = $(this).data("idtitle");
          if(screen.width <= 521){
            $("#tb").html("" + gtitle + "");
            $("#tb").trigger("click");
          };
      });
      //active Cource btn color
      $(document).on("click",".cBtn", function(){
          $(".cBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(".yearBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(this).css({"background-color": "rgba(187, 134, 252, 0.400)"});
      });
      //active year btn color
      $(document).on("click",".yearBtn", function(){
          $(".yearBtn").css({"background-color": "rgba(187, 134, 252, 0.200)"});
          $(this).css({"background-color": "rgba(187, 134, 252, 0.400)"});
          $("#selectDiv").slideUp(1000);
          $("#selectcBtn").html("" + gcource + "-" + gyear + "");
      });
      //selectcBtn
      $("#selectcBtn").on("click",function(){
        $("#selectDiv").slideToggle(500);
      });
      //youtube btn
      $(document).on("click",".youtubeBtn", function(){
        $(".ytcont").slideToggle(600);
      });

     });//ready
   </script>
  </body>
</html>
