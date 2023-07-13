@extends('frontend.master')

@section('title', 'About')

@section('content')
<!--=============================== Start Bredcum Section ========================== -->

<section class="bredcum-section handbook-bredcum-section">
	<div class="container">
		<div class="bredcum-content text-align">
			<p><a href="{{route('home')}}">Home | </a> About ICSB</p>
		</div>
	</div>
</section>

<!--=============================== End Bredcum Section ========================== -->

<!-- ======================= Start Who We Are Section ======================= -->

<section class="about-section">
	<div class="container">
		<div class="row about-row">
			<div class="image-column">
				<div class="image-inner-wrapp">
					<div class="top-border img-animaiton"></div>
					<img src="{{asset('frontend/img/about/ICSB-Council.jpg')}}" alt="Our Image">
					<div class="bottom-border img-animaiton"></div>
				</div>
			</div>
			<div class="content-column">
				<div class="text-inner-wrapp">
                    <div class="text-wrapp">
                        <h2 class="title black-color">About us</h2>
                        <p>T-bone fatback pig, flank mollit brisket anim chuck est adipisicing cillum kevin bacon id ea.Ball tip nisi eiusmod id. Deserunt porchetta sausage consequat consectetur in in ullamcosalami ex andouille jerky fatback frankfurter. Et chuck nulla doner, sectetur pork belly tongue ut boudin capicola jerky. </p>
                        <p>6 landjaeger lorem swine, laborum nisi excepteur short loin 54 cupidatat id frankfurter aliquip excepteur Nulla turducken in, brisket kielbasa pork loin pork shank 15% dolor pastrami biltong flank tongue </p>
                        <p>Non ham hock quis chicken, tail consectetur sausage eiusmod shoulder pig tongue aute.Andouille nulla ex est tri-tip ut frankfurter. Shank aliquip boudin, rump anim chicken elit ut sunt cupidatat ham in picanha.</p>
                    </div>
                </div>
			</div>
			<div class="col-12 content-row">
				<div class="col-12">
					<p>Id turducken pig nulla spare ribs, fugiat velit est swine ut pastrami. Shoulder occaecat boudin ground round kevin sausage tail quis meatloaf do meatball jowl.  Occaecat picanha in landjaeger minim filet mignon. Ad sausage dolor culpa. Tempor meatloaf flank cillum nostrud chicken filet mignon eu. Est meatball short loin fatback ipsum ham ut quis venisonaute mollit et tempor laboris dolore. Pork sirloin prosciutto, exercitation short loin jerky tail reprehenderit turkey culpa veniam.</p>
					<h3 class="sub-heading">Shoulder dolore non anim cupidatat</h3>
					<p>Anim aliquip lorem bresaola cupim. Aliqua ham hock drumstick short loin. Corned beef reprehenderit est turducken, commodo id deserunt incididunt porchetta venison nisi officia quifrankfurter consequat. Cupidatat id frankfurter aliquip excepteur ad fugiat shank commodo dolore culpa. T-bone pork landjaeger chuck lorem ex nisi quis. Reprehenderit short ribs eiusmod, kielbasa cillum aliquip pork loin aute pig sint duis fugiat cupim jerky ullamco.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ======================= End Who We Are Section ======================= -->

<!-- ======================= Start Services Section ======================= -->

@include('frontend.includes.services_one',['services' =>$services])

<!-- ======================= End Services Section ======================= -->

<!-- ======================= End Mission & Vision Section ======================= -->
<section class="mission-section">
    <div class="container">
        <div class="row">
            <div class="title-row">
                <h2 class="title black-color text-center">Mission & Vision</h2>
            </div>
        </div>
        <div class="row mission-row gx-5">
            <div class="col-md-6 image-column">
                <div class="image-inner">
                    <div class="video">
                        <iframe width="100%" height="393" src="https://www.youtube.com/embed/f9xRYA3ewdo?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 content-column">
                <div class="content-inner">
                    <div class="mission-wrapp">
                        <div class="title-wrapp">
                            <h3 class="sub-heading">OUR VISION</h3>
                        </div>
                        <div class="text-wrapp">
                            <p>To be the institutional leader in the creation of skilled professionals for proper development of corporate management and good governance.</p>
                        </div>
                    </div>
                    <div class="mission-wrapp">
                        <div class="title-wrapp">
                            <h3 class="sub-heading">OUR MISSION</h3>
                        </div>
                        <div class="text-wrapp">
                            <p>To remain the premier body of professional studies to cultivate the profession of Chartered Secretary so as to ensure sound orporate Governance and build up capable management professionals by continuously working for proactive professional development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================= End You Need Help? Section ======================= -->
<section class="help-section">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <div class="title-row help-box">
                    <h2 class="title text-white text-center">Mission & Vision</h2>
                    <p class="text-white">Curabitur pharetra rutrum lorem, vel imperdiet odio viverra nec.</p>
                    <div class="button-group">
                        <a href="{{route('contact.index')}}" class="member-button global-lg-button">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= End You Need Help? Section ======================= -->
@endsection
