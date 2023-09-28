@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/event.jpg');
$title = 'Our Events';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Our Events',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="our-events-section big-sec-min-height d-flex align-items-center">
    <div class="container">
        <div class="events-row flex">
            @foreach ($events as $event)
                <div class="item">
                    <div class="logo-wrapp">
                        <h3><a href="#">{{stringLimit($event->title,80)}}</a></h3>
                        <ul class="flex">
                            <li><i class="fa-solid fa-calendar-check"></i> {{ date('d-M-Y', strtotime($event->event_start_time))}}</li>
                            <li><i class="fa-solid fa-clock"></i> {{ $event->type == 1 ? "Online" : "Offline" }}</li>
                        </ul>
                        <div class="button">
                            <a href="{{route('event_view.view',$event->slug)}}" class="fill-button">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(count($events)>=12)
                <div class="see-button text-align" >
                    <a href="javascript:void(0)" class="more" data-offset="12">{{_('See More')}}</a>
                </div>
        @endif
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function () {
    $('.more').on('click', function () {
        var limit = 12;
        var offset = $(this).attr('data-offset');
        let url = ("{{ route('events_more', ['offset']) }}");
        let _url = url.replace('offset', offset);
        $.ajax({
            url: _url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.events.forEach(function (event) {
                    let singleViewRoute = ("{{ route('event_view.view', ['slug']) }}");
                    let _singleViewRoute = singleViewRoute.replace('slug', event.slug);
                    let type = (event.type == 1 ? "Online" : "Offline");
                    let result = `
                    <div class="item">
                        <div class="logo-wrapp">
                            <h3><a href="${_singleViewRoute}"></a>${event.title}</h3>
                            <ul class="flex">
                                <li><i class="fa-solid fa-calendar-check"></i>${event.event_start_time}</li>
                                <li><i class="fa-solid fa-clock"></i> ${type}</li>
                            </ul>
                            <div class="button">
                                <a href="{${_singleViewRoute}" class="fill-button">Details</a>
                            </div>
                        </div>
                    </div>
                    `;
                    $('.event-row').append(result);
                    });
                    if(data.events.length<limit){
                            $('.more').parent().hide();
                    }

            },
            error: function (xhr, status, error) {
                console.error('Error fetching media:', error);
            }
            });
        });
    });
</script>

@endpush
