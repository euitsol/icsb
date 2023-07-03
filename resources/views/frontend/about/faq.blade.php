@extends('frontend.master')

@section('title', 'Council')

@section('content')
<!--=============================== Bredcum Section ========================== -->

<section class="bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home</a>| faq</p>
		</div>
	</div>
</section>

<!--============================= Start FAQ Section ========================-->
<section class="faq-section">
	<div class="container">
		<div class="heading-content text-align">
			<h1 class="common-heading">Frequently Asked Questions</h1>
		</div>
		<div class="faq-content">
			<div class="left-column">
				<div class="accordion" id="accordionExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingOne">
				      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				        What is ICSB?
				      </button>
				    </h2>
				    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Institute of Chartered Secretaries of Bangladesh. It offers professional degree of Chartered Secretaries. It is a statutory body under Ministry of Commerce, Govt. of Bangladesh.
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">
					    <h2 class="accordion-header" id="headingTwo">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					        Is it like ICAB and ICMAB?
					      </button>
					    </h2>
					    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        Not exactly same. ICAB is for Chartered Accountants, ICMAB is for Cost & Management Accountants, while ICSB provides degree in Chartered Secretaryship.
					      </div>
					    </div>
  					</div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingThree">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				        What does ICSB do?
				      </button>
				    </h2>
				    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        ICSB regulates and develop the profession of Chartered Secretaries in order to promote and establish statutory disciplines and conduct the Company matter and management effectively in line with corporate governance and code of conduct. It regularly arranges Continuing Development Program (CPD) to enhance the efficiency of the secretarial profession.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingFour">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				        What Course they offer?
				      </button>
				    </h2>
				    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Chartered Secretarial Course is of international standard based on UK, and Indian Syllabus. 18 papers of 100 marks each are taught during the course period of 2.5 year in 5 semesters.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingFive">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
				        What is the Admission Time?
				      </button>
				    </h2>
				    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Twice in a year, for January-June session in December and for July-December session in June.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingSix">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
				        How many Semesters?
				      </button>
				    </h2>
				    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Total 5 (Five) Semesters (six months) for each Semester.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingSeven">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
				        What is the duration of the Course?
				      </button>
				    </h2>
				    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Total 2 and Half years.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingEight">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
				        How much does it cost for one semester?
				      </button>
				    </h2>
				    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        TK. 13,600 only. There is possibility of enhancing the fee up to 30% from next semester.
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingNine">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
				        What is Payment System?
				      </button>
				    </h2>
				    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        Semester wise, by bank deposit.
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<div class="right-column">
				<div class="accordion accordion-flush" id="accordionFlushExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingOne">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
				        How many Subjects are there?
				      </button>
				    </h2>
				    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">18 Subjects (Five Semesters).</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingTwo">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
				        What about class attendance?
				      </button>
				    </h2>
				    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">75% attendance mandatory.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingThree">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
				        What is exam routine?
				      </button>
				    </h2>
				    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Twice in a year, in January & July.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingFour">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
				        What is passing system?
				      </button>
				    </h2>
				    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">At a time (Semester wise).</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingFive">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
				        What is the passing marks?
				      </button>
				    </h2>
				    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Individual 40% & average 50%, when both is matched.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingSix">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
				        What about class timing?
				      </button>
				    </h2>
				    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Evening shift from 6.30pm-9.30pm (any 4 days in a week), day shift: Friday & Saturday from 8.00am-5.00pm.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingSeven">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
				        What are the Faculty Members?
				      </button>
				    </h2>
				    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Experienced persons who are directly involved in Company Secretarial matter and University teachers, Lawyers, and expert professional etc.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingEight">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
				        What are the rules for Admission?
				      </button>
				    </h2>
				    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Business Graduate with 6 (six) points. Also non-Business graduates are admitted to the Foundation Course. They appear in Admission test and qualified candidates are enrolled.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingNine">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
				        What are the prospects for this exam?
				      </button>
				    </h2>
				    <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Prospect is very bright. A modern corporate enterprise/ limited company needs the services of qualified Chartered Secretaries with multidisciplinary background in Law, Management and Accounting, backed by skilled training and continuing professional development education to ensure that all legal compliances are promptly and efficiently met.</div>
				    </div>
				  </div>

				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingTen">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
				        Does ICSB offer any placement help?
				      </button>
				    </h2>
				    <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">The Institute tries to provide required help in getting placement in job to all his/her qualified students, but it is not obligatory. Generally all the qualified secretaries are employed in various organizations in good position, because of this Professional Degree.</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--============================= End FAQ Section ========================-->
@endsection

