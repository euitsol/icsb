@extends('frontend.master')

@section('title', 'Mission')

@section('content')
<section class="breadcrumbs-section">
	<div class="overly-image">
		@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{"banner-image"}))
		<img src='{{storage_url(json_decode($single_page->saved_data)->{"banner-image"})}}' alt="{{$single_page->title}}">
        @endif
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">{{$single_page->title}}</h1>
				<ul class="flex">
					<li><a href="index">{{_('Home')}}</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">{{_('About ICSB')}}</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>{{$single_page->title}}</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'page-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
<section class="vision-mission-section">
    <div class="container">
        <div class="mission-row flex">
            <div class="content-column color-white">
                <h2>{{_('Our Mission')}}</h2>
                {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
            </div>
            <div class="image-column">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="">
            </div>
        </div>
    </div>
</section>
@endif
@include('frontend.includes.national_awards',['national_awards'=>$national_awards])

@endsection
