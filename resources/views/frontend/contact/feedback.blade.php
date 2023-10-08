@extends('frontend.master')

@section('title', 'Feedback')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/contact_us.jpg');
$title = 'Feedback';
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
        <div class="form-content">
            <div class="form-column">
                <div class="form-border">
                    <h2>Fill The Form Below</h2>
                    <form action="{{route('contact_us.feedback.store')}}" method="POST">
                        @csrf
                        <input type="text" value="To: CS Bangladesh" disabled>
                        <input type="text" name="name" placeholder="Your Name:">
                        @include('alerts.feedback', ['field' => 'name'])
                        <input type="email" name="email" placeholder="Your Email:">
                        @include('alerts.feedback', ['field' => 'email'])
                        <input type="tel" name="phone" placeholder="Your Phone Number:">
                        @include('alerts.feedback', ['field' => 'phone'])
                        <input type="text" name="subject" placeholder="Your Subject:">
                        @include('alerts.feedback', ['field' => 'subject'])
                        <textarea name="message" placeholder="Your Message Here:"></textarea>
                        @include('alerts.feedback', ['field' => 'message'])
                        <!-- <div class="g-recaptcha" data-sitekey="6Lfk7gkkAAAAAP3zBcc1gT8AeJVEI-l0lXeCpk7H"></div> -->
                        <!-- <button class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>Submit</button> -->
                        <input class="submit-button" type="submit" name="submit" value="SEND" class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
