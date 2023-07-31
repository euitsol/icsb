$(document).ready(function(){
    var owl = $('.cs-wide-slider');
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
        autoplay:false,
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

        var owl = $('.recent-update-slider');
        owl.owlCarousel({
            // items:6,
            loop:true,
            margin:23,
            nav: false,
            dots: true,
            autoplay:false,
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
            autoplay:false,
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

    var owl = $('.national-connection');
        owl.owlCarousel({
            // items:6,
            autoWidth:true,
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
                    items:3
                },
                800:{
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

    })



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
        speed: 20900
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




