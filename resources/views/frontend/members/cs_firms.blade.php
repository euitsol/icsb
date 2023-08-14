@extends('frontend.master')

@section('title', 'CS Firms')

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
                <h1 class="breadcrumbs-heading">{{_('CS Firms')}}</h1>
                <ul class="flex">
                    <li><a href="index">{{_('Home')}}</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">{{_('Members')}}</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{_('CS Firms')}}</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="fellow-member-section">
    <div class="container">
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
