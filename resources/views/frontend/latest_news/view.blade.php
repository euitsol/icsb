@extends('frontend.master')

@section('title', 'Latest News')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/media_room.jpg');
$title = stringLimit($latest_news->title,35,'...');
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<!--============================= Blog Thumbnail Section ========================-->
<section class="blog-thumbnail-section">
    <div class="container">
        <div class="heading-content text-align">
            @if(!empty(json_decode($latest_news->images)))
                @foreach (json_decode($latest_news->images) as $key=>$image)
                    @if($key == 0)
                        <img class="img-fluid" src="{{storage_url($image)}}" alt="{{$latest_news->title}}">
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>

<section class="blog-content-section">
    <div class="container">
        <div class="blog-content">
            <div class="blog-content-column big-sec-min-height" style="width: 100%">
                <h1>{{$latest_news->title}}</h1>
                <ul>
                    <li><img src="{{asset('frontend/img/blog-single/user.svg')}}" alt="User Icon"><a href="">{{_('CS Bangladesh')}}</a></li>
                    <li><img src="{{asset('frontend/img/blog-single/calendar.svg')}}" alt="Calendar Icon"><a href="">{{ date('d M Y', strtotime($latest_news->date))}}</a></li>

                </ul>
                <div class="content-description content-description">
                    {!! $latest_news->description !!}
                </div>

                <div class="gallery-section global-gallery-section mt-5">
                    <div class="gallery-content">
                        @if(!empty(json_decode($latest_news->images)))
                            @foreach (json_decode($latest_news->images) as $key=>$image)
                                <div class="gallery-items">
                                    <a class="w-100" href="{{ storage_url($image) }}" data-lightbox="gallery">
                                        <img src="{{ storage_url($image) }}">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        @if(!empty(json_decode($latest_news->files)))
                            @foreach (json_decode($latest_news->files) as $key=>$file)
                            @if(!empty($file->file_path))
                                <div class="gallery-items">
                                        <iframe src ="{{ pdf_storage_url($file->file_path) }}" width="100%" height="100%"></iframe>
                                </div>
                            @endif
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- <section class="blog-share-section">
    <div class="container">
        <div class="share-content">
            <div class="share-heading-column">
                <p>Share:</p>
            </div>
            <div class="share-icon-column">
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-x-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}
@endsection
@push('js')
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>
@endpush
