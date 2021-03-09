<!DOCTYPE html>
<html>
  <head>
    <!--<meta charset="utf-8" />
    <meta name="description" content="SDMS : Specially Designed for MGSU Students " />
    <meta name="keywords" content=" MGSU, SDMS, BCA, BSC, BCOM, BA" />-->
    <title>SDMS | Specially Designed For MGSU Students</title>
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
      <a href="" class="logolink"><span class="sdmslogo">SDMS</span></a>
      <p>
        Specially Designed for MGSU Students.<br /> 
        <span class="sas2">"It always seems impossible until it's done."</span>
      </p>
      <a href="login.php"><button class="startl">Login & Register </button></a> <br>
      <img src="css/icons/HD.png" alt="notfound" id="sabd">
    </div>
    <!--SectionB-->
    <div  id="B" class="sbheading" >
      
      <h1> Our Popular Cources </h1>
      <p>Select a cource and year to Start Learning!</p>
      
    </div>
    <div class="sectionB" >
      <div class="cards">
        <div class="cards-comon">
          <div  class="face front">
            <div class="secb-img bimg1">
              <p>BSc</p>
            </div>
            <div class="secb-fullform">
              <h2><b>Bachelor of Science</b></h2>
              <p><!--Full form of BSc is Bachelor of Science but in Latin its called <b>"Baccalaureus Scientiae”</b>--> Comming soon</p>
            </div>
          </div>
          <div class="face back" id="blue">
            <a  href="cources\BSC1\PhyPaper1\phyPaper1Unit1.html"><button class="ba1" >|</button></a>
            <a   href=""><button class="ba2">||</button></a>
            <a   href=""><button class="ba3">|||</button></a>
          </div>
        </div>

        <div class="cards-comon">
          <div class="face front">
            <div class="secb-img bimg2">
              <p>BCOM</p>
            </div>
            <div class="secb-fullform">
              <h2><b>Bachelor of Commerce</b></h2>
              <p><!--“Where students gain knowledge of accounting principles, export & improt laws <b>knowledge of Trade & Business</b>"--> Comming soon</p>
            </div>
          </div>
          <div class="face back" id="cream">
            <a  href="" target="_blank"><button class="ba1" >|</button></a>
            <a   href=""><button class="ba2">||</button></a>
            <a   href=""><button class="ba3">|||</button></a>
          </div>
        </div>

        <div class="cards-comon">
          <div class="face front">
            <div class="secb-img bimg3">
              <p>BCA</p>
            </div>
            <div class="secb-fullform">
              <h2><b>Bachelor of Computer &nbsp; Application</b></h2>
              <p>"BCA is one of the Popular courses among students Who want to make their career in <b>IT</b> field"</p>
            </div>
          </div>
          <div class="face back" id="green">
            <a  href="main.php?cource=BCA&year=1" target="_blank"><button class="ba1" >|</button></a>
            <a    href="main.php?cource=BCA&year=2" ><button class="ba2">||</button></a>
            <a   href="main.php?cource=BCA&year=3"><button class="ba3">|||</button></a>
          </div>
        </div>
      </div>
    </div>

    <div class="viewall"><a href="main.php"><button>View All Courses &#8594;</button> </a></div>
    <!--Section-C-->
    <div class="sectionC">
      <img src="css/icons/d12.jpg" alt="alt not found" id="scmylogo">
      <h1>"In this <a href="dataManagement.html">world</a> life has an end, but in life <a href="main.php">Learning</a>  never ends"</h1>
      <p>-Divesh Aggarwal</p>
      <div id="quickAdvance">
        <a href="quickSearch.php">Quick search</a>
      </div>
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
    <!--section H-->
    <div class="sectionH">
      <div class="hwrite"> 
        <h1> Hindi Meadium Students </h1>
        <p> Don't worry we are here to help you </p>
        <h2> Let see how to change an English webpage into Hindi <br> click on the following link </h2>
        <a href="#"><button>Hindi Meadium</button></a>
      </div>
      
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
