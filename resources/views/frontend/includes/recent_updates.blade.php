@if(count($media_rooms)>0)
<section class="recent-update-section big-sec-min-height">
    <div class="container">
        <div class="recent-update-row">
            <div class="section-heading text-align wow fadeInRightBig">
                <h2 class="title-shap">Most Recent Updates</h2>
            </div>
            <div class="logo-carousel">
                <div class="recent-update-slider owl-carousel owl-theme wow fadeInDownBig">
                    @foreach ($media_rooms as $media_room)
                        <div class="item">
                            <div class="logo-wrapp">
                                <a href="{{route('media_room_view.view',$media_room->slug)}}" class="w-100"><img class="w-100" src="{{ storage_url($media_room->thumbnail_image) }}" alt="{{$media_room->title}}" loading="lazy"></a>
                                <div class="post-content">
                                    <ul>
                                        <li><i class="fa-solid fa-file-import"></i>Latest News</li>
                                        <li><i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($media_room->program_date))}}</li>
                                    </ul>
                                    <div class="content">
                                        <h3>
                                            <a href="{{route('media_room_view.view',$media_room->slug)}}">{{ stringLimit($media_room->title, 80,'...')}}</a>
                                        </h3>
                                    </div>
                                    {{-- <p> {!! stringLimit(html_entity_decode_table($media_room->description), 46) !!} </p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="see-button text-align d-block wow fadeInLeftBig">
                <a href="{{route('media_room_view.all')}}">{{_('See All Updates')}}</a>
            </div>
        </div>
    </div>
</section>
@endif
