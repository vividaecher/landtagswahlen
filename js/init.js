
$(".navbar-toggle").on("click", function() {
  $(".hamburger-nav").toggleClass("visible");
  $(this).toggleClass("close-navigation");
  $("body").toggleClass("navigation-open");
});

$(".partei-box").on("click", function() {
  $(this).toggleClass("-aktiv");
  /*$(input[type="radio"]).attr('checked');*/
});
