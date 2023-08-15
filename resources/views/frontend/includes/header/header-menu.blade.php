<!--======================= Header Menu Section =======================-->
<div class="header-menu-section">
<div class="stiky-logo">
    <img src="{{asset('frontend/img/icsb-logo.svg')}}" alt="{{_('ICSB Logo')}}">
</div>
    <div class="container">
<!--===================================== Mobile Menu ================================-->
        <nav class="navbar bg-body-tertiary fixed-top mobile-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/img/icsb-logo.svg')}}"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars-staggered"></i></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/img/logo.svg')}}"></a>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav>
                        <ul>
                            <li><a href="">Home</a></li>
                            <li class="dropdown">
                                <a href="#">About CS</a>
                                <ul class="">
                                    <li><a href="#">ICSB Profile</a></li>
                                    <li><a href="#">Vision</a></li>
                                    <li><a href="#">Mission</a></li>
                                    <li><a href="#">Objectives</a></li>
                                    <li><a href="#">Values</a></li>
                                    <li><a href="#">World Wide CS</a></li>
                                    <li><a href="#">Corporate Governance</a></li>
                                    <li><a href="#">CS for CG</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#">Council </a>
                                <ul class="">
                                    <li><a href="#">ICSB Profile</a></li>
                                    <li><a href="#">Vision</a></li>
                                    <li><a href="#">Mission</a></li>
                                    <li><a href="#">Objectives</a></li>
                                    <li><a href="#">Values</a></li>
                                    <li><a href="#">World Wide CS</a></li>
                                    <li><a href="#">Corporate Governance</a></li>
                                    <li><a href="#">CS for CG</a></li>
                                    <li><a href="#">FAQs </a>
                                        <ul class="">
                                            <li><a href="#">Values</a></li>
                                            <li><a href="#">World Wide CS</a></li>
                                            <li><a href="#">Corporate Governance</a></li>
                                            <li><a href="#">CS for CG</a></li>
                                            <li><a href="#">FAQs</a></li>
                                        </ul>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                  <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  <div class="mobile-menu-button flex">
                    @if(!empty($contact->phone))
                        @foreach (json_decode($contact->phone) as $phone)
                            @if($phone->type == 'Phone')
                                <a href="tel:88{{$phone->number}}"><i class="fa-solid fa-phone"></i>+88{{$phone->number}}</a>
                                @break
                            @endif
                        @endforeach
                    @endif
                    @if(!empty($contact->email))
                        @foreach (json_decode($contact->email) as $email)
                            <a href="mailto:{{$email}}"><i class="fa-solid fa-envelope"></i> {{ $email }}</a>
                            @break
                        @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </nav>
<!--===================================== Desktop Menu ================================-->
          <section class="desktop-menu">
            <div class="menu-bar">
                <ul class="d-flex">
                    <li><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a></li>
                    <li class="drop-down">
                        <a href="#">About CS <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','icsb-profile') }}">ICSB Profile</a></li>
                            <li><a href="{{ route('sp.frontend','vision') }}">Vision</a></li>
                            <li><a href="{{ route('sp.frontend','mission') }}">Mission</a></li>
                            <li><a href="{{route('sp.frontend','objectives')}}">Objectives</a></li>
                            <li><a href="{{ route('sp.frontend','values') }}">Values</a></li>
                            <li><a href="{{ route('about.wwcs') }}">World Wide CS</a></li>
                            <li><a href="{{ route('sp.frontend','corporate-governance') }}">Corporate Governance</a></li>
                            <li><a href="{{ route('sp.frontend','cs-for-cg') }}">CS for CG</a></li>
                            <li><a href="{{ route('about.faq') }}">FAQs</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Council <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="#">The Council</a></li>
                            <li><a href="{{route('council_view.president')}}">The President</a></li>
                            <li><a href="{{route('council_view.past_presidents')}}">Past Presidents</a></li>
                            @foreach ($committeeTypes as $type)
                                <li class="drop-down"><a href="#">{{$type->title}} <i class="fa-solid fa-angle-down"></i></a>
                                    @if(count($type->committees))
                                        <ul class="sub-menu">
                                            @foreach ($type->committees as $committee)
                                                <li><a href="{{route('council_view.committee.members',$committee->slug)}}">{{$committee->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Members <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','who-are-css') }}">Who are CSs</a></li>
                            <li><a href="{{ route('sp.frontend','cs-membership') }}">CS Membership</a></li>
                            <li class="drop-down"><a href="#">Members’ Search <i class="fa-solid fa-angle-down"></i></a>
                                @if(count($memberTypes))
                                    <ul class="sub-menu">
                                        @foreach ($memberTypes as $mType)
                                            <li><a href="{{route('member_view.m_search',$mType->slug)}}">{{ $mType->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @if(isset($memberPortal->saved_data) && !empty(json_decode($memberPortal->saved_data)->{'portal-url'}))
                                <li><a href="{{ json_decode($memberPortal->saved_data)->{'portal-url'} }}">Members Portal</a></li>
                            @endif
                            <li><a href="{{route('member_view.cs_firm')}}">CS Firms</a></li>
                            <li><a href="{{ route('sp.frontend','code-of-conducts') }}">Code of Conducts</a></li>
                            <li><a href="{{ route('sp.frontend','cpd-program') }}">CPD Program</a></li>
                            <li><a href="{{ route('sp.frontend','training-program') }}">Training Program</a></li>
                            <li><a href="{{ route('sp.frontend','members-lounge') }}">Members’ Lounge</a></li>
                            <li><a href="#">Members’ Notice Board</a></li>
                            <li><a href="{{ route('member_view.jps') }}">Job Placement</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Students <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li class="drop-down"><a href="#">Admission <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#">Entry Criteria </a></li>
                                    <li><a href="#">Exemption Policy </a></li>
                                    <li><a href="#">Admission Forms </a></li>
                                    <li><a href="#">Online Admission</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('student_view.cs_hand_book')}}">CS Hand Book</a></li>
                            @if(isset($studentPortal->saved_data) && !empty(json_decode($studentPortal->saved_data)->{'portal-url'}))
                                <li><a href="{{ json_decode($studentPortal->saved_data)->{'portal-url'} }}">Students Portal</a></li>
                            @endif
                            <li><a href="#">Financial Assistance</a></li>
                            <li><a href="{{ route('sp.frontend','icsb-library') }}">ICSB Library</a></li>
                            <li><a href="#">Student Notice Board</a></li>
                            @if(isset($facultyEvaluationSystem->saved_data) && !empty(json_decode($facultyEvaluationSystem->saved_data)->{'url'}))
                                <li><a href="{{ json_decode($facultyEvaluationSystem->saved_data)->{'url'} }}">Faculty Evaluation System</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Employees <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{route('employee_view.sec_and_ceo')}}">Secretary & CEO</a></li>
                            {{-- <li><a href="{{route('employee_view.past_sec_and_ceos')}}">Past Secretary & CEOs</a></li> --}}
                            <li><a href="#">Organogram</a></li>
                            <li><a href="#">Assigned Officers</a></li>
                            <li><a href="{{ route('sp.frontend','help-desk') }}">Help Desk</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Rules <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="#">Chartered Secretaries Act, 2010</a></li>
                            <li><a href="#">Chartered Secretaries Regulations, 2011</a></li>
                            <li><a href="{{ route('sp.frontend','cs-practicing-guideline') }}">CS Practicing Guideline</a></li>
                            <li><a href="#">Companies Act 1994</a></li>
                            <li><a href="#">Income Tax Act 2023</a></li>
                            <li class="drop-down"><a href="#">Secretarial Standards <i class="fa-solid fa-angle-down"></i></a>
                                @if(count($bsss))
                                    <ul class="sub-menu">
                                        @foreach ($bsss as $bss)
                                            <li><a href="{{route('rules_view.bss.view',$bss->slug)}}">{{$bss->short_title}}{{_(': ')}}{{$bss->title}} </a></li>
                                        @endforeach

                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Publications<i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="#">The Chartered Secretary</a></li>
                            <li><a href="#">ICSB National Award Souvenir</a></li>
                            <li><a href="#">Annual Reports</a></li>
                            @if(isset($publicationOthers->saved_data) && !empty(json_decode($publicationOthers->saved_data)->{'url'}))
                                <li><a href="{{ json_decode($publicationOthers->saved_data)->{'url'} }}">Others</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Examination <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','eligibility') }}">Eligibility</a></li>
                            <li><a href="{{ route('sp.frontend','exam-schedule') }}">Exam Schedule</a></li>
                            <li class="drop-down"><a href="#">Results <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#">Foundation Level </a></li>
                                    <li><a href="#">Certificate Level </a></li>
                                    <li><a href="#">Professional Level </a></li>
                                    <li><a href="#">Executive Level (Old Syllabus) </a></li>
                                    <li><a href="#">Professional Level (Old Syllabus) </a></li>
                                </ul>
                            </li>
                            <li><a href="#">Sample Question Papers</a></li>
                            <li><a href="#">Exam FAQs</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="#">Media Room <i class="fa-solid fa-angle-down"></i></a>
                        @if(count($mediaRoomCategory))
                            <ul class="">
                                @foreach ($mediaRoomCategory as $cat)
                                    <li><a href="{{route('media_room_view.cat.all',$cat->slug)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li class="drop-down">
                        <a href="#">Contact Us <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{route('contact_us.feedback')}}">Feedback</a></li>
                            <li><a href="#">Address</a></li>
                            <li><a href="#">Location Map</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
          </section>
    </div>
</div>
