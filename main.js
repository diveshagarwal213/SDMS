//topics button
$(function(){
  var tb = $("<button></button>").attr("id", "tb").text("Topics");
  $(".topic").prepend(tb);
});
$(function () {
  $("#tb").click(function () {
    $(".unitcontent").slideToggle(600);
  });
});
$(function () {
  $(".topiclink").click(function () {
    $(".ytcont").slideToggle(600);
  });
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