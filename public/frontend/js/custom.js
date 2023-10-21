$(document).ready(function () {
    var owl = $('.cs-wide-slider');
    owl.owlCarousel({
        // items:6,
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 4
            }
        }
    });
    $('.testimonial-slider').owlCarousel({
        // items:6,
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 1
            }
        }
    });

    // $('.national-award-carousel .owl-carousel').owlCarousel({
    //     loop: true,
    //     margin: 20,
    //     nav: false,
    //     dots: true,
    //     autoplay: true,
    //     autoplayTimeout: 3000,
    //     autoplayHoverPause: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             slideBy: 1 // 1 item per swipe on screens below 600px width
    //         },
    //         600: {
    //             items: 3,
    //             slideBy: 3 // 3 items per swipe on screens between 600px and 1000px width
    //         },
    //         1000: {
    //             items: 4,
    //             slideBy: 4 // 4 items per swipe on screens wider than 1000px
    //         }
    //     }
    // })

    var owl = $('.recent-video-slider');
    owl.owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 4
            }
        }
    });

    var owl = $('.nation-slider');
    owl.owlCarousel({
        // items:6,
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            800: {
                items: 6
            }
        }
    });
    var owl = $('.about-slider');
    owl.owlCarousel({
        // items:6,
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 1
            }
        }
    });

    var owl = $('.recent-update-slider');
    owl.owlCarousel({
        // items:6,
        loop: true,
        margin: 23,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            650: {
                items: 2
            },
            989: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    var owl = $('.events-slider');
    owl.owlCarousel({
        // items:6,
        loop: true,
        margin: 25,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1368: {
                items: 4
            }
        }
    });

});
// Sticky Nav Menu
$(window).scroll(function () {
    if ($(window).scrollTop() >= 280) {
        $('.header-menu-section').addClass('fixed-header');
        $('.header-menu-section').parent().next('div').addClass('main_margin_top');
        $('.header-menu-section .stiky-logo').css('display','block');
        $('.header-menu-section .stiky-logo-right').css('display','block');
        $('.scroll_top').css('display','block');

    } else {
        $('.header-menu-section').removeClass('fixed-header');
        $('.header-menu-section').parent().next('div').removeClass('main_margin_top');
        $('.header-menu-section .stiky-logo').css('display','none');
        $('.header-menu-section .stiky-logo-right').css('display','none');
        $('.scroll_top').css('display','none');

        // $('nav div').removeClass('visible-title');
    }
});
$(document).ready(function () {
    $(".scroll_top").click(function (event) {
        event.preventDefault(); // Prevent the default behavior of the link

        // Scroll to the #main section smoothly
        $("html, body").animate({
            scrollTop: $(".top-header-section").offset().top
        }, 0); // You can adjust the duration (1000ms = 1 second) as needed
    });
});

//  Custom jQuery apply
// $(document).ready(function () {
//         $(".social-column .share-box label").click(function(){
//             $(".social-column .share-box").toggleClass("show");
//         });


//     $(".banner-section .carousel").swipe({

//         swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

//           if (direction == 'left') $(this).carousel('next');
//           if (direction == 'right') $(this).carousel('prev');

//         },
//         allowPageScroll:"vertical"

//       });


// });




$(document).ready(function () {
    // --------------- mobile menue -------
    $(".offcanvas-body .main-nav").on('click', function () {
        if($(this).parent().hasClass('active')){
            $(this).parent().toggleClass("active");
            $(this).parent().find('.icon').toggleClass('rotate');
        }else{
            $(".offcanvas-body  .main-nav").parent().removeClass("active");
            $(".offcanvas-body  .main-nav").parent().find('.icon').removeClass("rotate");

            $(".offcanvas-body .sub-nav").parent().removeClass("activea");
            $(".offcanvas-body .sub-nav").parent().find('.sub-icon').removeClass("rotate");

            $(this).parent().addClass("active");
            $(this).parent().find('.icon').addClass("rotate");
        }

    });
    $(".offcanvas-body .sub-nav").on('click', function () {
        if($(this).parent().hasClass('activea')){
            $(this).parent().toggleClass("activea");
            $(this).parent().find('.sub-icon').toggleClass('rotate');
        }else{
            $(".offcanvas-body .sub-nav").parent().removeClass("activea");
            $(".offcanvas-body .sub-nav").parent().find('.sub-icon').removeClass("rotate");
            $(this).parent().addClass("activea");
            $(this).parent().find('.sub-icon').addClass("rotate");
        }

    });
});


//  Custom jQuery apply

// BX Slider
//  Custom jQuery apply
$(document).ready(function () {
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
$(document).ready(function () {
    $('.slider').bxSlider();
});




$(document).ready(function () {
    var images = $(".image-loop");
    var borderDiv = $(".image-border");
    var currentImageIndex = 0;
    var intervalTime = 6000;

    function changeImage() {

        var bgColor = $(images[currentImageIndex]).data("bg-color");
        borderDiv.css("border-color", bgColor);

        images.hide();
        $(images[currentImageIndex]).show();

        currentImageIndex = (currentImageIndex + 1) % images.length;
    }
    changeImage();
    setInterval(changeImage, intervalTime);
});


function updateCurrentTime() {
    const currentTimeElement = document.getElementById('currentTime');
    const now = new Date();

    // Set the time zone to Bangladesh Standard Time (BST)
    now.setUTCHours(now.getUTCHours());

    const options = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
    const formattedTime = now.toLocaleTimeString('en-US', options);
    currentTimeElement.textContent = `Current Time: ${formattedTime} (BST)`;
}


$(document).ready(function () {
    updateCurrentTime();
    setInterval(updateCurrentTime, 1000);

});

