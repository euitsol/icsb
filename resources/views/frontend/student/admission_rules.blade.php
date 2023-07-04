@extends('frontend.master')

@section('title', 'Admission Rules')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| Admission Rules</p>
		</div>
	</div>
</section>


<!--============================= Start Admission Rules Section ==================-->
<section class="admission-rules-section section-padding">
	<div class="container">
		<div class="rules-content">
			<div class="rules-image-column text-align">
				<img src="{{asset('frontend/img/student/admission-rules-image.png')}}" alt="Admission Rules Image">
			</div>
			<div class="rules-content-column">
				<h1 class="common-heading">Admission Rules</h1>
				<strong><p>Student Registration Procedure</p></strong>
				<p>All application for registration must be made in the prescribed form obtainable from the office of the Institute. Every application shall be duly completed and submitted along with the following fees : On acceptance an official notification will be issued to the student who will also be allocated a Registration Number, which must be quoted on all communication between the student and the Institute.</p>
				<strong><p>Student Registration Procedure</p></strong>
				<p>Registration (Original Certificates must be shown)</p>
				<ul>
					<li>a) Certified photocopies of all educational certificates.</li>
					<li>b) Character certificate from the head of the institution last attended or employer if employed or any Member of the Institute or by a first class gazetted officer of the Government of Bangladesh.</li>
					<li>c) Two recent passport size photographs.</li>
				</ul>
				<strong><p>Mode of Payment of Fees</p></strong>
				<p>No payment by way of Cheque / Cash will be accepted. The studentsare required to deposit the fees in the prescribed bank account of the Institute.</p>
			</div>
		</div>
		<div class="admission-extra-content">
			<strong><p>Mode of Payment of Fees</p></strong>
			<p>Candidate will be registered twice in a year for its Summer and Winter sessions during May-June and November –December respectively. Candidates registered in Summer session will be eligible to appear in the Examination of that session by the end of that session and those registered in Winter session will be eligible to appear in the Examination of that session by the end thereof. No candidate will be allowed to appear in the subsequent Levels</p>
			<strong><p>Refund of Fees</p></strong>
			<p>A person whose application for registration is not accepted is entitled to get refund of fees paid by him/her subject to deduction of administrative charges. A candidate once registered will not be entitled to any refund.</p>
		</div>
	</div>
</section>
<!--============================= End Admission Rules Section ==================-->
@endsection
