@extends('frontend.master')

@section('title', 'President')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/council.jpg');
$title = ($president->designation ?? 'President');
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Council',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
@if(!empty($president))
<section class="president-content-section">
    <div class="container">
        <div class="president-content-row">
            <div class="left-column">
             <img src="{{getMemberImage($president->member)}}" alt="{{_('president')}}">
             <div class="name-tittle">
             <h3>{{$president->member->name}}</h3>
             <p>{{$president->designation}}</p>
             </div>
             <div class="contact-info">
                <ul>
                    @if(!empty(json_decode($president->member->phone)))
                        @foreach (json_decode($president->member->phone) as $phone)
                            <li><a href="tel:88{{$phone->number}}"><i class="fa-solid fa-phone"></i>+88{{$phone->number}}({{stringLimit(ucfirst($phone->type), 3, '..')}})</a></li>
                        @endforeach
                    @endif
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
            <div class="right-column">
                {!! $president->bio !!}
            </div>
        </div>
    </div>
</section>
@else
<h3 class="my-5 text-center">{{_('President Not Found')}}</h3>
@endif

@endsection
