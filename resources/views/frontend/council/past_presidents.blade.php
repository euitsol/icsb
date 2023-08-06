@extends('frontend.master')

@section('title', 'Past Presidents')

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
                <h1 class="breadcrumbs-heading">Past Presidents</h1>
                <ul class="flex">
                    <li><a href="index">Home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">Council</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>Past Presidents</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="past-president-layout">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">{{_('Past Presidents')}}</h2>
        </div>
        <div class="president-row flex">
            @foreach ($p_presidents as $pp)
                <div class="items text-align">
                    <img src="{{getMemberImage($pp->member)}}" alt="">
                    <h3>{{$pp->member->name}}</h3>
                    <h4>
                        @foreach ($pp->durations as $key=>$duration)
                            @if($key<1)
                                <span>{{formatYearRange($duration->start_date, $duration->start_date)}}</span>
                            @else
                                <span>{{_(', ')}}{{formatYearRange($duration->start_date, $duration->start_date)}}</span>
                            @endif

                        @endforeach
                    </h4>
                    <p class="text-justify">{{ stringLimit(html_entity_decode_table($pp->bio), '300') }}</p>
                    <a href="{{route('council_view.single.pp',$pp->slug)}}">Read More</a>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
