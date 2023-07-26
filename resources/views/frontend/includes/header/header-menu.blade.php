<div class="header-menu-section">
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
                            <li><a class="dropdown-item" href="#">ICSB Profile</a></li>
                            <li><a class="dropdown-item" href="#">Founding Members</a></li>
                            <li><a class="dropdown-item" href="#">Vision & Mission</a></li>
                            <li><a class="dropdown-item" href="#">Objectives</a></li>
                            <li><a class="dropdown-item" href="#">World Wide CS</a></li>
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
                                <li><a class="dropdown-item" href="{{route('members.m_search',$mType->title)}}">{{ $mType->title }}</a></li>
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
</div>
