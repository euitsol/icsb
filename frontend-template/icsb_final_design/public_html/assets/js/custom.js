$(document).ready(function(){
    var owl = $('.cs-wide-slider');
        owl.owlCarousel({
            // items:6,
            loop:false,
            margin:20,
            nav: true,
            dots: false,
            autoplay:false,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:4
                }
            }
    });
    var owl = $('.nation-slider');
    owl.owlCarousel({
        // items:6,
        loop:true,
        margin:20,
        nav: true,
        dots: false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            800:{
                items:7
            }
        }
});
var owl = $('.about-slider');
owl.owlCarousel({
    // items:6,
    loop:true,
    margin:0,
    nav: false,
    dots: false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        800:{
            items:1
        }
    }
});

        var owl = $('.recent-update-slider');
        owl.owlCarousel({
            // items:6,
            loop:true,
            margin:23,
            nav: false,
            dots: true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                650:{
                    items:2
                },
                989:{
                    items: 3
                },
                1200:{
                    items:4
                }
            }
    });

    var owl = $('.events-slider');
        owl.owlCarousel({
            // items:6,
            loop:true,
            margin:25,
            nav: false,
            dots: true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:2
                },
                1368:{
                    items:3
                }
            }
    });

  });
// Sticky Nav Menu

    $(window).scroll(function(){
        if ($(window).scrollTop() >= 300) {
            $('.header-menu-section').addClass('fixed-header');
            // $('nav div').addClass('visible-title');
        }
        else {
            $('.header-menu-section').removeClass('fixed-header');
            // $('nav div').removeClass('visible-title');
        }
    });

//  Custom jQuery apply
    $(document).ready(function(){
    //     $(".social-column .share-box label").click(function(){
    //         $(".social-column .share-box").toggleClass("show");
    //     });


    // $(".banner-section .carousel").swipe({

    //     swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    //       if (direction == 'left') $(this).carousel('next');
    //       if (direction == 'right') $(this).carousel('prev');

    //     },
    //     allowPageScroll:"vertical"

    //   });


    });


    

    $(document).ready(function(){

    $("section .menu-bar ul li").on('click', function(){
            // Check if the clicked item already has the "active" class
            if ($(this).hasClass("active")) {
                // If it has the "active" class, remove it to hide the active state
                $(this).removeClass("active");
            } else {
                // If it doesn't have the "active" class, proceed as before to remove the "active" class from other items and add it to the clicked item
                $("section .menu-bar ul li").removeClass("active");
                $(this).addClass("active");
            }
        });


        $("section .menu-bar ul li ul li").on('click', function(){
            // Check if the clicked item already has the "active" class
            if ($(this).hasClass("activea")) {
                // If it has the "active" class, remove it to hide the active state
                $(this).removeClass("activea");
            } else {
                // If it doesn't have the "active" class, proceed as before to remove the "active" class from other items and add it to the clicked item
                $("section .menu-bar ul li ul li").removeClass("activea");
                $(this).addClass("activea");
            }
        });
 
        
        
    //     $("section .menu-bar ul li ").on('click',function(){
    //         $("section .menu-bar ul li").removeClass("active");
    //         $(this).toggleClass("active");
    //     });


        // $("section .menu-bar ul li ul li").on('click',function(){
        //     $("section .menu-bar ul li ul li").removeClass("activea");
        //     $(this).addClass("activea");
        // });

        // --------------- mobile menue -------
        $(".offcanvas-body ul li").on('click',function(){
            $(".offcanvas-body ul li").removeClass("active");
            $(this).addClass("active");
        });


        $(".offcanvas-body ul li ul li").on('click',function(){
        $(".offcanvas-body ul li ul li").removeClass("activea");
        $(this).addClass("activea");
        });



    });


//  Custom jQuery apply

    // BX Slider
//  Custom jQuery apply
    $(document).ready(function(){
        $(".slider2").bxSlider();
    });
    //     $(".social-column .share-box label").click(function(){
    //         $(".social-column .share-box").toggleClass("show");
    //     });

    $('.bxnewsticker').bxSlider({
        minSlides: 1,
        maxSlides: 1,
        // slideWidth: 170,
        slideMargin: 10,
        ticker: true,
        speed: 20900,
        tickerHover: true
      });


    // Social media link active class
    // Get all the anchor tags inside the social-link-wrapper
    // const socialLinks = document.querySelectorAll(".social-link-wrapper a");
    // // Add click event listener to each anchor tag
    // socialLinks.forEach(link => {
    //     link.addEventListener("click", (event) => {
    //         // event.preventDefault(); // Prevent the default link behavior

    //         // Remove active class from the currently active li element
    //         const currentlyActive = document.querySelector(".social-link-wrapper li.active");
    //         if (currentlyActive) {
    //             currentlyActive.classList.remove("active");
    //         }

    //         // Add active class to the parent li element of the clicked anchor tag
    //         link.parentElement.classList.add("active");
    //     });
    // });
    // $(".banner-section .carousel").swipe({

    // Social media link active class
    // Get all the anchor tags inside the social-link-wrapper
    const noticebar = document.querySelectorAll(".notice-wrapper ul a");
    // Add click event listener to each anchor tag
    noticebar.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent the default link behavior

            // Remove active class from the currently active li element
            const currentlyActive = document.querySelector(".notice-wrapper ul li.active");
            if (currentlyActive) {
                currentlyActive.classList.remove("active");
            }
    //     swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

            // Add active class to the parent li element of the clicked anchor tag
            link.parentElement.classList.add("active");
        });
    });
    //       if (direction == 'left') $(this).carousel('next');
    //       if (direction == 'right') $(this).carousel('prev');

    //     },
    //     allowPageScroll:"vertical"

    //   });



    // BX Slider
    $(document).ready(function(){
        $('.slider').bxSlider();
    });








