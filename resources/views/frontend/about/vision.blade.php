@extends('frontend.master')

@section('title', 'Vision')

@section('content')
<section class="breadcrumbs-section">
	<div class="overly-image">
        @if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{"banner-image"}))
		<img src='{{storage_url(json_decode($single_page->saved_data)->{"banner-image"})}}' alt="Vision & Mission">
        @endif
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">Vision</h1>
				<ul class="flex">
					<li><a href="index">Home</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">About ICSB</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>Vision</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'image'}) && isset(json_decode($single_page->saved_data)->{'details'}))
<section class="mision-vision-section">
    <div class="container">
        <div class="mission-row flex">
            <div class="image-column">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'image'})}}" alt="">
            </div>
            <div class="content-column color-white">
                {!! (json_decode($single_page->saved_data)->{'details'}) !!}
            </div>
        </div>
    </div>
</section>
@endif

@include('frontend.includes.national_awards',['national_awards'=>$national_awards])

@endsection
