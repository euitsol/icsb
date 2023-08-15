@extends('frontend.master')

@section('title', 'Feedback')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = '';
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
            <div class="detailes-column">
                <h3>Contact Info.</h3>
                @if(isset($contact->email) && !empty(json_decode($contact->email)))
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
                                @if($key == 'Phone')
                                    <img src="{{asset('frontend/img/contact/contact-phone.png')}}" alt="{{$key}}">
                                @elseif($key == 'Telephone')
                                    <img src="{{asset('frontend/img/contact/contact-telephone.png')}}" alt="{{$key}}">
                                @else
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
                @if(isset($contact->phone) && !empty(json_decode($contact->location)))
                    @foreach (json_decode($contact->location) as $key=>$location)
                        <div class="deatiles-items">
                            <div class="icon">
                                <img src="{{asset('frontend/img/contact/contact-location.png')}}" alt="Contact Email">
                            </div>
                            <div class="content">
                                <h4>Address:</h4>
                                <a href="">{{$location}}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
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
