@if(count($blogs)>0)
<section class="recent-update-section">
    <div class="container">
        <div class="recent-update-row">
            <div class="section-heading text-align">
                <h2>Most Recent Updates</h2>
            </div>
            <div class="logo-carousel">
                <div class="recent-update-slider owl-carousel owl-theme">
                    @foreach ($blogs as $blog)
                        <div class="item">
                            <div class="logo-wrapp">
                                <a href="#"><img src="{{ storage_url($blog->thumbnail_image) }}" alt="{{$blog->title}}"></a>
                                <div class="post-content">
                                    <ul>
                                        <li><a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a></li>
                                        <li><a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d-M-Y', strtotime($blog->created_at))}}</a></li>
                                    </ul>
                                    <h3><a href="#">{{ stringLimit($blog->title, 30,'...')}} </a></h3>
                                    <p>{{stringLimit($blog->description, 60,'...')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="see-button text-align d-block">
                <a href="#">See All Updates</a>
            </div>
        </div>
    </div>
</section>
@endif
