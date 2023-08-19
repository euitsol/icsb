@extends('frontend.master')

@section('title', 'Media Rooms')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        <div class="overly-image">
            <img src="{{asset('frontend/img/breadcumb/Board-Meeting.jp')}}" alt="Board of Directors Meeting">
        </div>
        <div class="container">
            <div class="breadcrumbs-row flex">
                <div class="left-column content-column">
                    <div class="inner-column color-white">
                        <h1 class="breadcrumbs-heading">{{$view_bss->short_title}}{{_(': ')}}{{$view_bss->title}}</h1>
                        <ul class="flex">
                            <li><a href="index">{{_('Home')}}</a></li>
                            <li><i class="fa-solid fa-angle-right"></i></li>
                            <li><a href="#">{{_('Rules')}}</a></li>
                            <li><i class="fa-solid fa-angle-right"></i></li>
                            <li><p>{{$view_bss->short_title}}{{_(': ')}}{{$view_bss->title}}</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
