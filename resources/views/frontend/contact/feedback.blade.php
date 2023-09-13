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
                <h2>Fill The Form Below</h2>
                <form>
                    <input type="text" name="name" placeholder="Name:">
                    <input type="email" name="email" placeholder="Email:">
                    <input type="tel" name="phone" placeholder="Phone Number:">
                    <input type="text" name="subject" placeholder="Your Subject:">
                    <textarea placeholder="Your Message Here:"></textarea>
                    <!-- <div class="g-recaptcha" data-sitekey="6Lfk7gkkAAAAAP3zBcc1gT8AeJVEI-l0lXeCpk7H"></div> -->
                    <!-- <button class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>Submit</button> -->
                    <input class="submit-button" type="submit" name="submit" value="Submit Now" class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit'data-action='submit'>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
