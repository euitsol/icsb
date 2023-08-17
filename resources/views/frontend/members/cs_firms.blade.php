@extends('frontend.master')

@section('title', 'CS Firms')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'CS Firms';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<section class="fellow-member-section big-sec-min-height">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{'CS Firm Members'}}</h2>
        </div>
        <div class="fellow-row flex">
            @forelse ($csf_members as $csf_m)
            <div class="fellow-items flex">
                <div class="image-column">
                    <img src="{{getMemberImage($csf_m->member)}}" alt="{{$csf_m->member->name}}">
                </div>
                <div class="content-column">
                    <h4>{{('Member ID: ')}}{{$csf_m->private_practice_certificate_no}}</h4>
                    <h3 class="mb-0">{{$csf_m->member->name}}</h3>
                    <p><strong>{{$csf_m->member->designation}}</strong></p>
                    @if(!empty($csf_m->member->address))
                        <li><i class="fa-solid fa-house-circle-exclamation"></i>{{$csf_m->member->address}}</li>
                    @endif
                    @if(!empty(json_decode($csf_m->member->phone)))
                        @foreach (json_decode($csf_m->member->phone) as $phone)
                            <li><i class="fa-solid fa-phone"></i>Phone: <a href="tel:+88{{$phone->number}}">+88 {{$phone->number}}({{stringLimit(ucfirst($phone->type), 3, '')}})</a></li>
                        @endforeach

                    @endif
                    @if(!empty($csf_m->member->email))
                        <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:{{$csf_m->member->email}}">{{$csf_m->member->email}}</a></li>
                    @endif
                </div>
            </div>
            @empty
                <span class="text-center">
                    <b>Member Not Found</b>
                </span>
            @endforelse

        </div>
    </div>
</section>
@endsection
