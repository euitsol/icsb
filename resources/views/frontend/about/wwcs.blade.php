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
            <div class="world-wide-column flex text-align">
                @foreach ($wwcss as $wwcs)
                <div class="cs-items card">
                    <h3>
                        {{substr($wwcs->title, 0, strrpos($wwcs->title, ' '))}}
                        <br>
                        {{ltrim(strrchr($wwcs->title, ' '))}}
                    </h3>
                    <img src="{{storage_url($wwcs->logo)}}" alt="The Global Institute">
                    <ul class="flex">
                        <li><a href="mailto:cgioffice@mci-group.com"><i class="fa-solid fa-envelope"></i> <span>Email</span></a></li>
                        <li><a href="{{$wwcs->url}}" target="_blank"><i class="fa-solid fa-globe"></i> <span>Visit Website</span></a></li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
