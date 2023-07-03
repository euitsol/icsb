@extends('frontend.master')

@section('title', 'Council')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section gallery-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| List of Assigned Officers</p>
		</div>
	</div>
</section>




<!--=============================== Start Assigned Officers Section ========================== -->

<section class="assigned-officers-section section-padding">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">List of Assigned Officers</h1>
		</div>
		<div class="assigned-officers-content">
			<table>
				<thead>
					<th>Name</th>
					<th>Section/Purpose</th>
					<th>Contact</th>
				</thead>
				<tbody>
					<tr>
						<td>Md. Zakir Hossain</td>
						<td>Secretary & Chief Executive Officer</td>
						<td><a href="tel:+8802222229957">+8802-222229957</a>,<a href="tel:+8801911621047">+8801911621047</a></td>
					</tr>
					<tr>
						<td>Md. Shamibur Rahman</td>
						<td>Executive Director (Accounts & Finance)</td>
						<td><a href="tel:+8801726174111">+8801726174111</a></td>
					</tr>
					<tr>
						<td>Mehedee Hasan</td>
						<td>Additional Director (Education)</td>
						<td><a href="tel:+8801916100823">+8801916100823</a></td>
					</tr>
					<tr>
						<td>Rulia Akhter</td>
						<td>Education ( Class & Other Relevant Issues)</td>
						<td><a href="tel:+880171436354">+880171436354</a></td>
					</tr>
					<tr>
						<td>Md. Kamrul Islam Khan</td>
						<td>HR & General Admin</td>
						<td><a href="tel:+8801716846574">+8801716846574</a></td>
					</tr>
					<tr>
						<td>Muhammadul Hye Didar</td>
						<td>Publication, Research & Development</td>
						<td><a href="tel:+8801717230220">+8801717230220</a></td>
					</tr>
					<tr>
						<td>Md. Kamal Uddin</td>
						<td>General Accounts</td>
						<td><a href="tel:+8801718744995">+8801718744995</a></td>
					</tr>
					<tr>
						<td>Md. Mohiuddin Chowdhury</td>
						<td>Examination</td>
						<td><a href="tel:+8801710635792">+8801710635792</a></td>
					</tr>
					<tr>
						<td>Dilruba Sharmin</td>
						<td>Admission Facilities</td>
						<td><a href="tel:+8801919877182">+8801919877182</a></td>
					</tr>
					<tr>
						<td>Md. Sazed Saberin</td>
						<td>Library</td>
						<td><a href="tel:+8801716438717">+8801716438717</a></td>
					</tr>
					<tr>
						<td>Md. Kamrul Islam Bhuiyan</td>
						<td>Information Technology</td>
						<td><a href="tel:+8801671759296">+8801671759296</a></td>
					</tr>
					<tr>
						<td>Md. Enamul Haque</td>
						<td>General Administration</td>
						<td><a href="tel:+8801720170407">+8801720170407</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--=============================== End Assigned Officers Section ========================== -->
@endsection

