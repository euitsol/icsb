@extends('frontend.master')

@section('title', 'Past Secretary & CEOs')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/employees.jpg');
$title = 'Past Secretary & CEOs';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Employees',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<section class="past-president-layout">
    <div class="container">
        <div class="president-row flex">
            @foreach ($p_sec_and_ceos as $psc)
                <div class="items text-align">
                    <img src="{{getMemberImage($psc->member)}}" alt="">
                    <h3>{{$psc->member->name}}</h3>
                    <h4>
                        @foreach ($psc->durations as $key=>$duration)
                            @if($key<1)
                                <span>{{formatYearRange($duration->start_date, $duration->start_date)}}</span>
                            @else
                                <span>{{_(', ')}}{{formatYearRange($duration->start_date, $duration->start_date)}}</span>
                            @endif

                        @endforeach
                    </h4>
                    <p class="text-justify">{{ stringLimit(html_entity_decode_table($psc->bio), '300') }}</p>
                    <a href="{{route('employee_view.single.psc',$psc->slug)}}">Read More</a>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
