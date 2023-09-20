@if(count($recent_videos))
<section class="recent-video-section z-index small-sec-height">
    <div class="container">
        <div class="row">
            <div class="section-heading text-align">
                <h2 class="title black-color text-center title-shap">
                    {{_('Recent Videos')}}
                </h2>
            </div>
        </div>
        <div class="recent-video-carousel ">
            <div class="recent-video-slider row videos-row owl-carousel owl-theme">
                @foreach ($recent_videos as $video)
                    <div class="col-sm-6 col-md-3  item">
                        <div class="video-inner-col">
                            <div class="video">
                                <x-embed url="{{$video->url}}" />
                                <div class="video-title">
                                    {!! $video->title !!}
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
