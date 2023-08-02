@extends('frontend.master')

@section('title', 'Committee')

@section('content')
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/objectives-background.jpg')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
            <div class="inner-column color-white">
                <h1 class="breadcrumbs-heading">{{$committee->title}}</h1>
                <ul class="flex">
                    <li><a href="index">Home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">Council</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{$committee->committe_type->title}}</p></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{$committee->title}}</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="executive-committee-section">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{$committee->title}}</h2>
        </div>
        <div class="committee-row flex">
            @foreach ($c_members as $key=>$member)
                <div class="committee-items flex">
                    <div class="image-column">
                        <img src="{{ storage_url($member->member->image) }}" alt="">
                    </div>
                    <div class="content-column">
                        <h3>{{ $member->member->name }}</h3>
                        <li><i class="fa-solid fa-window-restore"></i> <h4>(F-{{member_id($member->member->id)}})</h4></li>
                        <li><i class="fa-solid fa-user-tie"></i> <p>{{ $member->committe_member_type->title }}</p></li>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
