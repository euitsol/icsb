@extends('frontend.master')

@section('title', 'World Wide CS')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/about_cs.jpg');
$title = 'World Wide CS';
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
<!--=============================== End World Wide Chartered Secretaries Section ========================== -->
<section class="world-wide-section">
    <div class="container">
        <div class="world-wide-row">
            <div class="world-wide-column flex text-align">
                @foreach ($wwcss as $wwcs)
                    <div class="cs-items card">
                        <h3>
                            {!! $wwcs->title !!}
                        </h3>
                        <img src="{{storage_url($wwcs->logo)}}" alt="The Global Institute">
                        <ul class="flex">
                            <li><a href="{{$wwcs->url}}" target="_blank"><i class="fa-solid fa-globe"></i> <span>{{_('Visit Website')}}</span></a></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
