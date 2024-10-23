(function ($) {

	"use strict";



/*=============================================

	=    		 Preloader			      =

=============================================*/

function preloader() {

	$('.preloader').delay(0).fadeOut();

};



$(window).on('load', function () {

	preloader();

	 

});











   

/*=============================================

	=    		Mobile Menu			      =

=============================================*/

//SubMenu Dropdown Toggle

if ($('.menu-area li.menu-item-has-children ul').length) {

	$('.menu-area .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');



    }



    // Select Town

    $('#location').select2({

        placeholder: "Location",

        allowClear: true

    });

    // Select Property Types

    $('#ptypes').select2({

        placeholder: "Property Types",

        allowClear: true

    });

    // Select Property price

    $('#price').select2({

        placeholder: "Price Range",

        allowClear: true

    });

    // Select Property price

    $('#Bedrooms').select2({

        placeholder: "Bed Rooms",

        allowClear: true

    });

    // Select Property price

    $('#Bathrooms').select2({

        placeholder: "Bathrooms",

        allowClear: true

    });



    if ($('.services-carousel .image-carousel').length && $('.services-carousel .thumbs-carousel').length) {

        var $sync1 = $(".services-carousel .image-carousel"),

            $sync2 = $(".services-carousel .thumbs-carousel"),

            flag = false,

            duration = 500;

        $sync1.owlCarousel({

            loop: true,

            items: 1,

            rtl:true,

            margin: 0,

            nav: false,

            navText: ['<span class="icon icon-chevron-left"></span>', '<span class="icon icon-chevron-right"></span>'],

            dots: false,

            autoplay: true,

            autoplayTimeout: 5000

        }).on('changed.owl.carousel', function (e) {

            if (!flag) {

                flag = false;

                $sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);

                flag = false;

            }

        });

        $sync2.owlCarousel({

            loop: true,

            margin: 10,

            items: 1,

            nav: true,

            navText: ['<span class="icon icon-chevron-left"></span>', '<span class="icon icon-chevron-right"></span>'],

            dots: false,

            center: false,

            autoplay: true,

            autoplayTimeout: 5000,

            responsive: {

                0: {

                    items: 1,

                    autoWidth: false

                },

                400: {

                    items: 1,

                    autoWidth: false

                },

                600: {

                    items: 1,

                    autoWidth: false

                },

                900: {

                    items: 1,

                    autoWidth: false

                },

                1000: {

                    items: 1,

                    autoWidth: false

                }

            },

        }).on('click', '.owl-item', function () {

            $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

        }).on('changed.owl.carousel', function (e) {

            if (!flag) {

                flag = true;

                $sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);

                flag = false;

            }

        });

    } 

    

  // Blog Slider

  $('.blog-slider').owlCarousel({

    items: 1,

    loop: true,

    margin: 20,

    rtl: true,

    nav: false,

    autoplay: true,

    autoplayHoverPause: true,

    dots: false,

    responsive: {

        0: {

            items: 1,

        },

        600: {

            items: 2,

        },

        1000: {

            items: 3,

        }

    }

})

//Mobile Nav Hide Show

if ($('.mobile-menu').length) {



	var mobileMenuContent = $('.menu-area .main-menu').html();

	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);



	//Dropdown Button

	$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function () {

		$(this).toggleClass('open');

		$(this).prev('ul').slideToggle(500);

	});

	//Menu Toggle Btn

	$('.mobile-nav-toggler').on('click', function () {

		$('body').addClass('mobile-menu-visible');

	});



	//Menu Toggle Btn

	$('.menu-backdrop, .mobile-menu .close-btn').on('click', function () {

		$('body').removeClass('mobile-menu-visible');

	});

    }



    $('.socialclick').on('click', function () {

        $('.header-top-right').toggle(1000);

    });





    $('.click-two-header').on('click', function () {

        $('.show-two-header').toggle(1000);

    });

    $('.close-two').on('click', function () {

        $('.show-two-header').hide(1000);

    });





    $('.click-three-header').on('click', function () {

        $('.show-three-header').toggle(1000);

    });

    $('.close-three').on('click', function () {

        $('.show-three-header').hide(1000);

    });

    $('.click-four-header').on('click', function () {

        $('.show-four-header').toggle(1000);

    });

    $('.close-four').on('click', function () {

        $('.show-four-header').hide(1000);

    });





    //let url = window.location.href;

    //$('.navigation li a').each(function () {

    //    if (this.href === url) {

    //        $(this).closest('li').addClass('active');

    //    }

    //})

    /*=============================================

	=     Background Data Images     =

=============================================*/

    var list = document.querySelectorAll("div[data-image]");



    for (var i = 0; i < list.length; i++) {

        var url = list[i].getAttribute('data-image');

        list[i].style.backgroundImage = "url('" + url + "')";

    }

/*=============================================

	=     Menu sticky & Scroll to top      =

=============================================*/

$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 100) {
		$(".header-one").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');
	} else {
		$(".header-one").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
	}
});





/*=============================================

	=    		 Scroll Up  	         =

=============================================*/

if ($('.scroll-to-target').length) {

  $(".scroll-to-target").on('click', function () {

    var target = $(this).attr('data-target');

    // animate

    $('html, body').animate({

      scrollTop: $(target).offset().top

    }, 1000);



  });

}

    

    var swiper = new Swiper(".mySwiper", {

        pagination: '.swiper-pagination',

        paginationClickable: true,

        nextButton: '.swiper-button-next',

        prevButton: '.swiper-button-prev',

        spaceBetween: 0,

        parallax: true,

        autoplay: {

            delay: 5000,

          },

        speed: 800,

        autoplayDisableOnInteraction: false,

        navigation: {

            nextEl: ".swiper-button-next",

            prevEl: ".swiper-button-prev",

        },

        

    });

/*=============================================

	=           Data Background             =

=============================================*/

$("[data-background]").each(function () {

	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")

})



$(".team_slider").owlCarousel({

    loop: !0,

    margin: 30,

    dots: !1,

    nav: !0,

    rtl: !0,

    autoplayHoverPause: !1,

    autoplay: {

        delay: 5000,

      },

    singleItem: !0,

    smartSpeed: 1200,

    navText: ['<i class="fa fa-arrow-left" aria-hidden="true"></i>', '<i class="fa fa-arrow-right" aria-hidden="true"></i>'],

    responsive: {

        0: {

            items: 1,

            center: !1

        },

        480: {

            items: 1,

            center: !1

        },

        520: {

            items: 2,

            center: !1

        },

        600: {

            items: 2,

            center: !1

        },

        768: {

            items: 2

        },

        992: {

            items: 3

        },

        1200: {

            items: 4

        },

        1366: {

            items: 4

        },

        1400: {

            items: 4

        }

    }

})

/*=============================================

	=    		Button Effect  	         =

=============================================*/

$('.btn').on('mouseenter', function (e) {

	var parentOffset = $(this).offset(),

		relX = e.pageX - parentOffset.left,

		relY = e.pageY - parentOffset.top;

	$(this).find('span').css({ top: relY, left: relX })

}).on('mouseout', function (e) {

	var parentOffset = $(this).offset(),

		relX = e.pageX - parentOffset.left,

		relY = e.pageY - parentOffset.top;

	$(this).find('span').css({ top: relY, left: relX })

});



    /*=============================================

	=    		VideoPlay 	         =

=============================================*/

    $('.popup-youtube').magnificPopup({

        type: 'iframe'

    });

    $('.image-popup-vertical-fit').magnificPopup({

        type: 'image',

        mainClass: 'mfp-with-zoom',

        gallery: {

            enabled: true

        },



        zoom: {

            enabled: true,



            duration: 300, // duration of the effect, in milliseconds

            easing: 'ease-in-out', // CSS transition easing function



            opener: function (openerElement) {



                return openerElement.is('img') ? openerElement : openerElement.find('img');

            }

        }



    });

/*=============================================

	=    		testmonial-4 	         =

=============================================*/

    $('.owl-demo-test-4').owlCarousel({

        loop: true,

        autoplay: true,

        autoPlaySpeed: 5000,

        autoplayTimeout: 5000,

        autoplayHoverPause: false,

        margin: 15,

        responsiveClass: true,

        navText: ["<img src='./images/left-arrow-small.png'/>", "<img src='./images/right-arrow-small.png'/>"],

        responsive: {

            0: {

                items: 1,

                nav: true

            },

            600: {

                items: 2,

                nav: false

            },

            1000: {

                items: 4,

                autoplay: false,

                autoplayHoverPause: false,

                nav: true,

                dots: false,

                loop: true

            }

        }

    })

    $('.owl-demo-test-3').owlCarousel({

        loop: true,

        autoplay: true,

        autoPlaySpeed: 5000,

        autoplayTimeout: 5000,

        autoplayHoverPause: false,

        margin: 15,

        responsiveClass: true,

        navText: ["<img src='./images/left-arrow-small.png'/>", "<img src='./images/right-arrow-small.png'/>"],

        responsive: {

            0: {

                items: 1,

                nav: true

            },

            600: {

                items: 2,

                nav: false

            },

            1000: {

                items: 3,

                autoplay: false,

                autoplayHoverPause: false,

                nav: true,

                dots: false,

                loop: true

            }

        }

    })

    $('.owl-demo5').owlCarousel({

        loop: true,

        autoplay: true,

        autoPlaySpeed: 5000,

        autoplayTimeout: 5000,

        autoplayHoverPause: false,

        margin: 25,

        responsiveClass: true,

        navText: ["<img src='./images/left-arrow-small.png'/>", "<img src='./images/right-arrow-small.png'/>"],

        responsive: {

            0: {

                items: 1,

                nav: true

            },

            600: {

                items: 2,

                nav: false

            },

            1000: {

                items: 4,

                autoplay: false,

                autoplayHoverPause: false,

                nav: true,

                dots: false,

                loop: true

            }

        }

    })

    /*=============================================

	=    		testmonial-2 	         =

=============================================*/

    $('.owl-demo2').owlCarousel({

        loop: true,

        autoplay: true,

        autoPlaySpeed: 5000,

        autoplayTimeout: 5000,

        autoplayHoverPause: false,

        margin: 25,

        responsiveClass: true,

        navText: ["<img src='./images/left-arrow-small.png'/>", "<img src='./images/right-arrow-small.png'/>"],

        responsive: {

            0: {

                items: 1,

                nav: true

            },

            600: {

                items: 1,

                nav: false

            },

            1000: {

                items: 2,

                autoplay: true,

                autoplayHoverPause: false,

                nav: true,

                dots: false,

                loop: true

            }

        }

    })





        /*=============================================

	=    		FAQ 	         =

=============================================*/

    $(".set > a").on("click", function () {

        if ($(this).hasClass("active")) {

            $(this).removeClass("active");

            $(this)

                .siblings(".content")

                .slideUp(200);

            $(".set > a i")

                .removeClass("fa-minus")

                .addClass("fa-plus");

        } else {

            $(".set > a i")

                .removeClass("fa-minus")

                .addClass("fa-plus");

            $(this)

                .find("i")

                .removeClass("fa-plus")

                .addClass("fa-minus");

            $(".set > a").removeClass("active");

            $(this).addClass("active");

            $(".content").slideUp(200);

            $(this)

                .siblings(".content")

                .slideDown(200);

        }

    })



})(jQuery);