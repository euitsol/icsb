@extends('frontend.master')

@section('title', 'Help Desk')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
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
                    <li><a href="#">{{_('Employees')}}</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{$single_page->title}}</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<!--============================= Exam Schedul Section ==================-->
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'page-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
<section class="handbook-section exam-section section-padding">
    <div class="container">
        <div class="handbook-column flex">
            <div class="new-handbook content-column exam-content-column">
                {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
            </div>
            <div class="old-handbook text-align">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="{{$single_page->page_key}}">
            </div>
        </div>
    </div>
</section>
@endif
@endsection
