@extends('frontend.master')

@section('title', 'Eligibility')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/examination.jpg');
$title = $single_page->title;
if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
    $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
}
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Examination',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="objectives-section big-sec-height">
<div class="container">
    <div class="objective-row flex">
        <div class="left-column">
            @if (isset(json_decode($single_page->saved_data)->{'page-image'}))
			    <img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="">
            @endif
        </div>
        <div class="right-column color-white content-description">
            @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
            @endif
        </div>
    </div>
</div>
</section>

@endsection
