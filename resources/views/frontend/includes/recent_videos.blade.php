@if(count($recent_videos))
<section class="recent-video-section big-sec-height d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="section-heading text-align">
				<h2 class="title black-color text-center">Recent Videos</h2>
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
@endif
