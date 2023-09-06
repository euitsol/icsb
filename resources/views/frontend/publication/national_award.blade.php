@extends('frontend.master')

@section('title', 'National Awards')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = "ICSB National Award Souvenir";
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Publications',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <section class="library-section big-sec-min-height">
        <div class="container">
            <div class="row gy-4">
                @foreach ($national_awards as $award)
                    <div class="col-md-3">
                        <div class="item">
                            <a class="demo col-12"
                                href="{{ $award->file ? route('sp.file.download', base64_encode($award->file)) : storage_url($award->image) }}"
                                @if (empty($award->file)) data-lightbox="gallery" @else target="_blank" @endif>
                                <img class="example-image" src="{{ storage_url($award->image) }}" alt="{{ $award->title }}" />
                            </a>
                        </div>
                        <div class="new-handbook text-align">
                            <h3><a class="text-white" href="{{ $award->file ? route('sp.file.download', base64_encode($award->file)) : 'javascript:void(0)' }}">{{$award->title}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
