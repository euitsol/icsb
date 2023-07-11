@extends('frontend.master')

@section('title', 'Home')

@section('content')

{{-- Banner Section --}}
@include('frontend.includes.banner')


<section class="who-you-section">
	<div class="container">
		<div class="row who-row">
			<div class="image-column ccol-md-6">
				<div class="image-inner-wrapp">
					<div class="top-border img-animaiton"></div>
					<img src="{{asset('frontend/img/about/ICSB-Council.jpg')}}" alt="Our Image">
					<div class="bottom-border img-animaiton"></div>
				</div>
			</div>
			<div class="content-column ccol-md-6">
				<div class="bg-wrapper">
					<div class="text-inner-wrapp">
						<div class="text-wrapp">
							<h2 class="title black-color">Who We Are</h2>
							<p>At Studio 271 your well being is our greatest concern. Our caring and highly skilled professionals are ready to pamper you with our fine selection of salon and spa services and techniques and are dedicated to making you look and feel your best from head to toe. Shoaleh has been a cosmetologist since 2000. She purchased Studio 271 in 2004. Her passion is staying current in styles, trends and techniques by attending salon advanced training and hair shows regularly.</p>
							<div class="button-wrapp">
								<a class="small-btn" href="{{route('about.icsb')}}">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="notice-section">
	<div class="container">
		<div class="row">
			<div class="title-row">
				<h2 class="title black-color text-center">Notice Board</h2>
			</div>
			<div class="notice-board-wrappper">
				<ul>
					<li><a class="black-color" href="{{route('students.notice_board')}}">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></li>
					<li><a class="black-color" href="{{route('students.notice_board')}}">Admission Notice January-June 2023 Session</a></li>
					<li><a class="black-color" href="{{route('students.notice_board')}}">Notification Regarding Change of the Election Venue</a></li>
					<li><a class="black-color" href="{{route('students.notice_board')}}">Notice & Class Routine of CL-II, III and PL-I & II for (July-Dece, 2022 Session)</a></li>
				</ul>
				<div class="button-wrapp text-center">
					<a class="small-btn" href="{{route('students.notice_board')}}">View All</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('frontend.includes.services_one',['services' => [$services]])
@include('frontend.includes.services_two',['services' => [$services]])

<section class="president-section">
	<div class="container">
		<div class="row president-row">
			<div class="ccol-md-5 image-column">
				<div class="image-inner-wrapp">
					<div class="top-border-animation img-animaiton"></div>
					<div class="president-img">
						<img src="{{asset('frontend/img/Mr.-Mohammad-Asad-Ullah-FCS.jpg')}}" alt="Mr. Mohammad Asad Ullah FCS">
					</div>
					<div class="president-title">
						<h3>Mohammad Asad Ullah FCS</h3>
					</div>
				</div>
			</div>
			<div class="ccol-md-7 content-column">
				<div class="bg-wrapper">
					<div class="text-inner-wrapp">
						<div class="text-wrapp">
							<h2 class="title black-color">ICSB President</h2>
							<p>My dear ICSB Professional Colleagues, Interns, Students, and ICSB officers and staffs! Ralph Waldo Emerson once said, “Nothing great was ever achieved without enthusiasm!” I keep this mantra above my desk as a reminder to be enthusiastic about the works ahead. Those words act as a cheer-leader for me on days when I cannot bear any more bad news. They motivate me when I feel stuck or burned out as we collectively pull through. My hope is that they will set the tone for my presidency with the ICSB, which began this month.</p>
							<div class="button-wrapp">
								<a class="small-btn" href="{{route('council.president')}}">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@include('frontend.includes.recent_articles')

@include('frontend.includes.recent_videos')

<section class="update-section">
	<div class="container">
		<div class="row">
			<div class="title-row">
				<h2 class="title black-color text-center">Explore Our Updates</h2>
			</div>
		</div>
		<div class="row update-row">
			<div class="col-sm-6 col-md-3 update-column">
				<div class="update-inner-wrapp">
					<div class="update-img">
						<img src="{{asset('frontend/img/update-img/8th_Convocation.jpg')}}" alt="Student Update">
					</div>
					<div class="update-title">
						<h5>Students</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 update-column">
				<div class="update-inner-wrapp">
					<div class="update-img">
						<img src="{{asset('frontend/img/update-img/Members.jpg')}}" alt="Student Update">
					</div>
					<div class="update-title">
						<h5>Members</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 update-column">
				<div class="update-inner-wrapp">
					<div class="update-img">
						<img src="{{asset('frontend/img/update-img/CA-Firms.jpg')}}" alt="Student Update">
					</div>
					<div class="update-title">
						<h5>CA Firms</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 update-column">
				<div class="update-inner-wrapp">
					<div class="update-img">
						<img src="{{asset('frontend/img/update-img/african-student.jpg')}}" alt="Student Update">
					</div>
					<div class="update-title">
						<h5>CA Stories</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="award-section">
	<div class="container">
		<div class="heading-content text-align">
			<h2 class="common-heading">National Award</h2>
		</div>
		<div class="award-content">
			<div class="award-items">
				<a href="" target="_blank"><img src="{{asset('frontend/img/award/ICSB-natioanl-award-2019.png')}}"></a>
			</div>
			<div class="award-items">
				<a href="" target="_blank"><img src="{{asset('frontend/img/award/icsb-national-award-2018.png')}}"></a>
			</div>
			<div class="award-items">
				<a href="" target="_blank"><img src="{{asset('frontend/img/award/ICSB-national-blue-2018.png')}}"></a>
			</div>
			<div class="award-items">
				<a href="" target="_blank"><img src="{{asset('frontend/img/award/ICSB-nation-award-2017.png')}}"></a>
			</div>
		</div>
	</div>
</section>


@include('frontend.includes.partners')
@include('frontend.includes.footer.footer_top')


@endsection
