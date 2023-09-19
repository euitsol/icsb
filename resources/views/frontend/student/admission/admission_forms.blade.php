@extends('frontend.master')

@section('title', 'Admission Form')

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
    <!--============================= Handbok Section ==================-->
    <section class="cs-handbook-section section-padding">
        <div class="container">
            <div class="row">
                @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
                    @foreach (json_decode($single_page->saved_data)->{'upload-files'} as $file)
                        <div class="col-md-6 the_cs mb-5 mx-auto">
                            <div class="new-handbook text-align">
                                <iframe src="{{ route('view.pdf', base64_encode($file)) }}" type="application/pdf" width="100%" height="500px"></iframe>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
@endsection
