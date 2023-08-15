<section class="breadcrumbs-section">
	<div class="overly-image">
		<img src="{{ $datas['image'] ?? (asset('frontend/img/breadcumb/faqs-background.jpg'))}}" alt="">
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">{{$datas['title']}}</h1>
				<ul class="flex">
                    @foreach ($datas['paths'] as $route=>$path)
                        <li><a href='{{($route != 'javascript:void(0)') ? route($route) : $route}}'>{{$path}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                    @endforeach
					<li>{{$datas['title']}}</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
