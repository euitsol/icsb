<section class="national-connection-section small-sec-height">
    <div class="container">
        <div class="content">
            <div class="heading-element text-align">
                <h2 class="colo-black title-shap">{{_('National Connections')}}</h2>
            </div>
            <div class="logo-carousel">
                <div class="nation-slider owl-carousel owl-theme">
                    @forelse ($national_connections as $connection)
                    <div class="item">
                        <div class="logo-wrapp">
                            <a class='fa-beat-fade' href="{{$connection->url}}"><img src="{{ storage_url($connection->logo) }}"></a>
                            <h3>{{$connection->title}}</h3>
                        </div>
                    </div>
                    @empty
                    <div class="item">
                        <div class="logo-wrapp">
                            <a class='fa-beat-fade' href=""><img src="{{ asset('no_img/no_img.jpg') }}"></a>
                            <h3>National Connection</h3>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
