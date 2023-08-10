@extends('frontend.master')

@section('title', 'Media Rooms')

@section('content')
    <!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        <div class="overly-image">
            <img src="{{ asset('frontend/img/breadcumb/Event-Management-Proposal.jpg') }}" alt="All Events">
        </div>
        <div class="container">
            <div class="breadcrumbs-row flex">
                <div class="left-column content-column">
                    <div class="inner-column color-white">
                        <h1 class="breadcrumbs-heading">
                            @if(isset($cat))
                                {{$cat->name}}
                            @else
                                {{_('All Media Rooms')}}
                            @endif
                        </h1>
                        <ul class="flex">
                            <li>
                                @if(isset($cat))
                                <a href="{{route('media_room_view.all')}}">{{_('Media Room')}}</a>
                            @else
                                <a href="{{route('home')}}">{{_('Home')}}</a>
                            @endif
                            </li>
                            <li><i class="fa-solid fa-angle-right"></i></li>
                            <li>
                                @if(isset($cat))
                                <a href="{{route('media_room_view.cat.all',$cat->slug)}}">{{$cat->name}}</a>
                            @else
                                <a href="{{route('media_room_view.all')}}">{{_('Media Room')}}</a>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="blog-section">
        <div class="container">
            <div class="row">
                @foreach ($media_rooms as $media_room)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="logo-wrapp">
                            <a href="{{route('media_room_view.view',$media_room->slug)}}"><img src="{{storage_url($media_room->thumbnail_image)}}" alt="..." /></a>
                            <div class="post-content">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($media_room->created_at))}}</a>
                                    </li>
                                </ul>
                                <h3><a href="{{route('media_room_view.view',$media_room->slug)}}">{{$media_room->title}}</a></h3>
                                <p>{{ stringLimit(html_entity_decode_table($media_room->description)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="see-button text-align">
                <a href="#">See More Post</a>
            </div>
        </div>
    </div>
@endsection
