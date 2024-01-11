@extends('frontend.master')

@section('title', 'Previous Questions')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/examination.jpg');
        $title = 'Previous Questions';
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Examination',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
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
                @foreach ($sqps as $key=>$sqp)
                    <div class="library-item flex">
                        <div class="left-column">
                            <ul class="flex">
                                <li>{{str_pad(($key+1), 2, '0', STR_PAD_LEFT)}}</li>
                                <li><a href="{{route('examination.sqp_view',$sqp->slug)}}">
                                        {{$sqp->title}}
                                    </a></li>
                            </ul>
                        </div>
                        <div class="right-column">
                            <li><a href="{{route('examination.sqp_view',$sqp->slug)}}" class="btn btn-outline-secondary">{{_('View Questions')}}</a></li>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
