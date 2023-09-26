
@if(count($events)>0)

    <section class="events-section big-sec-min-height">
        <div class="container">
            <div class="events-row">
                <div class="section-heading text-align wow fadeInRightBig">
                    <h2 class="title-shap">{{_('Upcomming Events')}}</h2>
                </div>
                <div class="logo-carousel">
                    <div class="events-slider owl-carousel owl-theme wow fadeInDownBig">
                        @foreach ($events as $event)
                            <div class="item">
                                <div class="logo_image">
                                    <img src="{{asset('frontend/img/calender.svg')}}" alt="{{$event->title}}">
                                    <h3 class="month">{{ date('M', strtotime($event->event_start_time))}}</h3>
                                    <h3 class="date">{{ date('d', strtotime($event->event_start_time))}}</h3>
                                </div>
                                <div class="logo-wrapp">

                                    <h3><a href="{{route('event_view.view',$event->slug)}}">{{$event->title}}</a></h3>
                                    <ul>
                                        <li><i class="fa-solid fa-calendar-check"></i> {{ date('d-M-Y', strtotime($event->event_start_time))}}</li>
                                        <li><i class="fa-solid fa-clock"></i> {{ date('H:i A', strtotime($event->event_start_time))}}</li>
                                        <li><i class="fa-solid fa-clock"></i> {{ $event->type == 1 ? "Online" : "Offline" }}</li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('event_view.view',$event->slug)}}" class="fill-button">{{_('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="see-button text-align d-block wow fadeInLeftBig">
                    <a href="{{route('event_view.all')}}">See All Events</a>
                </div>
            </div>
        </div>
    </section>
@endif
