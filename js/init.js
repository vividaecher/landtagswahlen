
$( ".navbar-toggle" ).on ( "click", function(i) {
  i.preventDefault();
  $( this ).toggleClass( "-clicked");
  $( ".hamburger-nav" ).toggleClass( "-open" );
});
