@extends('frontend.master')

@section('title', 'The Chartered Secretary')

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
    <!--============================= Handbok Section ==================-->
    <section class="cs-handbook-section section-padding">
        <div class="container">
            <div class="row">
                @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
                @php
                    $files = array_reverse((array)json_decode($single_page->saved_data)->{'upload-files'});
                @endphp
                    @foreach ($files as $file)
                        <div class="col-md-3 the_cs mb-5">
                            <div class="new-handbook text-align">
                                    <iframe src="{{ route('view.pdf', base64_encode($file)) }}" type="application/pdf" width="100%" height="200px"></iframe>
                                    <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file))}}"><h3> {{ucfirst(str_replace('-', ' ', Str::before(basename($file), '.pdf')))}}</h3></a>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
@endsection
