@extends('frontend.master')

@section('title', 'CS Hand Book')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = '';
        $title = $csHandBook->title;
        if(isset(json_decode($csHandBook->saved_data)->{"banner-image"})){
            $banner_image = storage_url(json_decode($csHandBook->saved_data)->{"banner-image"});
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
            <div class="handbook-column flex">
                <div class="new-handbook text-align">

                        <a href="
                            {{
                                (!empty(json_decode($csHandBook->saved_data)->{'new-student-hand-book-pdf'})) ?
                                (route('sp.file.download', base64_encode(json_decode($csHandBook->saved_data)->{'new-student-hand-book-pdf'}))) :
                                '#'
                            }}
                        " target="_blank"><h3>{{_('New Students Handbook')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a>



                    <iframe src="{{ storage_url(json_decode($csHandBook->saved_data)->{'new-student-hand-book-pdf'}) }}" width="100%" height="700px"></iframe>
                </div>
                <div class="old-handbook text-align">

                        <a href="
                            {{
                                (!empty(json_decode($csHandBook->saved_data)->{'old-student-hand-book-pdf'})) ?
                                (route('sp.file.download', base64_encode(json_decode($csHandBook->saved_data)->{'old-student-hand-book-pdf'}))) :
                                '#'
                            }}
                        " target="_blank"><h3>{{_('Old Students Handbook')}} <i class="fa-solid fa-cloud-arrow-down"></i></h3></a>
                    <iframe src="{{ storage_url(json_decode($csHandBook->saved_data)->{'old-student-hand-book-pdf'}) }}" width="100%" height="700px"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
