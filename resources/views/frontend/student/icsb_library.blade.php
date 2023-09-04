@extends('frontend.master')

@section('title', 'ICSB Library')
@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/students.jpg');
$title = 'ICSB Library';
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
<!----============================= Library Section ========================---->
{{-- <section class="py-5 mb-5 library-section">
    <div class="container">
        <div class="row py-5">
            <div class="col">
                <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Repellat repudiandae,
                    consectetur enim accusamus doloremque illo
                    consequuntur nam deleniti itaque ea optio
                    voluptate ab quasi praesentium ullam nihil
                    pariatur tempore a blanditiis autem cupiditate?
                    Ipsum adipisci ea odio laboriosam, vero quas et
                    eum iusto esse expedita maiores voluptatem
                    fugiat quos eos velit quis enim beatae
                    perferendis quo. Repellendus nemo dolorum
                    quibusdam nisi consequatur fugit porro, et
                    libero, quod, perferendis magni! Itaque eligendi
                    sunt tempora provident reiciendis reprehenderit
                    eveniet placeat pariatur, ipsa labore. Dolore
                    asperiores quidem soluta accusamus repellendus
                    odio nisi quis nihil? Laboriosam dicta totam quo
                    deleniti eligendi non necessitatibus et!
                </p>
            </div>
        </div>
        <div class="library-imges row row-gap-4 m-auto">
            <div class="col-6">
                <a
                    class="demo col-12"
                    href="{{asset('frontend/img/library/image1.jpeg')}}"
                    data-lightbox="gallery"
                >
                    <img
                        class="example-image"
                        src="{{asset('frontend/img/library/image1.jpeg')}}"
                        alt="image-1"
                    />
                </a>
            </div>
            <div class="col-6">
                <a
                    class="demo col-12"
                    href="{{asset('frontend/img/library/image2.jpeg')}}"
                    data-lightbox="gallery"
                >
                    <img
                        class="example-image"
                        src="{{asset('frontend/img/library/image2.jpeg')}}"
                        alt="image-1"
                    />
                </a>
            </div>
            <div class="col-6">
                <a
                    class="demo col-12"
                    href="{{asset('frontend/img/library/image3.jpeg')}}"
                    data-lightbox="gallery"
                >
                    <img
                        class="example-image"
                        src="{{asset('frontend/img/library/image3.jpeg')}}"
                        alt="image-1"
                    />
                </a>
            </div>
            <div class="col-6">
                <a
                    class="demo col-12"
                    href="{{asset('frontend/img/library/image4.jpeg')}}"
                    data-lightbox="gallery"
                >
                    <img
                        class="example-image"
                        src="{{asset('frontend/img/library/image4.jpeg')}}"
                        alt="image-1"
                    />
                </a>
            </div>
        </div>
    </div>
</section> --}}
<section class="py-5 mb-5 library-section">
    <div class="container">
        <div class="row py-5">
            <div class="col">
                @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                    {!! (json_decode($single_page->saved_data)->{'page-description'}) !!}
                @endif
            </div>
        </div>
        <div class="library-imges row row-gap-4 m-auto">
            @php
                $images = json_decode($single_page->saved_data)->{'page-images'};
            @endphp
            @if (isset($images))
                @foreach ($images as $image)
                <div class="col-6">
                    <a
                        class="demo col-12"
                        href="{{ storage_url($image) }}"
                        data-lightbox="gallery"
                    >
                        <img
                            class="example-image"
                            src="{{ storage_url($image) }}"
                            alt="image-1"
                        />
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
