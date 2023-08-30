@extends('frontend.master')

@section('title', 'Convocation')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = "ICSB Convocation Souvenir";
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Publications',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <section class="library-section big-sec-min-height">
        <div class="container">
            <div class="row">
                @foreach ($convocations as $convocation)
                    <div class="col-md-3 mb-4">
                        <div class="item">
                            <a class="demo col-12"
                                href="{{ $convocation->file ? route('sp.file.download', base64_encode($convocation->file)) : storage_url($convocation->image) }}"
                                @if (empty($convocation->file)) data-lightbox="gallery" @else target="_blank" @endif>
                                <img class="example-image" src="{{ storage_url($convocation->image) }}" alt="{{ $convocation->title }}" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
