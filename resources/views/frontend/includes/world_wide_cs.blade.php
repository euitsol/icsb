<section class="cs-wide-section">
    <div class="container">
        <div class="content">
            <div class="heading-element text-align">
                <h2 class="colo-black">World Wide CS</h2>
            </div>
            <div class="logo-carousel">
                <div class="cs-wide-slider owl-carousel owl-theme">
                    @foreach ($wwcss as $wwcs)
                        <div class="item">
                            <div class="logo-wrapp">
                                <img src="{{storage_url($wwcs->logo)}}" alt="{{$wwcs->title}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
