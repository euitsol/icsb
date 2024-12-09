@extends('frontend.master')

@section('title', 'App Privacy Policy')
@push('css')
    <style>
        .new-handbook h3,
        .old-handbook h3 {
            outline: 0;
            border: 3px solid #FF8601;
            height: auto;
        }

        .objectives-section .objective-row .left-column iframe {
            border: 10px solid #93931c;
            outline: 0;
        }

        .objectives-section .objective-row .left-column {}

        .objectives-section .objective-row .left-column img {
            max-height: 26rem;
            border: 10px solid #93931c;
        }
    </style>
@endpush

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/app_privacy_policy.jpg');
        $title = $single_page->title;
        if (isset(json_decode($single_page->saved_data)->{"banner-image"})) {
            $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
        }
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Contact Us',
                'contact_us.app_platforms' => 'App Platforms',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <section class="objectives-section">
        <div class="container">
            <div class="objective-row reverse flex">
                <div class="right-column color-white content-description">
                    @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                        {!! json_decode($single_page->saved_data)->{'page-description'} !!}
                    @endif
                </div>
                <div class="left-column">
                    @if (isset(json_decode($single_page->saved_data)->{'upload-file'}))
                        <div class="new-handbook">
                            <iframe src ="{{ pdf_storage_url(json_decode($single_page->saved_data)->{'upload-file'}) }}"
                                width="100%" height="500px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank"
                                href="{{ route('sp.file.download', base64_encode(json_decode($single_page->saved_data)->{'upload-file'})) }}">
                                <h3> {{ ucfirst(str_replace('-', ' ', Str::before(basename(json_decode($single_page->saved_data)->{'upload-file'}), '.pdf'))) }}
                                </h3>
                            </a>
                        </div>
                    @elseif (isset(json_decode($single_page->saved_data)->{'page-image'}))
                        <img src="{{ storage_url(json_decode($single_page->saved_data)->{'page-image'}) }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
