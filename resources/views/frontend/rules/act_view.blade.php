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
           <div class="row">
                @foreach (json_decode($view_act->files) as $file)
                <div class="col-md-6 the_cs mb-5 mx-auto">
                    <div class="new-handbook text-align">
                            {{-- <iframe src="{{ route('view.pdf', base64_encode($file->file_path)) }}" type="application/pdf" width="100%" height="400px"></iframe> --}}
                            <iframe src ="{{ pdf_storage_url($file->file_path) }}" width="100%" height="500px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file->file_path))}}"><h3 > {{ucfirst(str_replace('-', ' ', Str::before(basename($file->file_path), '.pdf')))}}</h3></a>
                    </div>
                </div>
                @endforeach
           </div>
        </div>
    </section>
@endsection
