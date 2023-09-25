@if(count($recent_videos))
<section class="recent-video-section z-index small-sec-height">
    <div class="container">
        <div class="row">
            <div class="section-heading text-align wow fadeInLeftBig">
                <h2 class="title black-color text-center title-shap">
                    {{_('Recent Videos')}}
                </h2>
            </div>
        </div>
        <div class="recent-video-carousel ">
            <div class="recent-video-slider owl-carousel owl-theme wow fadeInUpBig">
                @foreach ($recent_videos as $video)
                        <div class="item">

                            <div class="video">
                                <x-embed url="{{$video->url}}" />
                                <div class="video-title">
                                    {!! $video->title !!}
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


