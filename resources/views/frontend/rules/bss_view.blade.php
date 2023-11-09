@extends('frontend.master')

@section('title', 'Bangladesh Secretarial Standard')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/rules.jpg');
$title = $view_bss->short_title.": ".$view_bss->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Rules',
                        'javascript:void(0)'=>'Secretarial Standards',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="director-metting-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 the_cs mb-5 mx-auto">
                    <div class="new-handbook text-align">
                            <iframe src ="{{ pdf_storage_url(json_decode($view_bss->file)->file_path)) }}" width="100%" height="400px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode(json_decode($view_bss->file)->file_path))}}"><h3 > {{ucfirst(str_replace('-', ' ', Str::before(basename(json_decode($view_bss->file)->file_path), '.pdf')))}}{{_(' : ')}}{{$view_bss->title}}</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
