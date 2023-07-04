@extends('frontend.master')

@section('title', 'Council')

@section('content')
    <!--=============================== Bredcum Section ========================== -->

    <section class="bredcum-section">
        <div class="container">
            <div class="bredcum-content text-align">
                <p><a href="{{ route('home') }}">Home</a>| faq</p>
            </div>
        </div>
    </section>

    <!--============================= Start FAQ Section ========================-->
    <section class="faq-section">
        <div class="container">
            <div class="heading-content text-align">
                <h1 class="common-heading">Frequently Asked Questions</h1>
            </div>
            <div class="faq-content">
                <div class="left-column">
                    <div class="accordion" id="accordionExample">
                        @forelse ($faqs as $key=>$faq)
                            @if ($key % 2 == 0)

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{$key}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}">
                                            {{$faq->title}}
                                        </button>
                                    </h2>
                                <div id="collapseOne{{$key}}" class="accordion-collapse collapse show" aria-labelledby="headingOne{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$faq->description}}
                                    </div>
                                </div>
                                </div>

                            @else
                                @continue
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="right-column">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @forelse ($faqs as $key=>$faq)
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
                            @else
                                @continue
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================= End FAQ Section ========================-->
@endsection
