@extends('frontend.master')

@section('title', 'Home')
@push('css_link')
    {{-- Anmate CSS --}}
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@endpush
@section('content')
<div class="">
    <a href="{{route('member_view.job_index')}}" class="stiky-box bubble">
        <img src="{{asset('fixed_image/stiky_image.jpg')}}" alt="">
    </a>
</div>
{{-- Banner Section --}}
@include('frontend.includes.banner',['contact'=>$contact, 'banner'=>$banner,'banner_video'=>$banner_video])

 <!-- Start News Ticker Section -->
 <section class="news-ticker-section">
    <div class="full-container">
        <div class="ticker-wrapper">
            <div class="ticker-title">
                <h3>{{_('LATEST NEWS')}}</h3>
            </div>
            <div class="ticker-desc">
                <div class="scrolling-text" style="animation-duration: {{count($latest_newses)*20}}s;">
                    @foreach ($latest_newses as $news)
                        <a href="{{route('news.view',$news->slug)}}"><i class="fa-solid fa-forward mx-2 text-primary"></i>{{$news->title}}&nbsp;&nbsp;</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!----============================ Who We are Section ==========================---->
@if(isset($who_we_are) && isset(json_decode($who_we_are->saved_data)->{'background-image'}) && isset(json_decode($who_we_are->saved_data)->{'slider-images'}) && isset(json_decode($who_we_are->saved_data)->{'page-description'}))
    <section class="we-are-section big-sec-min-height" >
        <div class="container">
            <div class="section-heading wow fadeInLeftBig text-center">
                <h2 class="title-shap">{{_('Who We Are')}}</h2>
            </div>
            <div class="who_we_are_wrap" style="background-image:linear-gradient(rgb(127 227 150 / 32%), rgb(17 167 36 / 57%)), url({{storage_url(json_decode($who_we_are->saved_data)->{'background-image'})}})">
                <div class="left-col wow fadeInLeftBig">
                    @php
                        $colors=[
                            "#000000",
                            "#162B75",
                            "#E42C20",
                            "#087055",
                            "#F7BD02"
                        ];
                    @endphp

                </div>
                <div class="right-col wow fadeInRightBig"></div>
                <div class="container wrap">
                    <div class="we-are-coulmn flex">
                        <div class="content-column text-right">
                            {{-- <p>{{ stringLimit(html_entity_decode_table(json_decode($single_page->saved_data)->{'page-description'}),'800') }}</p> --}}
                            <div class="content-description wow fadeInLeftBig">{!! json_decode($who_we_are->saved_data)->{'page-description'} !!}</div>
                            {{-- <a href="{{route('sp.frontend',$single_page->frontend_slug)}}">{{_('Read More')}}</a> --}}
                        </div>
                        <div class="image-column wow fadeInRightBig">


                                @foreach (json_decode($who_we_are->saved_data)->{'slider-images'} as $key=>$image)
                                    <img class="image-border associate-image image-loop" style="display: none;" src="{{storage_url($image)}}" data-bg-color="{{ $colors[$key % count($colors)] }}" alt="" loading="lazy"/>
                                @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<!----============================ President Section ==========================---->
@if(!empty($president))
    <section class="president-section big-sec-min-height"  id="particles-js">
        <div class="container wrap">
            <div class="president-column flex">
                <div class="left-column">
                    <img src="{{getMemberImage($president->member)}}" alt="{{_('President Image')}}" loading="lazy">
                    <div class="president-info text-align color-white">
                        <a href="{{route('council_view.president')}}" class="text-white"><h3>{{$president->member->name}}</h3></a>
                        <p>{{$president->designation}}</p>
                    </div>
                </div>
                <div class="right-column">
                    <h2 class="title-shap">{{_('Message of The President')}}</h2>
                  <div>
                    {!! stringLimit($president->message,'1650') !!}
                  </div>
                   {{-- {!! $president->message !!} --}}
                <a href="{{route('council_view.president.message')}}">{{_('Read More')}}</a>
                </div>
            </div>
        </div>
    </section>
@endif
<!----============================ Includes ==========================---->
@include('frontend.includes.testimonial',['testimonials'=>$testimonials])
@include('frontend.includes.bss',['home_bsss'=>$home_bsss])
@include('frontend.includes.notice_board',['notice_cats'=>$notice_cats])
@include('frontend.includes.recent_updates',['media_rooms'=>$media_rooms])
{{-- @include('frontend.includes.endorsement') --}}
@include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss])
@include('frontend.includes.events',['events'=>$events])
{{-- @include('frontend.includes.national_awards',['national_awards'=>$national_awards]) --}}
@include('frontend.includes.recent_videos',['recent_videos'=>$recent_videos])
@include('frontend.includes.national_connection',['national_connections'=>$national_connections])


 {{-- <!-- Pop Up Modal -->
 @if(isset($pop_up) && isset(json_decode($pop_up->saved_data)->{'upload-image'}))
 <div class="modal fade pop_up_modal" id="view-modal" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <a href="{{isset(json_decode($pop_up->saved_data)->{'url'}) ? json_decode($pop_up->saved_data)->{'url'} : 'javascript:void(0)' }}"><img src="{{storage_url(json_decode($pop_up->saved_data)->{'upload-image'})}}" alt="Pop Up Notice Not Found"></a>
                <button type="button" class="close pop_up_close" data-bs-dismiss="modal" aria-label="Close" ><i class="fa-solid fa-xmark fa-beat"></i></button>
            </div>
        </div>
    </div>
</div>
@endif --}}
 <!-- Pop Up Modal -->
 @if(count($pop_ups)>0)
 <div class="modal fade pop_up_modal" id="view-modal" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div id="carouselExampleCaptions" class="carousel slide popUp" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($pop_ups as $key=>$pop_up)
                            <div class="carousel-item @if($key == 0) active @endif">
                                    <a href="{{$pop_up->url}}" class="d-block"><img style="min-height: 50vh" class="img-fluid" src="{{storage_url($pop_up->image)}}" alt="Pop Up Notice Not Found"></a>
                            </div>
                        @endforeach
                    </div>
                    @if(count($pop_ups)>1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span><i class="fa-solid fa-chevron-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <button type="button" class="close pop_up_close" data-bs-dismiss="modal" aria-label="Close" ><i class="fa-solid fa-xmark fa-beat"></i></button>
            </div>
        </div>
    </div>
</div>
@endif




@endsection
@push('js_link')
    {{-- WOW JS --}}
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>

    <script src="{{ asset('frontend/js/particles.min.js') }}"></script>
    <script src="{{ asset('frontend/js/particle-configure.js') }}"></script>
    <script src="{{ asset('frontend/js/particle-configure-nasa.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
@endpush
@push('js')
<script>
    new WOW().init();
</script>
<script>

    // $( window ).on( "load", function() {
    //     if (shouldShowModal()) {
    //         showNotificationModal();
    //     }

    //     $('.close').click(function() {
    //         hideNotificationModal();
    //     });
    // });
    $(document).ready(function() {
        if (shouldShowModal()) {
            showNotificationModal();
        }

        $('.close').click(function() {
            hideNotificationModal();
        });

        $('#carouselExampleCaptions').carousel('cycle');
    });

    function showNotificationModal() {
        $('#view-modal').modal('show');

        const now = new Date();
        localStorage.setItem('modalClosedTimestamp', now.getTime());
    }

    function hideNotificationModal() {
        $('#view-modal').modal('hide');
    }

    function shouldShowModal() {
        const closedTimestamp = localStorage.getItem('modalClosedTimestamp');
        if (!closedTimestamp) {
            return true;
        }

        const now = new Date();
        const closedTime = new Date(parseInt(closedTimestamp));
        const timeDifference = now - closedTime;

        return timeDifference >= 60 * 60 * 1000;
    }

</script>
<script>
    // Banner Video Control JS
    $(document).ready(function() {
        const video = $("#myVideo")[0];
        const volumeButton = $("#volumeButton");
        const icon = $("#icon");
        const videoProgress = $("#videoProgress");
        const playPauseButton = $("#playPauseButton"); // New play/pause button

        // Initial state: muted
        let isMuted = true;
        video.muted = isMuted;

        // Initial state: video is paused
        let isPaused = false;

        video.addEventListener("timeupdate", function() {
            const currentTime = video.currentTime;
            const duration = video.duration;

            const progress = (currentTime / duration) * 100;
            videoProgress.val(progress);
        });

        videoProgress.on("click", function(event) {
            const clickedPosition = (event.offsetX / videoProgress.width()) * video.duration;
            video.currentTime = clickedPosition;
        });

        volumeButton.on("click", function() {
            isMuted = !isMuted;
            video.muted = isMuted;

            if (isMuted) {
                icon.addClass("fa-volume-xmark").removeClass("fa-volume-high");
            } else {
                icon.removeClass("fa-volume-xmark").addClass("fa-volume-high");
            }
        });

        // Play/Pause button functionality
        playPauseButton.on("click", function() {
            if (isPaused) {
                video.play();
                playPauseButton.html('<i class="fas fa-pause"></i>');
            } else {
                video.pause();
                playPauseButton.html('<i class="fas fa-play"></i>');
            }
            isPaused = !isPaused;
        });
    });
</script>

<script>
$(document).ready(function() {
    $(".bubble").draggable({
        start: function(event, ui) {
            isdragging = false;
            // Disable transitions during dragging
            $(this).css("transition", "none");
        },
        drag: function(event, ui) {
            isdragging = true;
        },
        stop: function(event, ui) {
            var lastY = ui.position.top;
            var lastX = ui.position.left;
            var swidth = $(window).width();

            if (isdragging) {
                if (lastX > swidth / 2) {
                    $(this).css("top", lastY).css("left", (swidth - 110) + "px").css("transition", "all 0.4s");
                } else {
                    $(this).css("top", lastY).css("left", "0px").css("transition", "all 0.4s");
                }

                if(lastY < 60)
                    $(this).css("top", 60 + "px").css("transition", "all 0.4s");
            }
        }
    });

    // Add touch events for mobile devices
    $(".bubble").on("touchstart", function(e) {
        var touch = e.originalEvent.touches[0];
        var pos = $(this).position()
        isdragging = false;
        $(this).css("transition", "none");
        $(this).data("startX", touch.pageX - pos.left);
        $(this).data("startY", touch.pageY - pos.top);

    });

    $(".bubble").on("touchmove", function(e) {
        var touch = e.originalEvent.touches[0];
        var startX = $(this).data("startX");
        var startY = $(this).data("startY");
        var newX = touch.pageX - startX;
        var newY = touch.pageY - startY;
        $(this).css("top", newY + "px").css("left", newX + "px");
        isdragging = true;
    });

    $(".bubble").on("touchend", function(e) {
        if (isdragging) {
            var lastY = parseInt($(this).css("top"));
            var lastX = parseInt($(this).css("left"));
            var swidth = $(window).width();


            if (lastX > swidth / 2) {
                $(this).css("top", lastY + "px").css("left", (swidth - 110) + "px").css("transition", "all 0.4s");
            } else {
                $(this).css("top", lastY + "px").css("left", "0px").css("transition", "all 0.4s");
            }

            if(lastY < 140){
                $(this).css("top", 140 + "px").css("transition", "all 0.4s");
            }
        }
    });

    // Prevent touch events from scrolling the page
    $(".bubble").on("touchmove", function(e) {
        e.preventDefault();
    });
});
</script>

@endpush
