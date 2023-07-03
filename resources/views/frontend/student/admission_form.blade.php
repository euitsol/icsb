@extends('frontend.master')

@section('title', 'Admission Form')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| Admission Form</p>
		</div>
	</div>
</section>

<!--=============================== Gallery Section ========================== -->

<section class="admission-form-section">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">Apply this form for admission</h1>
		</div>

		<div class="admission-content">
			<form>
				<div class="input-items">
					<label>Enter First Name</label>
					<input type="text" name="fname" placeholder="First Name">
				</div>
				<div class="input-items">
					<label>Enter Last Name</label>
					<input type="text" name="lname" placeholder="Last Name">
				</div>
				<div class="input-items">
				<label>Course you want to apply for</label>
					<select>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
						<option>Web Design</option>
					</select>
				</div>
				<div class="input-items">
					<label>Student’s Birthday</label>
					<input type="date" name="birthday" data-role="calendarpicker"  data-dialog-mode="true">
					<!-- <img src="img/calendar.png"> -->
				</div>
				<div class="input-items">
					<label>Parents/ Guardian Name</label>
					<input type="text" name="gpname" placeholder="Guardian Name">
				</div>
				<div class="input-items">
					<label>Parents/ Guardian Phone Number</label>
					<input type="tel" name="gpname" placeholder="Guardian Phone Number">
				</div>
				<div class="input-item">
					<label>Student's Address</label>
					<input type="text" name="address" placeholder="State Address">
				</div>
				<div class="input-items">
					<label>NID/Birth/Passport Number</label>
					<input type="number" name="passport" placeholder="0">
				</div>
				<div class="input-items">
					<label>Gender</label>
					<input type="radio" name="gender"><span>Male</span>
					<input type="radio" name="gender"><span>Female</span>
					<input type="radio" name="gender"><span>Others</span>
				</div>
				<div class="input-items">
					<label>City</label>
					<input type="text" name="city" placeholder="City">
				</div>
				<div class="input-items">
					<label>Country</label>
					<select>
						<option>Bangladesh</option>
						<option>India</option>
						<option>Pakistan</option>
						<option>England</option>
						<option>Qatar</option>
						<option>Soudi Arabia</option>
						<option>Srilanka</option>
						<option>Afganistan</option>
						<option>Austrila</option>
						<option>London</option>
						<option>Ireland</option>
						<option>Afganistan</option>
						<option>Austrila</option>
						<option>London</option>
						<option>Ireland</option>
					</select>
				</div>
				<div class="input-items">
					<label>Student Phone Number</label>
					<input type="tel" name="phone" placeholder="Phone">
				</div>
				<div class="input-items">
					<label>Student Email Address</label>
					<input type="email" name="email" placeholder="Email">
				</div>
				<input class="submit-button" type="submit" name="submit" value="Submit Form">
			</form>
		</div>
	</div>
</section>
@endsection
