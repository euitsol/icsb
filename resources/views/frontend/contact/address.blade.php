@extends('frontend.master')

@section('title', 'Feedback')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/contact_us.jpg');
$title = 'Address';
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

<section class="objectives-section big-sec-min-height form-section">
    <div class="container">
        <div class="objective-row flex">
            <div class="right-column">
                <div class="form-content">
                    <div class="detailes-column">
                            @if(isset($contact->email) && !empty(json_decode($contact->email)))
                                {{-- <h2 class="text-white">Contact Info</h2> --}}
                                <div class="deatiles-items">

                                    <div class="icon">
                                        <img src="{{asset('frontend/img/contact/contact-email.png')}}" alt="Contact Email">
                                    </div>
                                    <div class="content">
                                        <h4>Email:</h4>
                                        @foreach (json_decode($contact->email) as $key=>$email)
                                                <a href="mailto:{{$email}}">{{$email}}</a><br>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if(isset($contact->phone) && !empty(json_decode($contact->phone)))
                            @foreach ($contact_numbers as $key=>$numbers)
                                <div class="deatiles-items">
                                    <div class="icon">
                                        @if($key == 'Phone' || $key == 'WhatsApp')
                                            <img src="{{asset('frontend/img/contact/contact-phone.png')}}" alt="{{$key}}">
                                        @elseif($key == 'Telephone')
                                            <img src="{{asset('frontend/img/contact/contact-telephone.png')}}" alt="{{$key}}">
                                        @elseif($key == 'Fax')
                                            <img src="{{asset('frontend/img/contact/contact-fax.png')}}" alt="{{$key}}">
                                        @endif
                                    </div>
                                    <div class="content">
                                        @foreach ($numbers as $number)
                                            <h4>{{$key}} No:</h4>
                                            <a href="tel:+88{{$number->number}}">+88{{$number->number}}</a><br>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                            @endif
                            @if(isset($contact->location) && !empty(json_decode($contact->location)))
                                @foreach (json_decode($contact->location) as $key=>$location)
                                    <div class="deatiles-items">
                                        <div class="icon">
                                            <img src="{{asset('frontend/img/contact/contact-location.png')}}" alt="Contact Email">
                                        </div>
                                        <div class="content">
                                            <h4>{{$location->title}}:</h4>
                                            <a href="{{ route('contact_us.location_map') }}">{{$location->address}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
            <div class="left-column">
                <img src="{{$contact->address_page_image ? storage_url($contact->address_page_image) : asset('no_img/no_img.jpg')}}" alt="{{('Address Page Image')}}">
            </div>
        </div>
    </div>
    </section>
@endsection
