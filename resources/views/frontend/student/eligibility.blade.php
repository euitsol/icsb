@extends('frontend.master')

@section('title', 'Eligibility')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section handbook-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| Eligibility</p>
		</div>
	</div>
</section>


<!--============================= Start Eligibility Section ==================-->
<section class="eligibility-section section-padding">
	<div class="container">
		<div class="eligibility-column">
			<div class="eligibility-left text-align">
				<img src="{{asset('frontend/img/student/eligibility-image.png')}}" alt="Eligibility Image">
			</div>
			<div class="eligibility-right">
				<h1 class="common-heading">Eligibility</h1>
				<p>In order to be eligible to appear at the examination students are required to comply with such conditions relating to examination as may be laid down by the council from time to time. To be specific, a student shall comply with the following regulations:</p>
				<p>Students enrolled in a particular session must attend at least 75% classes. Students failing to pass in a particular examination may reappear in any subsequent examination until he successfully passes the examination.</p>
			</div>
		</div>
	</div>
</section>
<!--============================= End Eligibility Section ==================-->
@endsection
