@extends('frontend.master')

@section('title', 'Photo gallery')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section gallery-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a> | Photo gallery</p>
		</div>
	</div>
</section>


<!--=============================== Gallery Section ========================== -->

<section class="gallery-section">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">ICSB Annual Picnic 2022</h1>
		</div>
		<div class="gallery-content">
			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-one.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-two.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-three.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-four.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-five.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-six.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-seven.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-eight.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-nine.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-ten.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-eleven.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-twelve.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-thirten.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-fourten.png')}}"></a>
			</div>

			<div class="gallery-items">
				<a href=""><img src="{{asset('frontend/img/gallery/gallery-fiften.png')}}"></a>
			</div>
		</div>
		<div class="gallery-button-section text-align">
			<a href="">Load More</a>
		</div>
	</div>
</section>
@endsection
