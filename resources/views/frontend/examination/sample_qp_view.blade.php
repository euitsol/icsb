@extends('frontend.master')

@section('title', 'Previous Questions')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/examination.jpg');
        $title = stringLimit($sqp->title,23,'...');
        $datas = [
                    'image'=>$banner_image,
                    'title'=>$title,
                    'paths'=>[
                                'home'=>'Home',
                                'javascript:void(0)'=>'Examination',
                                'examination.sqp' => 'Previous Questions',
                            ]
                ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="library-section big-sec-min-height">
        <div class="container">
            {{-- <div class="search-row flex">
                <div class="search-form">
                    <form class="search-form">
                        <input class="search-input" type="text" placeholder="Search..." required>
                        <button class="search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </form>
                </div>
            </div> --}}
                <div class="library-row">
                    @foreach (json_decode($sqp->files) as $key=>$file)
                    <div class="library-item flex">
                        <div class="left-column">
                            <ul class="flex">
                                <li>{{str_pad(($key+1), 2, '0', STR_PAD_LEFT)}}</li>
                                <li><a target="_blank" href="{{route('sp.file.download', base64_encode($file->file_path))}}">
                                    {{$file->file_name}}
                                </a></li>
                            </ul>
                        </div>
                        <div class="right-column">
                            <li><a href="{{route('view.download',base64_encode($file->file_path))}}"><i class="fa-solid fa-cloud-arrow-down"></i></a></li>
                        </div>
                    </div>
                    @endforeach

                </div>
        </div>
    </section>
@endsection
