@extends('frontend.master')

@section('title', 'CS Firms Members')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/past-presidents-background.jpg')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
            <div class="inner-column color-white">
                <h1 class="breadcrumbs-heading">{{_('CS Firms Members')}}</h1>
                <ul class="flex">
                    <li><a href="index">{{_('Home')}}</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">{{_('Council')}}</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>{{_('CS Firms Members')}}</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="past-president-layout">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{_('CS Firms Members')}}</h2>
        </div>
        <div class="president-row flex">
            @foreach ($csf_members as $csf_m)
                <div class="items text-align">
                    <img src="{{getMemberImage($csf_m->member)}}" alt="">
                    <h3>{{$csf_m->member->name}}</h3>
                    <p class="text-justify">{{ stringLimit(html_entity_decode_table($csf_m->member->description), '300') }}</p>
                    {{-- <a href="{{route('council_view.single.pp',$pp->slug)}}">Read More</a> --}}
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
