@extends('frontend.master')

@section('title', 'Act')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/rules.jpg');
$title = stringLimit(($view_act->title),30,'...');;
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
                <div>
                    <iframe src="{{ (!empty(json_decode($view_act->file))) ? (storage_url(json_decode($view_act->file)->file_path)) : '' }}" width="100%" height="700px"></iframe>
                </div>
                <div class="button">
                    @if(!empty(json_decode($view_act->file)))
                        <a href="{{route('view.download',base64_encode(json_decode($view_act->file)->file_path))}}"><i class="fa-solid fa-cloud-arrow-down"></i>Click Here To Download</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
