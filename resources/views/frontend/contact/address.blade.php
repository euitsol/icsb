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
<section class="form-section">
    <div class="container">
        <h2 class="text-align">{{_('Our Address')}}</h2>
        <div class="form-content">
            <div class="detailes-column">
                <div class="deatiles-items">
                    <div class="icon">
                        <img src="{{asset('frontend/img/contact/contact-email.png')}}" alt="Contact Email">
                    </div>
                    <div class="content">
                        <h4>Email:</h4>
                        <a href="mailto:icsb@icsb.edu.bd">icsb@icsb.edu.bd</a>
                    </div>
                </div>
                <div class="deatiles-items">
                    <div class="icon">
                        <img src="{{asset('frontend/img/contact/contact-phone.png')}}" alt="Contact Email">
                    </div>
                    <div class="content">
                        <h4>Phone:</h4>
                        <a href="tel:+8801708030804">+8801708030804</a>
                    </div>
                </div>
                <div class="deatiles-items">
                    <div class="icon">
                        <img src="{{asset('frontend/img/contact/contact-telephone.png')}}" alt="Contact Email">
                    </div>
                    <div class="content">
                        <h4>Telephone No:</h4>
                        <a href="">880-2-933 6901, 49349578  (PABX)</a>
                    </div>
                </div>
                <div class="deatiles-items">
                    <div class="icon">
                        <img src="{{asset('frontend/img/contact/contact-fax.png')}}" alt="Contact Email">
                    </div>
                    <div class="content">
                        <h4>Fax No:</h4>
                        <a href="tel:880-2-933-9957">880-2-933-9957</a>
                    </div>
                </div>
                <div class="deatiles-items">
                    <div class="icon">
                        <img src="{{asset('frontend/img/contact/contact-location.png')}}" alt="Contact Email">
                    </div>
                    <div class="content">
                        <h4>Address:</h4>
                        <a href="">Padma Life Tower, ( 8th floor), 115 kazi Nazrul Islam Avenue. Bangla Motor, Dhaka-1000.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
