@extends('frontend.master')

@section('title', 'World Wide CS')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/wide-wise-cs.jpg')}}" alt="world wide cs">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
            <div class="left-column content-column">
                <div class="inner-column color-white">
                    <h1 class="breadcrumbs-heading">World Wide CS</h1>
                    <ul class="flex">
                        <li><a href="index">Home</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="#">About ICSB</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li>
                            <p>World Wide CS</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================== End World Wide Chartered Secretaries Section ========================== -->
<section class="world-wide-section">
    <div class="container">
        <div class="world-wide-row">
            <div class="section-heading text-align">
                <h2>Who We Are</h2>
            </div>
            @foreach ($wwcss->chunk(2) as $wwcss)
            <div class="world-wide-column flex text-align">
                @foreach ($wwcss as $wwcs)
                    <div class="world-wide-item d-flex flex-wrap justify-content-center">
                        <div class="chart-sec-logo">
                            <img src="{{storage_url($wwcs->logo)}}" alt="{{$wwcs->title}}">
                        </div>
                        <div class="chart-sec-content">
                            <h3 class="chart-heading">{{$wwcs->title}}</h3>
                            <p class="chart-details">{!! $wwcs->description !!}</p>
                            <div class="chart-link">
                                <span>Website: <a href="{{$wwcs->url}}" target="_blank">{{removeHttpProtocol($wwcs->url)}}</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
