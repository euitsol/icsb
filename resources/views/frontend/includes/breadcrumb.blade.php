<section class="breadcrumbs-section">
	<div class="overly-image">
		<img src="@if($datas['image']){{ $datas['image'] }}@else{{asset('breadcumb_img/about_cs.jpg')}}@endif"
        alt="">
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading" title="{{ isset($datas['full_title']) ? $datas['full_title']: $datas['title']}}">{{$datas['title']}}</h1>
				<ul class="flex">
                    @foreach ($datas['paths'] as $route=>$path)
                        <li title="{{$path}}"><a href='{{($route != 'javascript:void(0)') ? route($route) : $route}}'>{{$path}}</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                    @endforeach
					<li title="{{ isset($datas['full_title']) ? $datas['full_title']: $datas['title']}}">{{$datas['title']}}</li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
