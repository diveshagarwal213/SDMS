//loader start
window.addEventListener("load", function () {
  const loader = document.querySelector(".loader");
  loader.className += " hidden";
});
//loder ends


//footer section
$(function () {
  var fhline = $("<div></div>")
  .text("Specially Designed for MGSU Student")
  .attr("class", "f-hline");
  $(".footer").append(fhline);
  
  var fcontainer = $("<div></div>").attr("class", "f-container");
  $(".f-hline").after(fcontainer);
  
  var fc = $("<div></div>").attr("class", "fc1 fc-com");
  var fc2 = $("<div></div>").attr("class", "fc2 fc-com");
  var fc3 = $("<div></div>").attr("class", "fc3 fc-com");
  $(".f-container").append(fc, fc2, fc3);
  
  //fc1
  var fc1a = $("<a></a>").attr("href", "").attr("id", "facebook");
  var fc1a2 = $("<a></a>").attr("href", "").attr("id", "instagram");
  var fc1a3 = $("<a></a>").attr("href", "").attr("id", "youtube");
  $(".fc1").append(fc1a, fc1a2, fc1a3);
  
  var fc1logo = $("<div></div>").attr("class", "fc1-logo");
  $(".fc1 a").append(fc1logo);
  
  var fc1ll1 = $("<div></div>").attr("class", "fc1-l l1");
  $(".fc1-logo").append(fc1ll1);
  
  var l2 = $("<img/>").attr("class", "l2");
  $(".l1").append(l2);
  
  $("#facebook img").attr("src", "icons\\facebook.png");
  $("#instagram img").attr("src", "icons\\instagram.png");
  $("#youtube img").attr("src", "icons\\youtube.png");
  
  var lt = $("<div></div>").attr("class", "fc1-lt");
  $(".l1").after(lt);
  
  $("#facebook .fc1-lt").text("Facebook");
  $("#instagram .fc1-lt").text("Instagram");
  $("#youtube .fc1-lt").text("YouTube");
  
  //fc2
  var fc2ul = $("<ul></ul>").attr("class", "fc2-ul");
  $(".fc2").append(fc2ul);
  
  var fc2li = $("<li></li>").attr("id", "lihome").html("<a>Home</a>");
  var fc2li2 = $("<li></li>").attr("id", "licourses").html("<a>Courses</a>");
  var fc2li3 = $("<li></li>").attr("id", "litou").html("<a>Term of use </a>");
  var fc2li4 = $("<li></li>").attr("id", "lifq").html("<a>F&Q </a>");
  $(".fc2-ul").append(fc2li, fc2li2, fc2li3, fc2li4);
  
  $("#lihome a").attr("href", "..\\..\\..\\index.html");
  $("#licourses a").attr("href", "..\\..\\..\\selectC.html");
  
  //fc3
  var fc3content = $("<p></p>").html(
  ' <span>SDMS</span><br/><br/><i>it doesn\'t matter what others are doing. only matters what YOU are doing."<br/><br/>Email Us <br/>sdms@gmail.com'
  );
  $(".fc3").append(fc3content);
  
  /*var copyright = $("<div></div>")
  .attr("class", "copyright")
  .html(" &copy; 2020 SDMS.All reights resived.");
  $(".footer").after(copyright);*/
  
  });
  //footer ends