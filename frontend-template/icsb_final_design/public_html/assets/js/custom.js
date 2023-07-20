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
                    items:3
                }
            }
    });

    var owl = $('.national-connection');
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
                    items:3
                },
                800:{
                    items:6
                }
            }
    });

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

    // BX Slider
    $(document).ready(function(){
        $('.slider').bxSlider();
    });




