@extends('frontend.master')

@section('title', $single_page->title)

@section('content')
@php
    $saved_data = json_decode($single_page->saved_data);
    $form_data = json_decode($single_page->form_data);
@endphp

<!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        @if($saved_data->{'banner-image'})
        <div class="overly-image">
            <img src="{{storage_url($saved_data->{'banner-image'})}}" alt="Banner Image">
        </div>
        @endif
        <div class="container">
            <div class="breadcrumbs-row flex">
                <div class="left-column content-column">
                    <div class="inner-column color-white">
                        <h1 class="breadcrumbs-heading">{{ _($single_page->title)}}</h1>
                        <ul class="flex">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><i class="fa-solid fa-angle-right"></i></li>
                            <li><a href="#">{{ _($single_page->title)}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="global-page-section">
        <div class="container">
            <div class="global-row flex">
                <div class="left-column">
                    @if (isset($saved_data->{'page-description'}))
                        {!! $saved_data->{'page-description'} ?? '' !!}
                    @endif
                </div>
                <div class="right-column">

                    @if (isset($saved_data->{'page-image'}))
                        <img src="{{ storage_url($saved_data->{'page-image'}) }}">
                    @endif

                </div>
            </div>
            <div class="global-table">
                <table>
                    <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Download</th>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('frontend/img/pdf/pdf-icon.svg') }}" alt=""></td>
                        <td><span>Mr Ronald Chung, Assistant Manager</span></td>
                        <td><a href=""><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('frontend/img/pdf/pdf-icon.svg') }}" alt=""></td>
                        <td><span>Mr Ronald Chung, Assistant Manager</span></td>
                        <td><a href=""><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('frontend/img/pdf/pdf-icon.svg') }}" alt=""></td>
                        <td><span>Mr Ronald Chung, Assistant Manager</span></td>
                        <td><a href=""><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                    </tr>
                </table>
            </div>
<!--=============================== Gallery Section ========================== -->
            <div class="gallery-section global-gallery-section">
                <div class="gallery-content">
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-one.png"></a>
                    </div>
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-two.png"></a>
                    </div>
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-three.png"></a>
                    </div>
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-four.png"></a>
                    </div>
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-five.png"></a>
                    </div>
                    <div class="gallery-items">
                        <a href=""><img src="assets/img/gallery/gallery-six.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
