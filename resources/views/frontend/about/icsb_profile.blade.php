@extends('frontend.master')

@section('title', 'ICSB Profile')

@section('content')
	<!----============================= Breadcrumbs Section ========================---->
	<section class="breadcrumbs-section">
		<div class="overly-image">
			@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{"banner-image"}))
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
<!----======================== About Us Section =======================---->
@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'back-image'}) && isset(json_decode($single_page->saved_data)->{'front-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
	<section class="about-us-section">
		<div class="container">
			<div class="about-us-row flex">
				<div class="image-column">
					    <img class="first-image" src="{{storage_url(json_decode($single_page->saved_data)->{'back-image'})}}" alt="{{$single_page->title}}">
					<div class="box-image">
						<img class="second-image" src="{{storage_url(json_decode($single_page->saved_data)->{'front-image'})}}" alt="{{$single_page->title}}">
					</div>
				</div>
				<div class="content-column">
					<h2>{{_('About us')}}</h2>
                    {!! json_decode($single_page->saved_data)->{'page-description'} !!}
				</div>
			</div>
		</div>
	</section>
    @endif
    @include('frontend.includes.endorsement')
    @include('frontend.includes.bss',['home_bsss'=>$home_bsss])
    @include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss])

@endsection
