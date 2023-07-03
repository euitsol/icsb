@extends('frontend.master')

@section('title', 'The Chartered Secretaries Regulations, 2011')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section handbook-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| The Chartered Secretaries Regulations, 2011</p>
		</div>
	</div>
</section>


<!--============================= Handbok Section ==================-->
<section class="handbook-section section-padding">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">The Chartered Secretaries Regulations, 2011</h1>
		</div>
		<div class="handbook-column">
			<div class="new-handbook text-align">
				<a href="" target="_blank"><img src="{{asset('frontend/img/gajet/gajet-one.png')}}" alt="Gajet 2010"></a>
			</div>
			<div class="old-handbook text-align">
				<a href="" target="_blank"><img src="{{asset('frontend/img/gajet//gajet-two.png')}}" alt="Gajet 2018"></a>
			</div>
		</div>
	</div>
</section>
@endsection
