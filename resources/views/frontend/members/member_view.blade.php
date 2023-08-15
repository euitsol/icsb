@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = '';
$title = $type->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Member’s Search',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->


<section class="fellow-member-section big-sec-min-height">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{$type->title}}</h2>
        </div>
        <div class="fellow-row flex">
            @forelse ($type->members as $member)
            <div class="fellow-items flex">
                <div class="image-column">
                    <img src="{{getMemberImage($member)}}" alt="{{$member->name}}">
                </div>
                <div class="content-column">
                    <h4>H-{{member_id($member->id)}}</h4>
                    <h3 class="mb-0">{{$member->name}}</h3>
                    <p><strong>{{$member->designation}}</strong></p>
                    @if(!empty($member->address))
                        <li><i class="fa-solid fa-house-circle-exclamation"></i>{{$member->address}}</li>
                    @endif
                    @if(!empty(json_decode($member->phone)))
                        @foreach (json_decode($member->phone) as $phone)
                            <li><i class="fa-solid fa-phone"></i>Phone: <a href="tel:+88{{$phone->number}}">+88 {{$phone->number}}({{stringLimit(ucfirst($phone->type), 3, '')}})</a></li>
                        @endforeach

                    @endif
                    @if(!empty($member->email))
                        <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:{{$member->email}}">{{$member->email}}</a></li>
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
