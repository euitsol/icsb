@extends('frontend.master')

@section('title', 'ICSB Profile')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/about_cs.jpg');
        $title = $single_page->title;
        if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
            $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
        }
        $datas = [
                    'image'=>$banner_image,
                    'title'=>$title,
                    'paths'=>[
                                'home'=>'Home',
                                'javascript:void(0)'=>'About CS',
                            ]
                ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<!----======================== About Us Section =======================---->
	<section class="about-us-section big-sec-height">
		<div class="container">
			<div class="about-us-row flex">
				<div class="image-column">
                    @if (isset(json_decode($single_page->saved_data)->{'back-image'}))
                        <img class="first-image" src="{{storage_url(json_decode($single_page->saved_data)->{'back-image'})}}" alt="{{$single_page->title}}">
                    @endif
					<div class="box-image">
                        @if (isset(json_decode($single_page->saved_data)->{'front-image'}))
						    <img class="second-image" src="{{storage_url(json_decode($single_page->saved_data)->{'front-image'})}}" alt="{{$single_page->title}}">
                        @endif
					</div>
				</div>
				<div class="content-column content-description">
                    @if (isset(json_decode($single_page->saved_data)->{'page-description'}))
                        {!! json_decode($single_page->saved_data)->{'page-description'} !!}
                    @endif
				</div>
			</div>
		</div>
	</section>
    {{-- @include('frontend.includes.endorsement')
    @include('frontend.includes.bss',['home_bsss'=>$home_bsss])
    @include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss]) --}}

@endsection
