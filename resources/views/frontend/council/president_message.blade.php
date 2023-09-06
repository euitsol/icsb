@extends('frontend.master')

@section('title', 'President')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/council.jpg');
$title = 'Message of The President';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
@if(!empty($president))
<section class="president-content-section big-sec-min-height">
    <div class="container">
        <div class="president-content-row">
            <div class="left-column">
             <img src="{{getMemberImage($president->member)}}" alt="{{_('president')}}">
             <div class="name-tittle">
             <a href="{{route('council_view.president')}}"><h3>{{$president->member->name}}</h3></a>
             <p>{{$president->designation}}</p>
             </div>
             <div class="contact-info">
                <ul>
                    @if(!empty($president->member->email))
                        <li><a href="mailto:{{$president->member->email}}"><i class="fa-solid fa-envelope"></i>{{$president->member->email}}</a></li>
                    @endif
                    @if(!empty($president->member->address))
                        <li><a href="#"><i class="fa-solid fa-location-dot"></i>{{$president->member->address}}</a></li>
                    @endif

                </ul>
             </div>
             <div class="social-media">
             </div>
            </div>
            <div class="right-column content-description">

             <h2 style="font-size: 4.2rem;">{{_('Message of The President')}}</h2>
                {!! $president->message !!}
            </div>
        </div>
    </div>
</section>
@else
<h3 class="my-5 text-center w-100">{{_('President Not Found')}}</h3>
@endif

@endsection
