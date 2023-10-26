@extends('frontend.master')

@section('title', 'Social Plateform')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/contact_us.jpg');
$title = 'Social Platforms';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Contact Us',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!--=========================== Contact Form Section ==========================-->
<section class="social-platform-section big-sec-min-height">
    <div class="container">
        <div class="row justify-content-center">
            @if (!empty($contact->social))
                @foreach (json_decode($contact->social) as $social)
                    <div class="col-sm-6 col-md-4 gy-5 wrap">
                        <div class="card text-center">
                            <div class="card-header">
                                        <a href="{{ $social->link }}" target="_blank"><span class="icon"><i class="{{ $social->icon }}"></i></span></a>

                            </div>
                            <div class="card-body title">
                                <span>{{extractStringFromUrl($social->link)}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
