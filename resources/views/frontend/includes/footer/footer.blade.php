<footer class="footer-section">
    <div class="main-footer-section">
        <div class="container">
            <div class="footer-row flex">
                <div class="footer-column first-column">
                    <h2 class="text-center">{{ settings('site_name') }}
                    </h2>
                    <ul>
                        @if (isset($contact->location) && !empty($contact->location))
                            <li><a href="{{ route('contact_us.location_map') }}"><i
                                        class="fa-solid fa-location-dot"></i>{{ json_decode($contact->location)->{1}->address }}</a>
                            </li>
                            <div class="d-flex justify-content-evenly">
                                @if (isset(json_decode($contact->location)->{1}->phones) && !empty(json_decode($contact->location)->{1}->phones))
                                    <li>
                                        @if (json_decode($contact->location)->{1}->phones->{1}->type == 'Phone')
                                            <i class="fa-solid fa-phone"></i>
                                            +88{{ json_decode($contact->location)->{1}->phones->{1}->number }}
                                        @endif
                                    </li>
                                @endif
                                @if (isset(json_decode($contact->location)->{1}->emails) && !empty(json_decode($contact->location)->{1}->emails))
                                    <li><i class="fa-solid fa-envelope"></i>
                                        {{ strtoupper(json_decode($contact->location)->{1}->emails[0]) }}</li>
                                @endif

                            </div>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="visitor-column text-align color-white">
                <ul class="flex justify align">
                    <li>
                        <h3>Our Visitor</h3>
                    </li>
                    <li>
                        <p><i class="fa-regular fa-hand-point-right"></i>Views Today: {{ $todayVisitors }}</p>
                    </li>
                    <li class="indicator">
                        <p>|</p>
                    </li>
                    <li>
                        <p>Total Visitor: {{ $totalVisitors }}</p>
                    </li>
                </ul>
            </div>
            <div class="footer-social-column">
                <ul>
                    @if (!empty($contact->social))
                        @foreach (json_decode($contact->social) as $social)
                            <li><a href="{{ $social->link }}" target="_blank"><i class="{{ $social->icon }}"></i></a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright-section text-align">
        <div class="container">
            <p>© Copyright 2023
                {{ date('Y', strtotime(Carbon\Carbon::now())) > 2023 ? '-' . date('Y', strtotime(Carbon\Carbon::now())) : '' }}.
                All Rights Reserved | Website design & developed by <a href="https://euitsols.com/"
                    target="_blank">European IT Solutions</a></p>
        </div>
    </div>
</footer>
