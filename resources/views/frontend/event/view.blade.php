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
                    <x-embed url="{{$event->video_url}}" />
                    <ul>
                        <li><span>{{_('Total Participants:')}}</span> {{$event->total_participant}} {{_('People')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--=============================== Gallery Section ========================== -->
	<section class="gallery-section">
            <h3>{{_('Event Images')}}</h3>
			{{-- <div class="gallery-content">
                @if(!empty(json_decode($event->image)))
                        @foreach (json_decode($event->image) as $image)
                            <div class="gallery-items">
                                <a href=""><img src="{{storage_url($image)}}" width=""></a>
                            </div>
                        @endforeach
                    @endif

			</div> --}}
            <div class="gallery-section global-gallery-section">
                <div class="gallery-content">
                    @if(!empty(json_decode($event->image)))
                        @foreach (json_decode($event->image) as $image)
                            <div class="gallery-items">
                                <a href="{{ storage_url($image) }}" data-lightbox="gallery">
                                    <img src="{{ storage_url($image) }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
	</section>
    </div>
</section>
@endsection
