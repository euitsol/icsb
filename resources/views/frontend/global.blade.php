@extends('frontend.master')

@section('title', $single_page->title)

@section('content')
@php
    $saved_data = json_decode($single_page->saved_data);
    $form_data = json_decode($single_page->form_data);
    if (isset($saved_data->{'page-description'}) ){
        $count = strlen(strip_tags($saved_data->{'page-description'}));
    }

@endphp
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = '';
if(isset($saved_data->{'banner-image'}) && !empty($saved_data->{'banner-image'})){
    $banner_image = storage_url($saved_data->{'banner-image'});
}
$title = $single_page->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="global-page-section big-sec-min-height">
        <div class="container">
            <div class="global-row flex
            @if (isset($saved_data->{'page-description'}) && $count>1700 || empty($saved_data->{'page-image'})) flex-column-reverse @endif
            ">
                <div class="left-column content-description @if (isset($saved_data->{'page-description'}) && $count>1700 || empty($saved_data->{'page-image'})) w-100 @endif">
                    @if (isset($saved_data->{'page-description'}))
                        {!! $saved_data->{'page-description'} ?? '' !!}
                    @endif
                </div>
                @if (isset($saved_data->{'page-image'}))
                <div class="right-column @if (isset($saved_data->{'page-description'}) && $count>1700 || empty($saved_data->{'page-image'}))  w-100 mb-5  @endif"
                    style="max-height:600px !important;"
                    >
                    
                        <img class="img-fluid object-fit-contain" style="max-height:600px !important; @if (isset($saved_data->{'page-description'}) && $count>1700 ) border:0; outline:none; @endif" src="{{ storage_url($saved_data->{'page-image'}) }}">
                    

                </div>
                @endif
            </div>
            @if (isset($saved_data->{'upload-file'}))
                <div class="global-table">
                    <table>
                        <tr>
                            <th>Icon</th>
                            <th>File</th>
                            <th>Download</th>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('frontend/img/Folder_Icon.svg') }}" alt="" style="height: 1.5rem;"></td>
                            <td><span> {{file_name_from_url($saved_data->{'upload-file'})}} </span></td>
                            <td><a href="{{ route('sp.file.download', base64_encode($saved_data->{'upload-file'})) }}" target="_blank"><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                        </tr>
                    </table>
                </div>
            @endif
            @if (isset($saved_data->{'upload-files'}) && is_array($saved_data->{'upload-files'}) && (collect($saved_data->{'upload-files'})->count() > 0) )
            <div class="global-table">
                <table>
                    @if (!isset($saved_data->{'upload-file'}))
                    <tr>
                        <th>Icon</th>
                        <th>File</th>
                        <th>Download</th>
                    </tr>
                    @endif
                    @foreach ($saved_data->{'upload-files'} as $url)
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
            {{-- <div class="gallery-section global-gallery-section">
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
            </div> --}}
        </div>
    </section>
@endsection
