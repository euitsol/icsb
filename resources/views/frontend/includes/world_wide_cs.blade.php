<section class="cs-wide-section small-sec-height">
    <div class="container">
        <div class="content">
            <div class="heading-element text-align wow fadeInLeftBig">
                <h2 class="colo-black title-shap">{{_('World Wide CS')}}</h2>
            </div>
            <div class="logo-carousel">
                <div class="cs-wide-slider owl-carousel owl-theme wow fadeInUpBig">
                    @forelse ($wwcss as $wwcs)
                        <a href="{{$wwcs->url}}" target="_blank">
                            <div class="item">
                                <img src="{{storage_url($wwcs->logo)}}" alt="{{$wwcs->title}}">
                            </div>
                        </a>
                    @empty
                        <div class="item">
                            <img src="{{ asset('no_img/no_img.jpg') }}" alt=".....">
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
