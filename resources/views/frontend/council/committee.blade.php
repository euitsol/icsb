@extends('frontend.master')

@section('title', 'Committee')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/council.jpg');
$title = $committee->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>$committee->committe_type->title,
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="executive-committee-section">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{$committee->title}}{{_(' Members')}}</h2>
        </div>
        <div class="committee-row flex">
            @foreach ($c_members as $key=>$member)
                <div class="committee-items flex">
                    <div class="image-column">
                        <img src="{{ getMemberImage($member->member) }}" alt="">
                    </div>
                    <div class="content-column">
                        <h3>{{ $member->member->name }}</h3>
                        <li><i class="fa-solid fa-window-restore"></i> <h4>{{$member->member->membership_id}}</h4></li>
                        <li><i class="fa-solid fa-user-tie"></i> <p>{{ $member->committe_member_type->title }}</p></li>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
