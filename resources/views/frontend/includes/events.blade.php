
@if(count($events)>0)

    <section class="events-section">
        <div class="container">
            <div class="events-row">
                <div class="section-heading text-align">
                    <h2>Our Events</h2>
                </div>
                <div class="logo-carousel">
                    <div class="events-slider owl-carousel owl-theme">
                        @foreach ($events as $event)
                            <div class="item">
                                <div class="logo-wrapp">
                                    <h3><a href="#">{{$event->title}}</a></h3>
                                    <ul>
                                        <li><i class="fa-solid fa-calendar-check"></i> {{ date('d-M-Y', strtotime($event->event_start_time))}}</li>
                                        <li><i class="fa-solid fa-clock"></i> {{ date('H:i A', strtotime($event->event_start_time))}}</li>
                                        <li><i class="fa-solid fa-clock"></i> {{ $event->type == 1 ? "Online" : "Offline" }}</li>
                                    </ul>
                                    <div class="button">
                                        <a href="#">Enrol</a>
                                        <a href="#" class="fill-button">Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
