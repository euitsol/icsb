@extends('frontend.master')

@section('title', 'Contact us')

@section('content')
<section class="bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a> | Contact Us</p>
		</div>
	</div>
</section>



<!--=========================== Contact Form Section ==========================-->

<section class="form-section">
	<div class="container">
		<div class="form-content">
			<div class="detailes-column">
				<h3>Contact Info.</h3>
				<div class="deatiles-items">
					<div class="icon">
						<img src="{{asset('frontend/img/contact/contact-email.png')}}" alt="Contact Email">
					</div>
					<div class="content">
						<h4>Email:</h4>
						<a href="mailto:icsb@icsb.edu.bd">icsb@icsb.edu.bd</a>
					</div>
				</div>
				<div class="deatiles-items">
					<div class="icon">
						<img src="{{asset('frontend/img/contact/contact-phone.png')}}" alt="Contact Email">
					</div>
					<div class="content">
						<h4>Phone:</h4>
						<a href="tel:+8801708030804">+8801708030804</a>
					</div>
				</div>
				<div class="deatiles-items">
					<div class="icon">
						<img src="{{asset('frontend/img/contact/contact-telephone.png')}}" alt="Contact Email">
					</div>
					<div class="content">
						<h4>Telephone No:</h4>
						<a href="">880-2-933 6901, 49349578  (PABX)</a>
					</div>
				</div>
				<div class="deatiles-items">
					<div class="icon">
						<img src="{{asset('frontend/img/contact/contact-fax.png')}}" alt="Contact Email">
					</div>
					<div class="content">
						<h4>Fax No:</h4>
						<a href="tel:880-2-933-9957">880-2-933-9957</a>
					</div>
				</div>
				<div class="deatiles-items">
					<div class="icon">
						<img src="{{asset('frontend/img/contact/contact-location.png')}}" alt="Contact Email">
					</div>
					<div class="content">
						<h4>Address:</h4>
						<a href="">Padma Life Tower, ( 8th floor), 115 kazi Nazrul Islam Avenue. Bangla Motor, Dhaka-1000.</a>
					</div>
				</div>
			</div>
			<div class="form-column">
				<h2>Fill The Form Below</h2>
				<form>
					<input type="text" name="name" placeholder="Name:">
					<input type="email" name="email" placeholder="Email:">
					<input type="tel" name="phone" placeholder="Phone Number:">
					<input type="text" name="subject" placeholder="Your Subject:">
					<textarea placeholder="Your Message Here:"></textarea>
					<div class="g-recaptcha" data-sitekey="6Lfk7gkkAAAAAP3zBcc1gT8AeJVEI-l0lXeCpk7H"></div>
					<!-- <button class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>Submit</button> -->
					<input class="submit-button" type="submit" name="submit" value="Submit Now" class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>
				</form>
			</div>
		</div>
	</div>
</section>


<!--========================== Location Map Section ====================-->
<section class="map-section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.055853537064!2d90.39274677605813!3d23.745387588967446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8967169ead3%3A0xf0167ae0ec63f58a!2z4KaH4Kao4Ka44KeN4Kaf4Ka_4Kaf4Ka_4KaJ4KafIOCmheCmqyDgpprgpr7gprDgp43gpp_gpr7gprDgp43gpqEg4Ka44KeH4KaV4KeN4Kaw4KeH4Kaf4Ka-4Kaw4Ka_4KacIOCmheCmqyDgpqzgpr7gpoLgprLgpr7gpqbgp4fgprY!5e0!3m2!1sen!2sbd!4v1673432092486!5m2!1sen!2sbd" width="100%" height="790" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection
