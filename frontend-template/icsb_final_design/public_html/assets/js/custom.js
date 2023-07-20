$(document).ready(function(){
    var owl = $('.cs-wide-slider');
        owl.owlCarousel({
            // items:6,
            loop:true,
            margin:20,
            nav: true,
            dots: true,
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
                600:{
                    items:1
                },
                800:{
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

    // BX Slider
    $(document).ready(function(){
        $(".slider2").bxSlider();
    });

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
    const socialLinks = document.querySelectorAll(".social-link-wrapper a");
    // Add click event listener to each anchor tag
    socialLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent the default link behavior

            // Remove active class from the currently active li element
            const currentlyActive = document.querySelector(".social-link-wrapper li.active");
            if (currentlyActive) {
                currentlyActive.classList.remove("active");
            }

            // Add active class to the parent li element of the clicked anchor tag
            link.parentElement.classList.add("active");
        });
    });

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

            // Add active class to the parent li element of the clicked anchor tag
            link.parentElement.classList.add("active");
        });
    });







