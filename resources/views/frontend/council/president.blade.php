@extends('frontend.master')

@section('title', 'President')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/faqs-background.jpg')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
            <div class="left-column content-column">
                <div class="inner-column color-white">
                    <h1 class="breadcrumbs-heading">{{$president->designation}}</h1>
                    <ul class="flex">
                        <li><a href="index">{{_('Home')}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="#">{{_('Council')}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li>
                            <p>{{$president->designation}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

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
                <ul>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
             </div>
            </div>
            <div class="right-column">

             <h2>{{str_replace(', ICSB', '', $president->designation)}}</h2>
                {!! $president->bio !!}
            </div>
        </div>
    </div>
</section>

@endsection
