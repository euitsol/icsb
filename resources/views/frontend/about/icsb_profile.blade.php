@extends('frontend.master')

@section('title', 'ICSB Profile')

@section('content')
	<!----============================= Breadcrumbs Section ========================---->
	<section class="breadcrumbs-section">
		<div class="overly-image">
			<img src="{{asset('frontend/img/breadcumb/icsb-profile.png')}}" alt="">
		</div>
		<div class="container">
			<div class="breadcrumbs-row flex">
			<div class="left-column content-column">
				<div class="inner-column color-white">
					<h1 class="breadcrumbs-heading">ICSB Profile</h1>
					<ul class="flex">
						<li><a href="index">Home</a></li>
						<li><i class="fa-solid fa-angle-right"></i></li>
						<li><a href="#">About ICSB</a></li>
						<li><i class="fa-solid fa-angle-right"></i></li>
						<li><p>ICSB Profile</p></li>
					</ul>
				</div>
			</div>
		</div>
		</div>
	</section>
<!----======================== About Us Section =======================---->
	<section class="about-us-section">
		<div class="container">
			<div class="about-us-row flex">
				<div class="image-column">
					<img class="first-image" src="{{asset('frontend/img/about_image.png')}}" alt="">
					<div class="box-image">
						<img class="second-image" src="{{asset('frontend/img/about_image.png')}}" alt="">
					</div>
				</div>
				<div class="content-column">
					<h2>About us</h2>
					<p><strong>Institute of Chartered Secretaries of Bangladesh (ICSB) was established under an Act of Parliament i.e. Chartered Secretaries Act 2010 is the only recognized professional body to develop, promote and regulate the profession of Chartered Secretary in Bangladesh.</strong></p>
					<p>The affairs of the Institute of Chartered Secretaries of Bangladesh (ICSB) are managed by a Council consist of 13 (thirteen) elected members and 05 (five) nominees from the Government of the People's Republic of Bangladesh.</p>
					<p>The major contribution of a Chartered Secretary is in the corporate sector. Chartered Secretary is a requisite qualification to become a Company Secretary. Company Secretary is an important professional aiding the efficient management of the corporate sector. Company Secretary is a statutory officer under the Companies Act 1994. According to Bangladesh Securities and Exchange Commission (BSEC) all the listed companies should have a Company Secretary. Company Secretary is the compliance officer of the company, who has to interact, coordinate, integrate and co-operate with various other functional heads in a company.</p>
				</div>
			</div>
		</div>
	</section>
    @include('frontend.includes.endorsement')
    @include('frontend.includes.bss')
    @include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss])

@endsection
