@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/Event-Management-Proposal.jpg')}}" alt="All Events">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
            <div class="left-column content-column">
                <div class="inner-column color-white">
                    <h1 class="breadcrumbs-heading">Our All Events</h1>
                    <ul class="flex">
                        <li><a href="index">Home</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="#">Event</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><p>Our Events</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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
