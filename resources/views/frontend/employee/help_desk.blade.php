@extends('frontend.master')

@section('title', 'Help Desk')

@section('content')

<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = '';
$title = $single_page->title;
if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
    $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
}
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Employees',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'page-image'}) && isset(json_decode($single_page->saved_data)->{'page-description'}))
<section class="objectives-section">
<div class="container">
    <div class="objective-row flex">

        <div class="right-column color-white">
            <h2>{{_('Help Desk')}}</h2>
			{!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
        </div>
        <div class="left-column">
			<img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="">
        </div>
    </div>
</div>
</section>
@endif
@endsection

