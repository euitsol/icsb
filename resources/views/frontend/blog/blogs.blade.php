@extends('frontend.master')

@section('title', 'Blogs')

@section('content')
    <!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        <div class="overly-image">
            <img src="{{ asset('frontend/img/breadcumb/Event-Management-Proposal.jpg') }}" alt="All Events">
        </div>
        <div class="container">
            <div class="breadcrumbs-row flex">
                <div class="left-column content-column">
                    <div class="inner-column color-white">
                        <h1 class="breadcrumbs-heading">Blogs</h1>
                        <ul class="flex">
                            <li><a href="index">Home</a></li>
                            <li><i class="fa-solid fa-angle-right"></i></li>
                            <li><a href="#">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="blog-section">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="logo-wrapp">
                            <a href="{{route('blog_view.view',$blog->slug)}}"><img src="{{storage_url($blog->thumbnail_image)}}" alt="..." /></a>
                            <div class="post-content">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($blog->created_at))}}</a>
                                    </li>
                                </ul>
                                <h3><a href="{{route('blog_view.view',$blog->slug)}}">{{$blog->title}}</a></h3>
                                <p>{{ stringLimit(html_entity_decode_table($blog->description)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="see-button text-align">
                <a href="#">See More Post</a>
            </div>
        </div>
    </div>
@endsection
