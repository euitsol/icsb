@extends('frontend.master')

@section('title', 'Students Handbook')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section handbook-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a> | Students Handbook</p>
		</div>
	</div>
</section>


<!--============================= Handbok Section ==================-->
<section class="handbook-section section-padding">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">Students Handbook</h1>
		</div>
		<div class="handbook-column">
			<div class="new-handbook text-align">
				<h3>New Students Handbook</h3>
				<a href="" target="_blank"><img src="{{asset('frontend/img/handbook/student-handbook-new.png')}}" alt="New Handbook"></a>
			</div>
			<div class="old-handbook text-align">
				<h3>Old Students Handbook</h3>
				<a href="" target="_blank"><img src="{{asset('frontend/img/handbook/student-handbook-old.png')}}" alt="New Handbook"></a>
			</div>
		</div>
	</div>
</section>


<!-- ======================= Start Footer Section ======================= -->
@endsection
