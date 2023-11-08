@extends('frontend.master')

@section('title', 'Location Map')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/contact_us.jpg');
$title = 'Location Map';
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
<section class="location-map-section big-sec-min-height">
    <div class="container">
        <div class="row">
            @if(isset($contact->location) && !empty(json_decode($contact->location)))
            @foreach (json_decode($contact->location) as $key=>$location)
            <div class="col-md-12 d-flex flex-column " style="row-gap: 15px">

                    <div class="location-map ">
                            <x-embed url="{{$location->url}}" />
                    </div>

            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
