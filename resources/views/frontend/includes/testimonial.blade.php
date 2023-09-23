@if(count($testimonials))
<section class="testimonial-section big-sec-height">
    <div class="container">
        <div class="heading-element text-align">
            <h2 class="colo-black title-shap">{{_('Quotes')}}</h2>
        </div>
        <div class="testimonial-carousel">
            <div class="testimonial-slider owl-carousel owl-theme">
                @foreach ($testimonials as $testimonial)
                    <div class="item">
                        <div class="testimonial d-flex flex-column justify-content-center">
                        <div class="content mb-4">
                            <p>{!! $testimonial->description !!}</p>
                        </div>
                        <div class="details d-flex justify-content-center align-items-center">
                            <div class="author-image">
                                <img src="{{storage_url($testimonial->image)}}" alt="">
                            </div>
                            <div class="author d-flex flex-column text-start">
                                <h3 class="author-name">{{ $testimonial->name }}</h3>
                                <h5 class="author-designation">{{ $testimonial->designation }}</h5>
                                <h5 class="author-designation">{{ $testimonial->responsibility }}</h5>
                            </div>


                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
