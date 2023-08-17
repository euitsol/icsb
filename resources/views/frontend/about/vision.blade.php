@extends('frontend.master')

@section('title', 'Vision')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/about_cs.jpg');
$title = $single_page->title;
if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
    $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
}
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'About CS',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
@if(!empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'page-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
<section class="mision-vision-section big-sec-height">
    <div class="container">
        <div class="mission-row flex">
            <div class="image-column">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="">
            </div>
            <div class="content-column color-white">
                <h2>{{_('Our Vision')}}</h2>
                {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
            </div>
        </div>
    </div>
</section>
@endif

@endsection
