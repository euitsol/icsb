@extends('frontend.master')

@section('title', 'Mission')

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
<section class="vision-mission-section">
    <div class="container">
        <div class="mission-row flex">
            <div class="content-column color-white">
                <h2>Our Mission</h2>
                <p>To remain the premier body of professional studies to cultivate the profession of Chartered Secretary so as to ensure sound Corporate Governance and build up capable management professionals by continuously working for proactive professional development.</p>
            </div>
            <div class="image-column">
                <img src="{{asset('frontend/img/mission/banner-about-mission.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.national_awards',['national_awards'=>$national_awards])

@endsection
