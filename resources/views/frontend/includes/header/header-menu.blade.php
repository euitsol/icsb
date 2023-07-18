<section class="header-menu-section">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('frontend/img/ICSB logo/ICSB-logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('about.icsb')}}">About ICSB</a></li>
                        <li><a class="dropdown-item" href="{{route('about.council')}}">Founder Members</a></li>
                        <li><a class="dropdown-item" href="{{route('about.csr_activities')}}">CSR Activities</a></li>
                        <li><a class="dropdown-item" href="{{route('about.faq')}}">FAQ</a></li>
                        <li><a class="dropdown-item" href="{{route('about.assigned_officer')}}">List of Assigned Officers</a></li>
                      </ul>
                    </li>
                      <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Council</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{route('council.council')}}">Council 2022-2025</a></li>
                         <li><a class="dropdown-item" href="{{route('council.committee')}}">Committee 2022-2025</a></li>
                         <li><a class="dropdown-item" href="{{route('council.past_presidents')}}">Past Presidents</a></li>
                         <li><a class="dropdown-item" href="{{route('council.president')}}">Presidents</a></li>
                         <li><a class="dropdown-item" href="{{route('council.previous_council')}}">Previous Council 2019-2022</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Students</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{route('students.wwcs')}}">World Wide Chartered Secretaries</a></li>
                         <li><a class="dropdown-item" href="{{route('students.handbook')}}">Students Handbook</a></li>
                         <li><a class="dropdown-item" href="{{route('students.notice_board')}}">Students Notice Board</a></li>
                         <li><a class="dropdown-item" href="{{route('students.eligibility')}}">Eligibility</a></li>
                         <li><a class="dropdown-item" href="{{route('students.exam_schedule')}}">Exam Schedule</a></li>
                         <li><a class="dropdown-item" href="{{route('students.admission_rules')}}">Admission Rules</a></li>
                         <li><a class="dropdown-item" href="{{route('students.admission_form')}}">Admission Form</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Members</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{route('members.council')}}">Council 2022-2025</a></li>
                         <li><a class="dropdown-item" href="{{route('members.fees')}}">Fees</a></li>
                         <li><a class="dropdown-item" href="{{route('members.code_of_conduct')}}">Code of Conduct</a></li>
                         <li><a class="dropdown-item" href="{{route('members.cpd_program')}}">CPD Program</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rules & Regulations</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{route('rules_and_regulations.tcsa')}}">The Chartered Secretaries Act, 2010</a></li>
                         <li><a class="dropdown-item" href="{{route('rules_and_regulations.tcsr')}}">The Chartered Secretaries Regulations, 2011</a></li>
                       </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publications</a>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="{{route('publications.photo_gallery')}}">Photo Gallery</a></li>
                       </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact_view.index')}}">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>
</section>
