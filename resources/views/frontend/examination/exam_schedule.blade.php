@extends('frontend.master')

@section('title', 'Exam Schedule')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/examination.png');
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
<section class="handbook-section exam-section section-padding">
    <div class="container">
        <div class="handbook-column flex">
            <div class="new-handbook content-column exam-content-column">
                @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                    {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
                @endif
            </div>
            <div class="old-handbook text-align">
                @if (isset(json_decode($single_page->saved_data)->{'page-image'}))
                    <img src="{{storage_url(json_decode($single_page->saved_data)->{'page-image'})}}" alt="{{$single_page->title}}">
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
