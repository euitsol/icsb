$(document).ready(function(){
    var owl = $('.owl-carousel');
        owl.owlCarousel({
            // items:6,
            loop:true,
            margin:10,
            nav: true,
            dots: false,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:3
                },
                600:{
                    items:4
                },
                800:{
                    items:5
                },
                991:{
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


    