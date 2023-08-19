@if(count($media_rooms)>0)
<section class="recent-update-section">
    <div class="container">
        <div class="recent-update-row">
            <div class="section-heading text-align">
                <h2>Most Recent Updates</h2>
            </div>
            <div class="logo-carousel">
                <div class="recent-update-slider owl-carousel owl-theme">
                    @foreach ($media_rooms as $media_room)
                        <div class="item">
                            <div class="logo-wrapp">
                                <a href="{{route('media_room_view.view',$media_room->slug)}}" class="w-100"><img class="w-100" src="{{ storage_url($media_room->thumbnail_image) }}" alt="{{$media_room->title}}"></a>
                                <div class="post-content">
                                    <ul>
                                        <li><a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a></li>
                                        <li><a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d-M-Y', strtotime($media_room->created_at))}}</a></li>
                                    </ul>
                                    <h3>
                                        <a href="{{route('media_room_view.view',$media_room->slug)}}">{{ stringLimit($media_room->title, 30,'...')}}</a>
                                    </h3>
                                    <p> {!! stringLimit(html_entity_decode_table($media_room->description)) !!} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="see-button text-align d-block">
                <a href="{{route('media_room_view.all')}}">See All Updates</a>
            </div>
        </div>
    </div>
</section>
@endif
