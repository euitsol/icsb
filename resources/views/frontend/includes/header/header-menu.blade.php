{{-- <div class="header-menu-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <nav class="navbar navbar-expand-xl">
                <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/img/icsb-logo.svg')}}"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About ICSB</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.icsb_profile') }}">ICSB Profile</a></li>
                            <li><a class="dropdown-item" href="#">Founding Members</a></li>
                            <li><a class="dropdown-item" href="#">Vision & Mission</a></li>
                            <li><a class="dropdown-item" href="{{route('about.objectives')}}">Objectives</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.wwcs') }}">World Wide CS</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.faq') }}">FAQs</a></li>
                          </ul>
                        </li>
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Council</a>
                           <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="#">The Council</a></li>
                                 <li><a class="dropdown-item" href="#">The President</a></li>
                                 <li><a class="dropdown-item" href="#">Past Presidents</a></li>
                                 <li><a class="dropdown-item" href="#">The Standing Committees</a></li>
                                 <li><a class="dropdown-item" href="#">The Sub Committees</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Members</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="world-widechartered-secretaries.html">World Wide Chartered Secretaries</a></li>
                             <li><a class="dropdown-item" href="students-handbook.html">Students Handbook</a></li>
                             <li><a class="dropdown-item" href="notice-board.html">Students Notice Board</a></li>
                             <li><a class="dropdown-item" href="eligibility.html">Eligibility</a></li>
                             <li><a class="dropdown-item" href="exam-schedule.html">Exam Schedule</a></li>
                             <li><a class="dropdown-item" href="admission-rules.html">Admission Rules</a></li>
                             <li><a class="dropdown-item" href="admission-form.html">Admission Form</a></li>
                             <li><a class="dropdown-item" href="admission-form.html">Member Search</a></li>
                             @foreach ($memberTypes as $mType)
                                <li><a class="dropdown-item" href="{{route('members.m_search',$mType->slug)}}">{{ $mType->title }}</a></li>
                             @endforeach

                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Students</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="council.html">Council 2022-2025</a></li>
                             <li><a class="dropdown-item" href="fees.html">Fees</a></li>
                             <li><a class="dropdown-item" href="code-of-conduct.html">Code of Conduct</a></li>
                             <li><a class="dropdown-item" href="cpd-programm.html">CPD Program</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Employees</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="the-chartered-secretaries-act-2010.html">The Chartered Secretaries Act, 2010</a></li>
                             <li><a class="dropdown-item" href="the-chartered-secretaries-act-2010.html">The Chartered Secretaries Regulations, 2011</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rules & Regulations</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                           </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Examination</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Media</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                           </ul>
                        </li>
                           <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contact Us</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                             <li><a class="dropdown-item" href="{{route('contact_us.feedback')}}">Feedback</a></li>
                           </ul>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
</div> --}}
<!--======================= Header Menu Section =======================-->
<div class="header-menu-section">
    <div class="container">
<!--===================================== Mobile Menu ================================-->
        <nav class="navbar bg-body-tertiary fixed-top mobile-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="assets/img/icsb-logo.svg"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars-staggered"></i></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg"></a>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About CS
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ICSB Profile</a></li>
                        <li><a class="dropdown-item" href="#">Founding Members</a></li>
                        <li><a class="dropdown-item" href="#">Vision & Mission</a></li>
                        <li><a class="dropdown-item" href="#">Objectives</a></li>
                        <li><a class="dropdown-item" href="#">World Wide CS</a></li>
                        <li><a class="dropdown-item" href="#">FAQs</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Council
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">The Council</a></li>
                            <li><a class="dropdown-item" href="#">The President</a></li>
                            <li><a class="dropdown-item" href="#">Past Presidents</a></li>
                            <li><a class="dropdown-item" href="#">The Standing Committees</a></li>
                            <li><a class="dropdown-item" href="#">The Sub Committees</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Members
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="world-widechartered-secretaries.html">World Wide Chartered Secretaries</a></li>
                            <li><a class="dropdown-item" href="students-handbook.html">Students Handbook</a></li>
                            <li><a class="dropdown-item" href="notice-board.html">Students Notice Board</a></li>
                            <li><a class="dropdown-item" href="eligibility.html">Eligibility</a></li>
                            <li><a class="dropdown-item" href="exam-schedule.html">Exam Schedule</a></li>
                            <li><a class="dropdown-item" href="admission-rules.html">Admission Rules</a></li>
                            <li><a class="dropdown-item" href="admission-form.html">Admission Form</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Students
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="council.html">Council 2022-2025</a></li>
                            <li><a class="dropdown-item" href="fees.html">Fees</a></li>
                            <li><a class="dropdown-item" href="code-of-conduct.html">Code of Conduct</a></li>
                            <li><a class="dropdown-item" href="cpd-programm.html">CPD Program</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="the-chartered-secretaries-act-2010.html">The Chartered Secretaries Act, 2010</a></li>
                            <li><a class="dropdown-item" href="the-chartered-secretaries-act-2010.html">The Chartered Secretaries Regulations, 2011</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Rules & Regulations
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Examination</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Media
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contact Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                        </ul>
                    </li>
                  </ul>
                  <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  <div class="mobile-menu-button flex">
                    <a href="tel:8801708030804"><i class="fa-solid fa-phone"></i> +880-1708030804</a>
                    <a href="mailto:icsb@icsb.edu.bd"><i class="fa-solid fa-envelope"></i> ICSB@ICSB.EDU.BD</a>
                  </div>
                </div>
              </div>
            </div>
        </nav>
<!--===================================== Desktop Menu ================================-->
            <nav class="navbar navbar-expand-lg desktop-menu">
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('frontend/img/icsb-logo.svg')}}"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About CS</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.icsb_profile') }}">ICSB Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.vision') }}">Vision</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.mission') }}">Mission</a></li>
                            <li><a class="dropdown-item" href="{{route('about.objectives')}}">Objectives</a></li>
                            <li><a class="dropdown-item" href="#">Values</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.wwcs') }}">World Wide CS</a></li>
                            <li><a class="dropdown-item" href="#">Corporate Governance</a></li>
                            <li><a class="dropdown-item" href="#">CS for CG</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.faq') }}">FAQs</a></li>
                          </ul>
                        </li>
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Council</a>
                           <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="#">The Council</a></li>
                                 <li><a class="dropdown-item" href="#">The President</a></li>
                                 <li><a class="dropdown-item" href="#">Past Presidents</a></li>
                                 <li><a class="dropdown-item" href="#">The Standing Committees</a></li>
                                 <li><a class="dropdown-item" href="#">The Sub Committees</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Members</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Who are CSs</a></li>
                             <li><a class="dropdown-item" href="#">CS Membership</a></li>
                             <li><a class="dropdown-item" href="#">Members’ Search</a></li>
                             @foreach ($memberTypes as $mType)
                                <li><a class="dropdown-item" href="{{route('members.m_search',$mType->slug)}}">{{ $mType->title }}</a></li>
                             @endforeach
                             <li><a class="dropdown-item" href="https://icsberp.org/users/login.aspx">Members Portal</a></li>
                             <li><a class="dropdown-item" href="#">CS Firms</a></li>
                             <li><a class="dropdown-item" href="#">Code of Conducts</a></li>
                             <li><a class="dropdown-item" href="#">CPD Program</a></li>
                             <li><a class="dropdown-item" href="#">Training Program</a></li>
                             <li><a class="dropdown-item" href="#">Members’ Lounge</a></li>
                             <li><a class="dropdown-item" href="#">Members’ Notice Board</a></li>
                             <li><a class="dropdown-item" href="{{ route('members.job_placement') }}">Job Placement</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Students</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Admission</a></li>
                             <li><a class="dropdown-item" href="#">CS Hand Book</a></li>
                             <li><a class="dropdown-item" href="https://icsberp.org/users/login.aspx">Students Portal</a></li>
                             <li><a class="dropdown-item" href="#">Financial Assistance</a></li>
                             <li><a class="dropdown-item" href="#">ICSB Library</a></li>
                             <li><a class="dropdown-item" href="#">Student Notice Board</a></li>
                             <li><a class="dropdown-item" href="#">Faculty Evaluation System</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Employees</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Secretary & CEO</a></li>
                             <li><a class="dropdown-item" href="#">Organogram</a></li>
                             <li><a class="dropdown-item" href="#">Assigned Officers</a></li>
                             <li><a class="dropdown-item" href="#">Help Desk</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rules</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Chartered Secretaries Act, 2010</a></li>
                             <li><a class="dropdown-item" href="#">Chartered Secretaries Regulations, 2011</a></li>
                             <li><a class="dropdown-item" href="#">CS Practicing Guideline</a></li>
                             <li><a class="dropdown-item" href="#">Companies Act 1994</a></li>
                             <li><a class="dropdown-item" href="#">Income Tax Act 2023</a></li>
                             <li><a class="dropdown-item" href="#">Secretarial Standards</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publications</a>
                             <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">The Chartered Secretary</a></li>
                               <li><a class="dropdown-item" href="#">ICSB National Award Souvenir</a></li>
                               <li><a class="dropdown-item" href="#">CS Convocation Souvenir </a></li>
                               <li><a class="dropdown-item" href="#">Annual Reports</a></li>
                               <li><a class="dropdown-item" href="#">Others</a></li>
                             </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examination</a>
                             <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">Eligibility</a></li>
                               <li><a class="dropdown-item" href="{{ route('examination.exam_schedule') }}">Exam Schedule</a></li>
                               <li><a class="dropdown-item" href="#">Results</a></li>
                               <li><a class="dropdown-item" href="#">Sample Question Papers</a></li>
                               <li><a class="dropdown-item" href="#">Exam FAQs</a></li>
                             </ul>
                          </li>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Media Room</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="#">Courtesy Meets</a></li>
                             <li><a class="dropdown-item" href="#">ICSB MoUs</a></li>
                             <li><a class="dropdown-item" href="#">Orientations</a></li>
                             <li><a class="dropdown-item" href="#">Convocations</a></li>
                             <li><a class="dropdown-item" href="#">National Awards</a></li>
                             <li><a class="dropdown-item" href="#">CPD Glimpses</a></li>
                             <li><a class="dropdown-item" href="#">AGM Glimpses</a></li>
                             <li><a class="dropdown-item" href="#">Important Events</a></li>
                             <li><a class="dropdown-item" href="#">Picnic Glimpses</a></li>
                             <li><a class="dropdown-item" href="#">Members Receptions</a></li>
                             <li><a class="dropdown-item" href="#">Members Achievements</a></li>
                           </ul>
                        </li>
                           <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contact Us</a>
                           <ul class="dropdown-menu">
                             <li><a class="dropdown-item" href="{{route('contact_us.feedback')}}">Feedback</a></li>
                             <li><a class="dropdown-item" href="#">Address</a></li>
                             <li><a class="dropdown-item" href="#">Location Map</a></li>
                           </ul>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
</div>
