@extends('frontend.master')

@section('title', 'FAQ')

@section('content')
<section class="breadcrumbs-section">
	<div class="overly-image">
		<img src="{{asset('frontend/img/breadcumb/faqs-background.jpg')}}" alt="">
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">FAQs</h1>
				<ul class="flex">
					<li><a href="index">Home</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">About ICSB</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>Faqs</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>

<!----============================= FAQ Section ========================---->
	<section class="faq-section">
		<div class="container">
			<div class="heading-content text-align">
				<h1 class="common-heading">Frequently Asked Questions</h1>
			</div>
			<div class="faq-content">
				<div class="left-column">
					<div class="accordion" id="accordionExample">
                        @foreach ($faqs as $key=>$faq)
                            @if ($key % 2 == 0)

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{$key}}">
                                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}">
                                            {{$faq->title}}
                                        </button>
                                    </h2>
                                <div id="collapseOne{{$key}}" class="accordion-collapse collapse @if($key == 0)show @endif" aria-labelledby="headingOne{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$faq->description}}
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
                            @if ($key % 2 != 0)
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
                                        <div class="accordion-body">{{ $faq->description }}</div>
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
