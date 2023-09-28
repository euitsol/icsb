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
                            <li><i class="fa-solid fa-calendar-days"></i>{{ date('d-M-Y', strtotime($event->event_start_time)) }}</li>
                        </ul>
                        <ul class="location-text">
                            <li><i class="fa-solid fa-map-location-dot"></i>{{$event->event_location}}</li>
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
                    @if(!empty(json_decode($event->image)))
                        @foreach (json_decode($event->image) as $image)
                            <div class="gallery-items mb-4">
                                <a class="w-100" href="{{ storage_url($image) }}" data-lightbox="gallery">
                                    <img src="{{ storage_url($image) }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!--=============================== Gallery Section ========================== -->
	{{-- <section class="gallery-section">
            <h3>{{_('Event Images')}}</h3>
            <div class="gallery-section global-gallery-section">
                <div class="gallery-content">
                    @if(!empty(json_decode($event->image)))
                        @foreach (json_decode($event->image) as $image)
                            <div class="gallery-items">
                                <a class="w-100" href="{{ storage_url($image) }}" data-lightbox="gallery">
                                    <img src="{{ storage_url($image) }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
	</section> --}}
    </div>
</section>
@endsection
