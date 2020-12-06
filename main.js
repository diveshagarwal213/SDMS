//topics button
$(function () {
  $("#tb").click(function () {
    $(".unitcontent").slideToggle(600);
  });
});

$(document).on("click","#youtubeBtn", function(){
  $(".ytcont").slideToggle(600);
});
//select Subject button
$(function () {
  $(".selectsub").click(function () {
    $(".subject").slideToggle(600);
    $("#cross").toggle();
    $("#cross2").toggle();
  });
});

//scrollFunction
const scrolltop = document.querySelector("#scrolltop");
window.addEventListener("scroll", scrollFunction);

function scrollFunction() {
  if (window.pageYOffset > 300) {
    scrolltop.style.display = "block";
  } else {
    scrolltop.style.display = "none";
  }
}
scrolltop.addEventListener("click", backtotop);

function backtotop() {
  window.scrollTo(0, 0);
}