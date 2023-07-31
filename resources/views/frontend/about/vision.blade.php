@extends('frontend.master')

@section('title', 'Vision')

@section('content')
<section class="breadcrumbs-section">
	<div class="overly-image">
		<img src="{{asset('frontend/img/breadcumb/mision-vision-imgae.jpg')}}" alt="Vision & Mission">
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">Vision & Mission</h1>
				<ul class="flex">
					<li><a href="index">Home</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">About ICSB</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>Vision & Mission</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="mision-vision-section">
    <div class="container">
        <div class="mission-row flex">
            <div class="image-column">
                <img src="{{asset('frontend/img/mission/banner-about-mission.jpg')}}" alt="">
            </div>
            <div class="content-column color-white">
                <h2>Our Vision</h2>
                <p>To be the institutional leader in the creation of skilled professionals for proper development of corporate management and good governance.</p>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.national_awards',['national_awards'=>$national_awards])

@endsection
