@extends('frontend.master')

@section('title', 'Application Plateform')
@push('css')
    <style>
        .social-platform-section .fa-google-play {
            color: #00BFED;
        }

        .social-platform-section .fa-apple {
            color: #78CCE9;
        }

        .privacy-policy {
            text-decoration: none;
            color: inherit;
        }

        .privacy-policy:hover {
            color: red;
        }
    </style>
@endpush
@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/app_platform.png');
        $title = 'App Platforms';
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Contact Us',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!--=========================== Contact Form Section ==========================-->
    <section class="social-platform-section big-sec-min-height">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">{{ __('Download ICSB App') }}</h2>
                </div>
                <div class="col-sm-6 col-md-4 gy-5 wrap">
                    <div class="card text-center">
                        <a href="{{ isset(json_decode($download_url->saved_data)->{"apk-download-url"}) ? json_decode($download_url->saved_data)->{"apk-download-url"} : 'javascript:void(0)' }}"
                            @if (isset(json_decode($download_url->saved_data)->{"apk-download-url"})) target="_blank" @else onClick="alert('Coming soon');" @endif>
                            <div class="card-header">
                                <span class="icon"><i class="fa-brands fa-google-play"></i></span>


                            </div>
                            <div class="card-body title">
                                <span>{{ __('Android (APK)') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 gy-5 wrap">
                    <div class="card text-center">
                        <a href="{{ isset(json_decode($download_url->saved_data)->{"ios-download-url"}) ? json_decode($download_url->saved_data)->{"ios-download-url"} : 'javascript:void(0)' }}"
                            @if (isset(json_decode($download_url->saved_data)->{"ios-download-url"})) target="_blank" @else onClick="alert('Coming soon');" @endif>
                            <div class="card-header">
                                <span class="icon"><i class="fa-brands fa-apple"></i></span>


                            </div>
                            <div class="card-body title">
                                <span>{{ __('Apple (iOS)') }}</span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-sm-6 col-md-4 gy-5 wrap text-center">
                    <a href="{{ route('sp.frontend', 'app-privacy-policy') }}" class="privacy-policy">
                        <h2>{{ __('APP Privacy Policy') }}</h2>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
