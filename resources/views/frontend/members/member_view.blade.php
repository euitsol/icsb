@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/objectives-background.jpg')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
            <div class="inner-column color-white">
                <h1 class="breadcrumbs-heading">{{$type->title}}</h1>
                <ul class="flex">
                    <li><a href="index">Home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">Member’s Search</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{$type->title}}</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="fellow-member-section">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{$type->title}}</h2>
        </div>
        <div class="fellow-row flex">
            @forelse ($type->members as $member)
            <div class="fellow-items flex">
                <div class="image-column">
                    <img src="{{storage_url($member->image)}}" alt="{{$member->name}}">
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
