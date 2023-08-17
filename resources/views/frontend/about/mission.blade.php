@extends('frontend.master')

@section('title', 'Mission')

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
@if(!empty($single_page) && !empty(json_decode($single_page->saved_data)))
<section class="vision-mission-section big-sec-height">
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

@endsection
