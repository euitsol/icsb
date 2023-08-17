@extends('frontend.master')

@section('title', 'Exam Schedule')

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
<!--============================= Exam Schedul Section ==================-->
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)) && isset(json_decode($single_page->saved_data)->{'image'}) && isset(json_decode($single_page->saved_data)->{'details'}))
<section class="handbook-section exam-section section-padding">
    <div class="container">
        <div class="handbook-column flex">
            <div class="new-handbook content-column exam-content-column">
                {!! (json_decode($single_page->saved_data)->{'details'}) !!}
            </div>
            <div class="old-handbook text-align">
                <img src="{{storage_url(json_decode($single_page->saved_data)->{'image'})}}" alt="{{$single_page->page_key}}">
            </div>
        </div>
    </div>
</section>
@endif
@endsection
