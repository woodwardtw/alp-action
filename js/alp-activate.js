//from https://slowe.github.io/VirtualSky/


if (document.getElementById('starmap')){
	var planetarium;

//from https://slowe.github.io/VirtualSky/

	var planetarium;

	S(document).ready(function() {

		planetarium = S.virtualsky({
	    id: 'starmap',	// This should match the ID used in the DOM
	    background: 'rgb(0,49,60)',
	    projection: 'gnomic', //stereo is cooler but doesn't scroll
	    transparent: true,
	    scalestars: 2,
	    showplanetlabels: false,
	    showdate: false,
	    showposition: false,
	    cardinalpoints: false,
	    live: true,
	    height: '500px',
	    width:'100%',
	    constellations: true,
	    keyboard: false,
	    gradient: false,

		});
		
		planetarium.panTo(56.8690917,24.1053111,22000)

	});
}


//SMOOTH SCROLL ALL HASH from https://css-tricks.com/snippets/jquery/smooth-scrolling/
(function($) {
  if (!document.querSelector('.single-challenge')){//prevent running on training page

 // Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
}
   })( jQuery );