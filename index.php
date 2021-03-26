<!DOCTYPE html>
<html>
  <head>
    <!--<meta charset="utf-8" />
    <meta name="description" content="SDMS : Specially Designed for MGSU Students " />
    <meta name="keywords" content=" MGSU, SDMS, BCA, BSC, BCOM, BA" />-->
    <title>SDFS | Specially Designed For Students</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sdms.css" />
    <!--<link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet"-->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <meta name="viewport" content="Width=device-width, initial-scale=1.0" />
    <style>
      @media (max-width: 463px) {
        .sdmslogo {
          font-size: 400%;
        }
      }
      .sectionC a {
        outline: none;
        color: white;
        cursor:text;
        text-decoration: none;
      }  
    </style>
  </head>
  <body>
    <!--loading start-->
    <div class="loader">
      <h3><span class="thumb">loading...</span></h3>
      <!--  <img src="lo.gif" alt="loading..."/>     -->
    </div>
    <!--loading end-->
    <!--SectionA-->
    <div class="sectionA A2">
      <a href="" class="logolink"><span class="sdmslogo">SDFS</span></a>
      <p>
        Specially Designed For Students.<br /> 
        <span class="sas2">"It always seems impossible until it's done."</span>
      </p>
      <a href="login.php"><button class="startl">Login & Register </button></a> <br>
      <img src="css/icons/HD.png" alt="notfound" id="sabd">
    </div>
    <!--SectionB-->
    <div  id="B" class="sbheading" >
      
      <h1> Notes </h1>
      <p>Learn, Creat, Share</p>

      
    </div>
    <!--Section-C-->
    <div class="sectionC">
      <img src="css/icons/d12.jpg" alt="alt not found" id="scmylogo">
      <h1>"In this <a href="dataManagement.html">world</a> life has an end, but in life <a href="main.php">Learning</a>  never ends"</h1>
      <p>-Divesh Aggarwal</p>
      <!--<div id="quickAdvance">
        <a href="quickSearch.php">Quick search</a>
      </div>-->
    </div>
    <!--section E-->
    <div class="sectionE">
      <div class="econtent">
        <div class="ec1">
          <div class="noads">
            <div class="pngbox">
              <img src="css/icons/noads.png" alt="alt not found" class="ecimages">
            </div>
            <div class="ectext">
              <p> <span class="ecsptext">NO ADS !</span> <br> <br> Yeah that's help us to make Money, but they are too much irritating so, we hate them too !</p>
            </div>
          </div>
        </div>
        <div class="ec1">
          <div class="nocash">
            <div class="pngbox">
              <img src="css/icons/nocash.png" alt="alt not found" class="ecimages">
            </div>
            <div class="ectext">
              <p><span class="ecsptext">Free !</span> <br> <br> we love Money, but we think Education must be Free !</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <!--section R-->
    <div class="sectionR">
      <h1> Available Anywhere & Anytime for <br> Any Devices! </h1> 
      <img src="css/icons/r1.png" alt="alt not found" id="r1" >
    </div>
    
    <!--Section-footer-->
    <?php include "footer.php"; ?>
    <script>
      //loader start
      window.addEventListener("load", function () {
        const loader = document.querySelector(".loader");
        loader.className += " hidden";
      });
      //loder ends
    </script>
  </body>
</html>
