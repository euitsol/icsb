@extends('frontend.master')

@section('title', 'Bangladesh Secretarial Standard')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = '';
$title = $view_bss->short_title.': '.$view_bss->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Rules',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="director-metting-section">
        <div class="container">
            <div class="director-row text-align">
                {{-- <img src="{{asset('frontend/img/director/board-of-director.png')}}" alt="Board Of Director"> --}}
                <div>
                    <iframe src="{{ storage_url(json_decode($view_bss->file)->file_path) }}" width="100%" height="500px"></iframe>
                </div>
                <div class="button">
                    @if(!empty(json_decode($view_bss->file)))
                        <a href="{{route('view.download',base64_encode(json_decode($view_bss->file)->file_path))}}"><i class="fa-solid fa-cloud-arrow-down"></i>Click Here To Download</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
