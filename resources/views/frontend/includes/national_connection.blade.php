<section class="national-connection-section">
    <div class="container">
        <div class="national-content">
            <div class="section-heading text-align">
                <h2>National Connections</h2>
            </div>
            <div class="logo-carousel">
                <div class="national-connection owl-carousel owl-theme">
                    @forelse ($national_connections as $connection)
                        <div class="item">
                            <div class="logo-wrapp">
                                <img src="{{ storage_url($connection->logo) }}">
                                <h3 class="text-align">{{$connection->title}}</h3>
                            </div>
                        </div>
                    @empty
                    <div class="item">
                        <div class="logo-wrapp">
                            <img src="{{ asset('no_img/no_img.jpg') }}">
                            <h3 class="text-align"></h3>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
