@extends('frontend.master')

@section('title', 'CS Hand Book')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        <div class="overly-image">
            @if(!empty($csHandBook) && !empty(json_decode($csHandBook->saved_data)) && isset(json_decode($csHandBook->saved_data)->{"banner-image"}))
            <img src='{{storage_url(json_decode($csHandBook->saved_data)->{"banner-image"})}}' alt="{{$csHandBook->title}}">
            @endif
        </div>
        <div class="container">
            <div class="breadcrumbs-row flex">
            <div class="left-column content-column">
                <div class="inner-column color-white">
                    <h1 class="breadcrumbs-heading">{{$csHandBook->title}}</h1>
                    <ul class="flex">
                        <li><a href="index">{{_('Home')}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="#">{{_('Students')}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><p>{{$csHandBook->title}}</p></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
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
