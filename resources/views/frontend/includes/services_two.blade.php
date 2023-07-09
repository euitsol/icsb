<section class="our-services-section">
    <div class="container">
        <div class="heading-content text-align">
            <h2 class="common-heading">Services</h2>
        </div>
        <div class="our-service-content">
            @foreach ($services as $key=>$service)
                <div class="service-items text-align">
                    <img src="{{$service->image}}" alt="{{$service->title}}">
                    <h4>{{$service->title}}</h4>
                    <p>{{$service->description}}</p>
                </div>
            @endforeach

        </div>
    </div>
</section>
