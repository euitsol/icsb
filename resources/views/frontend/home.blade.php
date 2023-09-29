@extends('frontend.master')

@section('title', 'Home')
@push('css_link')
    {{-- Anmate CSS --}}
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
@endpush
@section('content')
<a href="javascript:voide(0)" class="scroll_top"><i class="fa-solid fa-circle-up fa-bounce"></i></i></a>
<div class="">
    <a href="{{route('member_view.corporate_leader')}}" class="stiky-box ">
        <img src="{{asset('fixed_image/fixed.jpg')}}" alt="">
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
                <ul class="bxnewsticker">
                    @foreach ($latest_newses as $news)
                        <li><a href="{{route('news.view',$news->slug)}}">{{$news->title}}</a></li>
                    @endforeach
                </ul>
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
                                    <img class="image-border associate-image image-loop" style="display: none;" src="{{storage_url($image)}}" data-bg-color="{{ $colors[$key % count($colors)] }}" alt="" />
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
    <section class="president-section big-sec-height"  id="particles-js">
        <div class="container wrap">
            <div class="president-column flex">
                <div class="left-column">
                    <img src="{{getMemberImage($president->member)}}" alt="{{_('President Image')}}">
                    <div class="president-info text-align color-white">
                        <a href="{{route('council_view.president')}}" class="text-white"><h3>{{$president->member->name}}</h3></a>
                        <p>{{$president->designation}}</p>
                    </div>
                </div>
                <div class="right-column">
                    <h2 class="title-shap">{{_('Message of The President')}}</h2>
                   <p> {!! stringLimit($president->message,'1650') !!}</p>
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


 <!-- Pop Up Modal -->
 @if(isset($pop_up) && isset(json_decode($pop_up->saved_data)->{'upload-image'}))
 <div class="modal fade pop_up_modal" id="view-modal" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <img src="{{storage_url(json_decode($pop_up->saved_data)->{'upload-image'})}}" alt="Pop Up Notice Not Found">
                <button type="button" class="close pop_up_close" data-bs-dismiss="modal" aria-label="Close" ><i class="fa-solid fa-xmark fa-beat"></i></button>
            </div>
        </div>
    </div>
</div>
@endif
 <!-- Google Search Modal -->
 <div class="modal fade pop_up_modal" id="gs-modal" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="gcse-search"></div>
            </div>
        </div>
    </div>
</div>



@endsection
@push('js_link')
    {{-- WOW JS --}}
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>

    <script src="{{ asset('frontend/js/particles.min.js') }}"></script>
    <script src="{{ asset('frontend/js/particle-configure.js') }}"></script>
@endpush
@push('js')
<script>
   $(document).ready(function() {
        $('.search_button').on("click", function() {
            $('#gs-modal').modal('show');
        });
    });
</script>
<script>
    new WOW().init();
</script>
<script>
    $(document).ready(function() {
        $('#view-modal').modal('show');
    });

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

@endpush
