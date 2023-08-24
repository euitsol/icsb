@extends('frontend.master')

@section('title', 'CS Hand Book')

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
                                'javascript:void(0)'=>'Students',
                            ]
                ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <!--============================= Handbok Section ==================-->
    <section class="cs-handbook-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 the_cs mb-5">
                    <div class="new-handbook text-align">
                        {{-- <a href="
                        {{
                            (isset(json_decode($single_page->saved_data)->{'file-1'})) ?
                            (route('sp.file.download', base64_encode(json_decode($single_page->saved_data)->{'file-1'}))) :
                            '#'
                        }}
                            " target="_blank"><h3>{{_('Download PDF File')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a> --}}

                            <iframe src="{{ storage_url(json_decode($single_page->saved_data)->{'file-1'}) }}" width="100%" height="500px"></iframe>
                    </div>
                </div>

                <div class="col-md-6 the_cs mb-5">
                    <div class="new-handbook text-align">

                        {{-- <a href="
                        {{
                            (isset(json_decode($single_page->saved_data)->{'file-2'})) ?
                            (route('sp.file.download', base64_encode(json_decode($single_page->saved_data)->{'file-2'}))) :
                            '#'
                        }}
                            " target="_blank"><h3>{{_('Download PDF File')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a> --}}

                            <iframe src="{{ storage_url(json_decode($single_page->saved_data)->{'file-2'}) }}" width="100%" height="500px"></iframe>
                    </div>
                </div>
                <div class="col-md-6 the_cs mb-5">
                    <div class="new-handbook text-align">
                        {{-- <a href="
                        {{
                            (isset(json_decode($single_page->saved_data)->{'file-3'})) ?
                            (route('sp.file.download', base64_encode(json_decode($single_page->saved_data)->{'file-3'}))) :
                            '#'
                        }}
                            " target="_blank"><h3>{{_('Download PDF File')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a> --}}

                        <iframe src="{{ storage_url(json_decode($single_page->saved_data)->{'file-3'}) }}" width="100%" height="500px"></iframe>
                    </div>
                </div>
                <div class="col-md-6 the_cs mb-5">
                    <div class="new-handbook text-align">
                        {{-- <a href="
                        {{
                            (isset(json_decode($single_page->saved_data)->{'file-4'})) ?
                            (route('sp.file.download', base64_encode(json_decode($single_page->saved_data)->{'file-4'}))) :
                            '#'
                        }}
                            " target="_blank"><h3>{{_('Download PDF File')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a> --}}

                        <iframe src="{{ storage_url(json_decode($single_page->saved_data)->{'file-4'}) }}" width="100%" height="500px"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
