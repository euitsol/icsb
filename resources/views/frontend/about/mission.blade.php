@extends('frontend.master')

@section('title', 'Mission')

@section('content')
<section class="breadcrumbs-section">
	<div class="overly-image">
		@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{"banner-image"}))
		<img src='{{storage_url(json_decode($single_page->saved_data)->{"banner-image"})}}' alt="Vision & Mission">
        @endif
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">Mission</h1>
				<ul class="flex">
					<li><a href="index">Home</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">About ICSB</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>Mission</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'image'}) && isset(json_decode($single_page->saved_data)->{'details'}))
<section class="vision-mission-section">
    <div class="container">
        <div class="mission-row flex">
            <div class="content-column color-white">
                {!! (json_decode($single_page->saved_data)->{'details'}) !!}
            </div>
            <div class="image-column">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'image'})}}" alt="">
            </div>
        </div>
    </div>
</section>
@endif
@include('frontend.includes.national_awards',['national_awards'=>$national_awards])

@endsection
