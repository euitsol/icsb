@extends('frontend.master')

@section('title', 'FAQ')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
	<div class="overly-image">
		<img src="{{asset('frontend/img/breadcumb/objectives-background.jpg')}}" alt="">
	</div>
	<div class="container">
		<div class="breadcrumbs-row flex">
		<div class="left-column content-column">
			<div class="inner-column color-white">
				<h1 class="breadcrumbs-heading">Objectives</h1>
				<ul class="flex">
					<li><a href="index">Home</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><a href="#">About ICSB</a></li>
					<li><i class="fa-solid fa-angle-right"></i></li>
					<li><p>Objectives</p></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="objectives-section">
<div class="container">
    <div class="objective-row flex">
        <div class="left-column">
			<iframe width="97%" height="385" src="https://www.youtube.com/embed/MLpWrANjFbI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="right-column color-white">
			<h2>Objectives</h2>
			<p>To develop, promote and regulate the profession of Chartered Secretary in Bangladesh and confer professional degree in Chartered Secretary.</p>
			<p>To impart requisite training and education and then to offer membership of the Institute to the deserving candidates.</p>
			<p>To enforce strict discipline for exercising control over the conduct of Members and Students and uphold ethics.</p>
        </div>
    </div>
</div>
</section>
@include('frontend.includes.recent_updates',['blogs'=>$blogs])
@include('frontend.includes.events',['events'=>$events])

@endsection
