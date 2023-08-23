@extends('frontend.master')

@section('title', 'Home')
@push('css')
<style>
</style>
@endpush
@section('content')
{{-- Banner Section --}}
@include('frontend.includes.banner',['contact'=>$contact, 'banner'=>$banner])

 <!-- Start News Ticker Section -->
 <section class="news-ticker-section">
    <div class="full-container">
        <div class="ticker-wrapper">
            <div class="ticker-title">
                <h3>LATEST NEWS</h3>
            </div>
            <div class="ticker-desc">
                <ul class="bxnewsticker">
                    <li><a href="#">বাংলাদেশ ব্যাংক কর্তৃক তালিকাভুক্তির জন্য সিএ ফার্মের আবেদনের সময়সীমা ২৮ ডিসেম্বর ২০২২ ইং পর্যন্ত নির্ধারণ</a></li>
                    <li><a href="#">Notice & Students' Enrolment Form: Online Evening Shift Regular Classes for Professional & Ad</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!----============================ Who We are Section ==========================---->
@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'front-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
    <section class="we-are-section big-sec-height">
        <div class="left-col">
            <img src="{{asset('frontend/img/we-are/Image-3.png')}}" />
        </div>
        <div class="right-col"></div>
        <div class="container">
            <div class="we-are-coulmn flex">
                <div class="content-column text-right">
                    <div class="section-heading">
                        <h2 class="title-shap">{{_('Who We Are')}}</h2>
                    </div>
                    <p>{{ stringLimit(html_entity_decode_table(json_decode($single_page->saved_data)->{'page-description'}),'800') }}</p>
                    <a href="{{route('sp.frontend',$single_page->frontend_slug)}}">{{_('Read More')}}</a>
                </div>
                <div class="image-column">
                    <div class="border"></div>
                    <img src="{{storage_url(json_decode($single_page->saved_data)->{'front-image'})}}" alt="{{$single_page->title}}" />
                </div>
            </div>
        </div>
    </section>
@endif

<!----============================ President Section ==========================---->
@if(!empty($president))
    <section class="president-section big-sec-height">
        <div class="container">
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
                   <p> {{ stringLimit(html_entity_decode_table($president->message),'520') }}</p>
                    <a href="{{route('council_view.president.message')}}">{{_('Read More')}}</a>
                </div>
            </div>
        </div>
    </section>
@endif
<!----============================ BSS Secretarial Section ==========================---->
@include('frontend.includes.bss',['home_bsss'=>$home_bsss])

<!----============================ Notices Section ==========================---->
<section class="notice-section big-sec-height">
    <div class="container">
        <div class="notice-row">
            <div class="section-heading text-align">
                <h2 class="title-shap">Notice Board</h2>
            </div>
            <div class="notice-board-wrapper">
                <div class="left-column notice-details-col">
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-column notice-title-col">
                    <div class="notice-wrapper">
                        <div class="title-box">
                            <h4>Categories</h4>
                            <ul>
                                <li class="active"><a href="#">All</a></li>
                                <li><a href="#">Member</a></li>
                                <li><a href="#">Student</a></li>
                                <li><a href="#">Others</a></li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="transparent-button" href="#">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.includes.recent_updates',['media_rooms'=>$media_rooms])
@include('frontend.includes.endorsement')
@include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss])
@include('frontend.includes.events',['events'=>$events])
@include('frontend.includes.national_awards',['national_awards'=>$national_awards])
@include('frontend.includes.recent_videos',['recent_videos'=>$recent_videos])
@include('frontend.includes.national_connection',['national_connections'=>$national_connections])
@endsection
@push('js')
<script>
    // Banner Video Control JS
    $(document).ready(function() {
        const video = $("#myVideo")[0];
        const volumeButton = $("#volumeButton");
        const icon = $("#icon");
        const videoProgress = $("#videoProgress");

        // Initial state: muted
        let isMuted = true;
        video.muted = isMuted;

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
    });
</script>

@endpush
