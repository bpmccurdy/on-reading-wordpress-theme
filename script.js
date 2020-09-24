
/**
 * makes the combined navbar show up when scrolled down the page
 */ 

(function ($) {
  $(document).ready(function(){
    
	// hide .navbar first
	$(".navbar-combined").hide();
	
	// fade in .navbar
	$(function () {
		$(window).scroll(function () {
            // set distance user needs to scroll before we fadeIn navbar
			if ($(this).scrollTop() > 100) {
				$('.navbar-combined').fadeIn();
			} else {
				$('.navbar-combined').fadeOut();
			}
		});

	
	});

  });
}(jQuery));




(function ($) {
	$('.slider').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
	
	

}(jQuery))
