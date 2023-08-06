@extends('frontend.master')

@section('title', $single_page->title)

@section('content')
@php
    $saved_data = json_decode($single_page->saved_data);
    $form_data = json_decode($single_page->form_data);
@endphp

<!----============================= Breadcrumbs Section ========================---->
    <section class="breadcrumbs-section">
        @if(isset($saved_data->{'banner-image'}))
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
            @if (isset($saved_data->{'single-file'}))
                <div class="global-table">
                    <table>
                        <tr>
                            <th>Icon</th>
                            <th>File</th>
                            <th>Download</th>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('frontend/img/Folder_Icon.svg') }}" alt="" style="height: 1.5rem;"></td>
                            <td><span> {{file_name_from_url($saved_data->{'single-file'})}} </span></td>
                            <td><a href="{{ route('sp.file.download', base64_encode($saved_data->{'single-file'})) }}" target="_blank"><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                        </tr>
                    </table>
                </div>
            @endif
            @if (isset($saved_data->{'multiple-file'}) && is_array($saved_data->{'multiple-file'}) && (collect($saved_data->{'multiple-file'})->count() > 0) )
            <div class="global-table">
                <table>
                    @if (!isset($saved_data->{'single-file'}))
                    <tr>
                        <th>Icon</th>
                        <th>File</th>
                        <th>Download</th>
                    </tr>
                    @endif
                    @foreach ($saved_data->{'multiple-file'} as $url)
                    <tr>
                        <td><img src="{{ asset('frontend/img/Folder_Icon.svg') }}" alt="" style="height: 1.5rem;"></td>
                        <td><span> {{file_name_from_url($url)}} </span></td>
                        <td><a href="{{ route('sp.file.download', base64_encode($url)) }}" target="_blank"><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>

            @endif
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
