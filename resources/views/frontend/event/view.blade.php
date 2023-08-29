@extends('frontend.master')

@section('title', 'Members')

@section('content')
@php
$banner_image = asset('breadcumb_img/event.jpg');
$title = 'Events Details';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'event_view.all'=>'Our Events',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="jobsingle-content-section" id="event-detiles-section">
    <div class="container">
        <div class="content-row flex">
            <div class="content-column">
                <div class="event-info-section">
                    <div class="info-row">
                        <h2>{{$event->title}}</h2>
                        <ul class="flex">
                            <li><i class="fa-solid fa-calendar-days"></i>{{ formatDateTimeRange($event->event_start_time, $event->event_end_time)}}</li>
                            <li><i class="fa-solid fa-briefcase"></i>Cantonese</li>
                        </ul>
                        <ul class="location-text">
                            <li><i class="fa-solid fa-map-location-dot"></i>{{$event->event_location}}</li>
                            <li><i class="fa-solid fa-users-line"></i>HKCGI Member, Graduate, Student, Affiliated Person & Non-Member</li>
                        </ul>
                    </div>
                </div>
                <div class="speaker-info">
                    <div class="event-description content-description">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
            <div class="summary-column" id="event-summary">
                <div class="job-summery">
                    {!! getYoutubeVideoIframe($event->video_url) !!}
                    <ul>
                        <li><span>Total Participants:</span> {{$event->total_participant}} {{_('People')}}</li>
                    </ul>
                </div>
                <h3>Get Location</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.050621451953!2d90.39431318612283!3d23.745574179751582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8967169ead3%3A0xf0167ae0ec63f58a!2sInstitute%20of%20Chartered%20Secretaries%20of%20Bangladesh%20(ICSB)!5e0!3m2!1sen!2sie!4v1689596152282!5m2!1sen!2sie" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!--=============================== Gallery Section ========================== -->
	<section class="gallery-section">
            <h3>Event Images</h3>
			<div class="gallery-content">
                @if(!empty(json_decode($event->image)))
                        @foreach (json_decode($event->image) as $image)
                            <div class="gallery-items">
                                <a href=""><img src="{{storage_url($image)}}"></a>
                            </div>
                        @endforeach
                    @endif

			</div>
	</section>
    </div>
</section>
@endsection
