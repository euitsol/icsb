@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/event.jpg');
$title = 'Our Events';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Our Events',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="our-events-section big-sec-min-height d-flex align-items-center">
    <div class="container">
        <div class="events-row flex">
            @foreach ($events as $event)
                <div class="item">
                    <div class="logo-wrapp">
                        <h3><a href="#">{{$event->title}}</a></h3>
                        <ul class="flex">
                            <li><i class="fa-solid fa-calendar-check"></i> {{ date('d-M-Y', strtotime($event->event_start_time))}}</li>
                            <li><i class="fa-solid fa-clock"></i> {{ date('H:i A', strtotime($event->event_start_time))}}</li>
                            <li><i class="fa-solid fa-clock"></i> {{ $event->type == 1 ? "Online" : "Offline" }}</li>
                        </ul>
                        <div class="button">
                            <a href="{{route('event_view.view',$event->slug)}}" class="fill-button">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="more-event-button text-align">
            <a href="#">See More Events</a>
        </div>
    </div>
</section>
@endsection
