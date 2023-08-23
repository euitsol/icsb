@extends('frontend.master')

@section('title', 'Exam FAQ')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/examination.jpg');
$title = 'Exam FAQs';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Examination',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<!----============================= FAQ Section ========================---->
	<section class="faq-section">
		<div class="container">
			<div class="heading-content text-align">
				<h1 class="common-heading">{{_('Exam Frequently Asked Questions')}}</h1>
			</div>
			<div class="faq-content">
				<div class="left-column">
					<div class="accordion" id="accordionExample">
                        @php
                            $check = count($faqs)/2;
                        @endphp
                        @foreach ($faqs as $key=>$faq)
                            @if ($key<$check)

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{$key}}">
                                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}">
                                            {{$faq->title}}
                                        </button>
                                    </h2>
                                <div id="collapseOne{{$key}}" class="accordion-collapse collapse @if($key == 0)show @endif" aria-labelledby="headingOne{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->description !!}
                                    </div>
                                </div>
                                </div>
                            @endif
                        @endforeach
					</div>
				</div>
				<div class="right-column">
					<div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($faqs as $key=>$faq)
                            @if ($key>=$check)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{$key}}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{$key}}" aria-expanded="false"
                                            aria-controls="flush-collapseOne{{$key}}">
                                            {{ $faq->title }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{$key}}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne{{$key}}" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
					</div>
				</div>

			</div>
		</div>
	</section>

@endsection
