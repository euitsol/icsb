@extends('frontend.master')

@section('title', 'Act')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
    $banner_image = asset('breadcumb_img/students.jpg');
    $title = $single_page->title;
    if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
        $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
    }
    $datas = [
                'image'=>$banner_image,
                'title'=>$title,
                'paths'=>[
                            'home'=>'Home',
                            'javascript:void(0)'=>'Students',
                            'javascript:void(0)'=>'Admission',
                        ]
            ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="director-metting-section">
        <div class="container">
           <div class="row justify-content-center">
                @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
                    @foreach (json_decode($single_page->saved_data)->{'upload-files'} as $file)
                        <div class="col-lg-6 the_cs mb-5 mx-auto">
                            <div class="new-handbook text-align">
                                    <iframe src ="{{ pdf_storage_url($file) }}" width="100%" height="500px"></iframe>
                                    <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file))}}"><h3 > {{ucfirst(str_replace('-', ' ', Str::before(basename($file), '.pdf')))}}</h3></a>
                            </div>
                        </div>
                    @endforeach
                @endif
           </div>
        </div>
    </section>
@endsection
