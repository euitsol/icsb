@extends('frontend.master')

@section('title', 'Member Lounge')
{{-- @push('css_link')
<link rel="stylesheet" href="{{asset('frontend/css/lightbox.min.css')}}" />
@endpush --}}

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = $single_page->title;
if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
    $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
}
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<!----============================= Library Section ========================---->
<section class="py-4 py-md-5 mb-5 library-section">
    <div class="container">
        <div class="row py-4 py-md-5">
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
                <div class="col-sm-6">
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
{{-- @push('js_link')
<script src="{{asset('frontend/js/lightbox-plus-jquery.min.js')}}"></script>
@endpush --}}
