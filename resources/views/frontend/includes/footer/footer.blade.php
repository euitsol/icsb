<footer class="footer-section">
	<div class="main-footer-section">
		<div class="container">
			<div class="footer-row flex">
				<div class="footer-column first-column">
					<h2><a href="{{route('home')}}">{{settings('site_name')}} ({{settings('site_short_name')}})</a></h2>
					<ul>
                        @if(!empty($contact->location))
                            @foreach (json_decode($contact->location) as $location)
                                <li><a href="#"><i class="fa-solid fa-location-dot"></i>{{ $location }}</a></li>
                                @break
                            @endforeach
                        @endif

                        @if(!empty($contact->phone))
                            @foreach (json_decode($contact->phone) as $phone)
                                @if($phone->type == 'Phone')
                                    <li><a href="tel:88{{$phone->number}}"><i class="fa-solid fa-phone"></i> +88{{$phone->number}}</a></li>
                                @endif
                            @endforeach
                        @endif
                        @if(!empty($contact->email))
                            @foreach (json_decode($contact->email) as $email)
                                <li><a href="mailto:{{$email}}"><i class="fa-solid fa-envelope"></i> {{ strtoupper($email) }}</a></li>
                            @endforeach
                        @endif
					</ul>
				</div>
				<div class="footer-column">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.050621451953!2d90.39431318612283!3d23.745574179751582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8967169ead3%3A0xf0167ae0ec63f58a!2sInstitute%20of%20Chartered%20Secretaries%20of%20Bangladesh%20(ICSB)!5e0!3m2!1sen!2sie!4v1689596152282!5m2!1sen!2sie" width="186" height="176" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
			<div class="visitor-column text-align color-white">
				<ul class="flex justify align">
					<li><h3>Our Visitor</h3></li>
					<li><p><i class="fa-regular fa-hand-point-right"></i>Views Today: 80</p></li>
					<li class="indicator"><p>|</p></li>
					<li><p>Total Visitor: 9000</p></li>
				</ul>
			</div>
			<div class="footer-social-column">
				<ul>
                    @if(!empty($contact->social))
                        @foreach (json_decode($contact->social) as $social)
                            <li><a href="{{$social->link}}" target="_blank"><i class="{{$social->icon}}"></i></a></li>
                        @endforeach
                    @endif
				</ul>
			</div>
		</div>
	</div>
	<div class="copyright-section text-align">
		<div class="container">
			<p>© Copyright 2023 {{date('Y', strtotime(Carbon\Carbon::now()))>2023 ? '-'.date('Y', strtotime(Carbon\Carbon::now())) : '' }}. All rights reserved | Web Design & Development by <a href="https://euitsols.com/" target="_blank">European IT Solutions, Bangladesh.</a></p>
		</div>
	</div>
</footer>
