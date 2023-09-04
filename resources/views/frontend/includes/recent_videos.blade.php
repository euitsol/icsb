{{-- @if(count($recent_videos))
<section class="recent-video-section big-sec-height">
	<div class="container">
		<div class="row">
			<div class="section-heading text-align">
				<h2 class="title black-color text-center title-shap">Recent Videos</h2>
			</div>
		</div>
		<div class="row videos-row">
            @foreach ($recent_videos as $video)
                <div class="col-sm-6  col-md-3 video-column">
                    <div class="video-inner-col">
                        <div class="video">
                            {!! getYoutubeVideoIframe($video->video_url) !!}
                            <div class="video-title">
                                <p>{!! $video->title !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

		</div>
	</div>
</section>
@endif --}}


@if(count($recent_videos))
<section class="recent-video-section z-index big-sec-height">
    <div class="container">
        <div class="row">
            <div class="section-heading text-align">
                <h2 class="title black-color text-center title-shap">
                    {{_('Recent Videos')}}
                </h2>
            </div>
        </div>
        <div class="recent-video-carousel ">
            <div class="carousel-indicators">
                @foreach ($recent_videos as $key=>$video)
                    <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="{{$key}}" class="{{($key==0)?'active':''}}"
                    aria-current="true" aria-label="Slide {{$key+1}}"></button>
                @endforeach
            </div>
            <div class="recent-video-slider row videos-row owl-carousel owl-theme">
                @foreach ($recent_videos as $video)
                    <div class="col-sm-6 col-md-3 video-column item">
                        <div class="video-inner-col">
                            <div class="video">
                                {!! getYoutubeVideoIframe($video->video_url) !!}
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
