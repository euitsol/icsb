
<section class="service-sction">
	<div class="container">
		<div class="row">
			<div class="title-row">
				<h2 class="title black-color text-center">Services</h2>
			</div>
		</div>
		<div class="row">
			<div class="service-row row">
				<div class="content-column service-left-col col-md-4">
					<div class="service-wrapper">
                        @foreach ($services as $key=>$service)
                            @if($key%2 != 0)
                                @continue
                            @endif
                            <div class="service-inner">
                                <div class="service-icon">
                                    <div class="icon-wrapp">
                                        <img src="{{$service->image}}" alt="{{$service->title}}">
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h4 class="servece-title">{{$service->title}}</h4>
                                    <p class="service-details">{{$service->description}}</p>
                                </div>
                            </div>
                        @endforeach


					</div>
				</div>

				<div class="img-column service-mid-col col-md-4">
					<div class="service-wrapper">
						<div class="service-inner">
							<div class="icon-wrapp">
								<img src="{{asset('frontend/img/about/Service-image.png')}}" alt="Servie Image">
							</div>
						</div>
					</div>
				</div>

				<div class="content-column service-right-col col-md-4">
					<div class="service-wrapper">
						@foreach ($services as $key=>$service)
                            @if($key%2 == 0)
                                @continue
                            @endif
                            <div class="service-inner">
                                <div class="service-icon">
                                    <div class="icon-wrapp">
                                        <img src="{{$service->image}}" alt="{{$service->title}}">
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h4 class="servece-title">{{$service->title}}</h4>
                                    <p class="service-details">{{$service->description}}</p>
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




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
