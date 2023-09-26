@extends('frontend.master')

@section('title', 'Single Media Room')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/media_room.jpg');
$title = stringLimit($media_room->title,20,'...');
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'media_room_view.all'=>'Media Rooms',
                        'javascript:void(0)'=>stringLimit($media_room->cat->name,20,'...'),
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<!--============================= Blog Thumbnail Section ========================-->
<section class="blog-thumbnail-section">
    <div class="container">
        <div class="heading-content text-align">
            <img src="{{storage_url($media_room->thumbnail_image)}}" alt="{{$media_room->title}}">
        </div>
    </div>
</section>

<section class="blog-content-section">
    <div class="container">
        <div class="blog-content">
            <div class="blog-content-column">
                <h1>{{$media_room->title}}</h1>
                <ul>
                    <li><img src="{{asset('frontend/img/blog-single/user.svg')}}" alt="User Icon"><a href="">{{_('CS Bangladesh')}}</a></li>
                    <li><img src="{{asset('frontend/img/blog-single/calendar.svg')}}" alt="Calendar Icon"><a href="">{{ date('d M Y', strtotime($media_room->program_date))}}</a></li>

                </ul>
                <div class="content-description content-description">
                    {!! $media_room->description !!}
                </div>

                <div class="gallery-section global-gallery-section">
                    <div class="gallery-content">
                        @if(!empty($media_room->additional_images))
                            @foreach (json_decode($media_room->additional_images) as $image)
                                <div class="gallery-items">
                                    <a href="{{ storage_url($image) }}" data-lightbox="gallery">
                                        <img src="{{ storage_url($image) }}">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
            <div class="blog-sidebar-column">
                <div class="recent-post-section">
                    <h2>{{_('Recent Posts')}}</h2>
                    @foreach ($recents as $recent)
                        <div class="recent-post-content">
                            <div class="image-column">
                                <a href=""><img src="{{storage_url($recent->thumbnail_image)}}" alt="{{$recent->title}}"></a>
                            </div>
                            <div class="content-column">
                                <h3><a href="{{route('media_room_view.view',$recent->slug)}}">{{$recent->title}}</a></h3>
                                <p>{{date('d M, Y', strtotime($recent->program_date))}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-share-section">
    <div class="container">
        <div class="share-content">
            <div class="share-heading-column">
                <p>Share:</p>

            </div>
            <div class="share-icon-column">
                <ul>
                    <li><a href="{!! Share::currentPage()->facebook()->getRawLinks() !!}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{!! Share::currentPage()->linkedin()->getRawLinks() !!}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="{!! Share::currentPage()->twitter()->getRawLinks() !!}"><i class="fa-brands fa-square-x-twitter"></i></a></li>
                    <li><a href="{!! Share::currentPage()->whatsapp()->getRawLinks() !!}"><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>
@endpush
