@extends('frontend.master')

@section('title', 'Annual Report')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = $single_page->title;
        if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
            $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
        }
        $datas = [
                    'image'=>$banner_image,
                    'title'=>$title,
                    'paths'=>[
                                'home'=>'Home',
                                'javascript:void(0)'=>'Publications',
                            ]
                ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="library-section">
        <div class="container">
            <div class="search-row flex">
                <div class="search-form">
                    <form class="search-form">
                        <input class="search-input" type="text" placeholder="Search..." required>
                        <button class="search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </form>
                </div>
            </div>
            @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
            @foreach (json_decode($single_page->saved_data)->{'upload-files'} as $key=>$file)
                <div class="library-row">
                    <div class="library-item flex">
                        <div class="left-column">
                            <ul class="flex">
                                <li>{{str_pad(($key+1), 2, '0', STR_PAD_LEFT)}}</li>
                                <li><a target="_blank" href="{{ route('sp.file.download', base64_encode($file)) }}">{{basename($file)}}</a></li>
                            </ul>
                        </div>
                        <div class="right-column">
                            <li><a target="_blank" href="{{ route('sp.file.download', base64_encode($file)) }}"><i class="fa-solid fa-cloud-arrow-down"></i></a></li>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </section>
@endsection
