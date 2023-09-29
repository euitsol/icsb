@extends('frontend.master')

@section('title', 'Past Presidents')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/council.jpg');
$title = 'Past Presidents';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Council',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
@if(!empty($p_presidents))
<section class="past-president-layout big-sec-min-height">
    <div class="container">
        <div class="president-row flex">
            @foreach ($p_presidents as $pp)
                @if($pp->status == 1 && count($pp->durations)<=1)
                    @continue
                @else
                    <div class="items text-align">
                        <img src="{{getMemberImage($pp->member)}}" alt="">
                        <h3>{{$pp->member->name}}</h3>
                        <div class="duration">
                            <h4>
                                @foreach ($pp->durations as $key=>$duration)
                                    @if(count($pp->durations) == 17)
                                        <span>{{_('...')}}</span>
                                        @break;
                                    @endif
                                    @if($key<1)
                                        <span>{{formatYearRange($duration->start_date, $duration->end_date)}}</span>
                                    @else
                                        <span>{{_(', ')}}{{formatYearRange($duration->start_date, $duration->end_date)}}</span>
                                    @endif

                                @endforeach

                            </h4>
                        </div>

                                                                                                                                </h4>
                        {{-- <p class="text-justify">{{ stringLimit(html_entity_decode_table($pp->bio), '300') }}</p> --}}
                        <a href="{{route('council_view.single.pp',$pp->slug)}}">Read More</a>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
@else
<h3 class="my-5 text-center w-100">{{_('Past Presidents Not Found')}}</h3>
@endif
@endsection
