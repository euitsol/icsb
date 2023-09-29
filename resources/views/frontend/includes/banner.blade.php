<section class="banner-section">
    @if(isset($banner_video) && isset(json_decode($banner_video->saved_data)->{'upload-video'}) && isset(json_decode($banner_video->saved_data)->{'banner-title'}))
        <div class="video-container">
            <div class="content">
                <h3>{{ json_decode($banner_video->saved_data)->{'banner-title'} }}</h3>
                <div class="button d-flex justify-content-center">
                    <a href="javascript:voide(0)" type="button">ADMIT AS <br> STUDENT</a>
                    <a href="javascript:voide(0)" type="button">REGISTER AS <br> MEMBER</a>
                    <a href="javascript:voide(0)" type="button">OBTAIN CS <br> PRACTICE LICENSE</a>
                </div>
            </div>

                <video autoplay loop muted id="myVideo" class="video-banner">
                    <source src="{{ route('banner-video.show', base64_encode(json_decode($banner_video->saved_data)->{'upload-video'})) }}" type="video/mp4">
                </video>

            <progress id="videoProgress" value="0" max="100"></progress>
            <button id="volumeButton" class="volume-icon"><i class="fas fa-volume-xmark" id="icon"></i></button>
            <button id="playPauseButton" class="play-pause-icon"><i class="fas fa-pause"></i></button>
        </div>
    @else
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                @if(isset($banner->images))
                    @foreach ($banner->images as $key=>$image)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="@if($key == 0) active @endif" aria-current="@if($key == 0) true @endif" aria-label="Slide {{$key+1}}"></button>
                    @endforeach
                @else
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @endif
            </div>
            <div class="carousel-inner">
                @if(isset($banner->images))
                    @foreach ($banner->images as $key=>$image)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <img src="{{ storage_url($image->image) }}" class="d-block w-100" alt="{{ $banner->banner_name }}">
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                        <img src="{{asset('no_img/no_img.jpg')}}" class="d-block w-100" alt="...." style="height: 67vh">
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif


    <aside class="socila-media-sidebar">
        <div class="social-link-wrapper">
            <ul>
                <li class="active search_button">
                    <span >{{_('Search')}}</span>
                    <a href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                @if(!empty($contact->social))
                    @foreach (json_decode($contact->social) as $social)
                        <li>
                            <span>{{extractStringFromUrl($social->link)}}</span>
                            <a href="{{$social->link}}" target="_blank"><i class="{{$social->icon}}"></i></a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </aside>
</section>
