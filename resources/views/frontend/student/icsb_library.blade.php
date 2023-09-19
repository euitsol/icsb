@extends('frontend.master')

@section('title', 'ICSB Library')
@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/students.jpg');
$title = 'ICSB Library';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Students',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="py-5 mb-5 library-section">
    <div class="container">
        <div class="row py-5">
            <div class="col">
                @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                    {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
                @endif
            </div>
        </div>
        <div class="library-imges row row-gap-4 m-auto">
            @php
                $images = json_decode($single_page->saved_data)->{'page-images'};
            @endphp
            @if (isset($images))
                @foreach ($images as $image)
                <div class="col-6">
                    <a
                        class="demo col-12"
                        href="{{ storage_url($image) }}"
                        data-lightbox="gallery"
                    >
                        <img
                            class="example-image"
                            src="{{ storage_url($image) }}"
                            alt="image-1"
                        />
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
