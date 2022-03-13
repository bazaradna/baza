(function($){
	"use strict"; 
	

    // Mobile Menu
    $('.newspotrika_navbar').meanmenu({
         meanScreenWidth: "769",
         meanMenuContainer: '.mobile_menu'
    });

    // Banner
    $('.banner .col-sm-3:lt(3)').removeClass("col-sm-3").addClass("col-sm-4");

    // Block Carousel
    $('.block-carousel ').slick({
        slidesToScroll: 2,
        speed: 2000,
        autoplay: true,
        arrows: false,
        slidesToShow: 4,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
    });

	
})(jQuery);