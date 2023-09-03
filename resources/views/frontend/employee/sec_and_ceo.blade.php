@extends('frontend.master')

@section('title', 'Secretary & CEO')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/employees.jpg');
$title = ($sec_and_ceo->designation ?? 'Secretary & CEO');
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

<section class="president-content-section big-sec-min-height">
    @if(!empty($sec_and_ceo))
        <div class="container">
            <div class="president-content-row">
                <div class="left-column">
                <img src="{{getMemberImage($sec_and_ceo->member)}}" alt="{{_('president')}}">
                <div class="name-tittle">
                <h3>{{$sec_and_ceo->member->name}}</h3>
                <p>{{$sec_and_ceo->designation}}</p>
                </div>
                <div class="contact-info">
                    <ul>
                        {{-- @if(!empty(json_decode($sec_and_ceo->member->phone)))
                            @foreach (json_decode($sec_and_ceo->member->phone) as $phone)
                                <li><a href="tel:88{{$phone->number}}"><i class="fa-solid fa-phone"></i>+88{{$phone->number}}({{stringLimit(ucfirst($phone->type), 3, '..')}})</a></li>
                            @endforeach
                        @endif --}}
                        @if(!empty($sec_and_ceo->member->email))
                            <li><a href="mailto:{{$sec_and_ceo->member->email}}"><i class="fa-solid fa-envelope"></i>{{$sec_and_ceo->member->email}}</a></li>
                        @endif
                        @if(!empty($sec_and_ceo->member->address))
                            <li><a href="#"><i class="fa-solid fa-location-dot"></i>{{$sec_and_ceo->member->address}}</a></li>
                        @endif

                    </ul>
                </div>
                <div class="social-media">
                </div>
                </div>
                <div class="right-column content-description">
                    {!! $sec_and_ceo->bio !!}
                </div>
            </div>
        </div>
    @else
    <h3 class="my-5 text-center w-100">{{_('Secretary & CEO Not Found')}}</h3>
    @endif
</section>


@endsection
