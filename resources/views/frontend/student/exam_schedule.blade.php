@extends('frontend.master')

@section('title', 'Exam Schedule')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section handbook-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>|  Exam Schedule</p>
		</div>
	</div>
</section>


<!--============================= Start Exam Schedule Section ==================-->
<section class="handbook-section exam-section section-padding">
	<div class="container">
		<div class="handbook-column">
			<div class="new-handbook content-column exam-content-column">
				<h1 class="common-heading">Exam Schedule</h1>
				<p><strong>Examination Timetable</strong></p>
				<p>The examination timetable will be notified by the Council in the newspaper and in the notice board of the Institute.</p>
				<p><strong>Examination Rules</strong></p>
				<p>In order to be eligible to appear at the examination students are required to comply with such conditions relating to examination as may be laid down by the council from time to time. To be specie, a student shall comply with the following regulations:</p>
				<p>a) Students enrolled in a particular session must attend at least 75% classes. Students failing to pass in a particular examination may reappear in any subsequent examination until he successfully passes the examination.</p>
				<p>b) Students enrolled under correspondence course and completed 100% assignments to the satisfaction of the Council are eligible to appear at the examination.</p>
			</div>
			<div class="old-handbook text-align">
				<img src="{{asset('frontend/img/student/exam-schedule.png')}}" alt="Exam Schedule">
			</div>
		</div>
	</div>
</section>
<!--============================= End Exam Schedule Section ==================-->
@endsection
