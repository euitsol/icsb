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
@include('frontend.includes.banner',['contact'=>$contact, 'banner'=>$banner])

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
                        <li><a href="#">{{$news->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!----============================ Who We are Section ==========================---->
@if(isset(json_decode($who_we_are->saved_data)->{'background-image'}) && isset(json_decode($who_we_are->saved_data)->{'slider-images'}) && isset(json_decode($who_we_are->saved_data)->{'page-description'}))
    <section class="we-are-section big-sec-min-height" >
        <div class="container">
            <div class="section-heading wow fadeInLeftBig text-center">
                <h2 class="title-shap">{{_('Who We Are')}}</h2>
            </div>
            <div class="who_we_are_wrap" style="background-image:linear-gradient(rgb(51 232 243), rgb(17 167 36 / 57%)), url({{storage_url(json_decode($who_we_are->saved_data)->{'background-image'})}})">
                <div class="left-col wow fadeInLeftBig">
                    @php
                        $colors=[
                            "#88BF85",
                            "#C78282",
                            "#B1B9BD",
                            "#CFC6BD",
                            "#8A9FB0"
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

                                <div class="border"></div>
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
    <section class="president-section big-sec-height">
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
                   <p> {{ stringLimit(html_entity_decode_table($president->message),'1250') }}</p>
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
 @if(isset(json_decode($pop_up->saved_data)->{'upload-image'}))
 <div class="modal fade pop_up_modal" id="view-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <img src="{{storage_url(json_decode($pop_up->saved_data)->{'upload-image'})}}" alt="Pop Up Notice Not Found">
                <button type="button" class="btn text-danger pop_up_close" data-bs-dismiss="modal" ><i class="fa-solid fa-xmark fa-beat"></i></button>
            </div>
        </div>
    </div>
</div>
@endif



@endsection
@push('js_link')
    {{-- WOW JS --}}
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
@endpush
@push('js')
<script>
    new WOW().init();
</script>
<script>
    $(document).ready(function() {

            // let id = $(this).data('member-id');
            // let _url = ("{{ route('m.info', ['member_id']) }}");
            // let __url = _url.replace('member_id', id);
            // $.ajax({
            //     url: __url,
            //     method: 'GET',
            //     dataType: 'json',
            //     success: function(data) {
            //         var noImage = '{{asset("no_img/no_img.jpg")}}';
            //         var image = `{{ storage_url('${data.member.image}') }}`;
            //         var details = `{!! '${data.member.details}' !!}`;
            //         var member_image = data.member.image ? image : noImage;
            //         var memberData = `
            //                         <div class="fellow-items flex w-100">
            //                             <div class="image-column">
            //                                 <img src="${member_image}" alt="">
            //                             </div>
            //                             <div class="content-column">
            //                                 <h4>Member ID: ${data.member_id}</h4>
            //                                 <h3 class="mb-0">${data.member.name}</h3>
            //                                 <p><strong>${data.member.designation}</strong></p>
            //                                 <li><i class="fa-solid fa-house-circle-exclamation"></i>${data.member.address}</li>
            //                                 <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:${data.member.email}">${data.member.email}</a></li>
            //                             </div>
            //                         </div>
            //                         <div class="details">
            //                             ${details}
            //                         </div>

            //                         `;
            //         $('#member_data').html(memberData);
            //         $('#view-modal').modal('show');
            //     },
            //     error: function(xhr, status, error) {
            //         console.error('Error fetching member data:', error);
            //     }
            // });
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
