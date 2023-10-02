<!--======================= Header Menu Section =======================-->
<div class="header-menu-section">
    <div class="stiky-logo">
        <a href="{{route('home')}}">
            <img src="{{asset('frontend/img/icsb-logo.svg')}}" alt="{{_('ICSB Logo')}}">
        </a>
    </div>
    <div class="container">
<!--===================================== Mobile Menu Start================================-->
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
                                <a href="javascript:voide(0)">About CS</a>
                                <ul class="">
                                    <li><a href="javascript:voide(0)">ICSB Profile</a></li>
                                    <li><a href="javascript:voide(0)">Vision</a></li>
                                    <li><a href="javascript:voide(0)">Mission</a></li>
                                    <li><a href="javascript:voide(0)">Objectives</a></li>
                                    <li><a href="javascript:voide(0)">Values</a></li>
                                    <li><a href="javascript:voide(0)">World Wide CS</a></li>
                                    <li><a href="javascript:voide(0)">Corporate Governance</a></li>
                                    <li><a href="javascript:voide(0)">CS for CG</a></li>
                                    <li><a href="javascript:voide(0)">FAQs</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:voide(0)">Council </a>
                                <ul class="">
                                    <li><a href="javascript:voide(0)">ICSB Profile</a></li>
                                    <li><a href="javascript:voide(0)">Vision</a></li>
                                    <li><a href="javascript:voide(0)">Mission</a></li>
                                    <li><a href="javascript:voide(0)">Objectives</a></li>
                                    <li><a href="javascript:voide(0)">Values</a></li>
                                    <li><a href="javascript:voide(0)">World Wide CS</a></li>
                                    <li><a href="javascript:voide(0)">Corporate Governance</a></li>
                                    <li><a href="javascript:voide(0)">CS for CG</a></li>
                                    <li><a href="javascript:voide(0)">FAQs </a>
                                        <ul class="">
                                            <li><a href="javascript:voide(0)">Values</a></li>
                                            <li><a href="javascript:voide(0)">World Wide CS</a></li>
                                            <li><a href="javascript:voide(0)">Corporate Governance</a></li>
                                            <li><a href="javascript:voide(0)">CS for CG</a></li>
                                            <li><a href="javascript:voide(0)">FAQs</a></li>
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
<!--===================================== Mobile Menu End================================-->

<!--===================================== Desktop Menu Start================================-->
        <div class="desktop-menu">
            <div class="menu-bar">
                <ul class="d-flex">
                    <li><a class="nav-link active" aria-current="page" href="{{route('home')}}">{{_('Home')}}</a></li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">About CS <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','icsb-profile') }}">{{_('ICSB Profile')}}</a></li>
                            <li><a href="{{ route('sp.frontend','vision') }}">{{_('Vision')}}</a></li>
                            <li><a href="{{ route('sp.frontend','mission') }}">{{_('Mission')}}</a></li>
                            <li><a href="{{route('sp.frontend','objectives')}}">{{_('Objectives')}}</a></li>
                            <li><a href="{{ route('sp.frontend','values') }}">{{_('Values')}}</a></li>
                            <li><a href="{{ route('about.wwcs') }}">{{_('World Wide CS')}}</a></li>
                            <li><a href="{{ route('sp.frontend','corporate-governance') }}">{{_('Corporate Governance')}}</a></li>
                            <li><a href="{{ route('sp.frontend','cs-for-cg') }}">{{_('CS for CG')}}</a></li>
                            <li class="drop-down"><a href="javascript:void(0)">National Award for CG<i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('sp.frontend','genesis')}}">{{_('Genesis')}}</a></li>
                                    <li><a href="{{route('sp.frontend','purpose-of-the-award')}}">{{_('Purpose of the Award')}}</a></li>
                                    <li><a href="{{route('sp.frontend','eligibility-for-participation')}}">{{_('Eligibility for Participation')}}</a></li>
                                    <li><a href="{{route('sp.frontend','sources-for-evaluation')}}">{{_('Sources for Evaluation')}}</a></li>
                                    <li><a href="{{route('sp.frontend','evaluation-&-assessment-basis')}}">{{_('Evaluation & Assessment Basis')}}</a></li>
                                    <li><a href="{{route('sp.frontend','jury-board')}}">{{_('Jury Board')}}</a></li>
                                    <li><a href="{{route('sp.frontend','assessment-criteria')}}">{{_('Assessment Criteria')}}</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('sp.frontend','csr-initiatives') }}">{{_('CSR Initiatives')}}</a></li>
                            <li><a href="{{ route('about.faq') }}">{{_('FAQs')}}</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Council <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            @foreach ($councils as $council)
                                <li><a href="{{route('council_view.council.members',$council->slug)}}">{{$council->title}}</a></li>
                            @endforeach
                            <li><a href="{{route('council_view.president')}}">{{_('The President')}}</a></li>
                            <li><a href="{{route('council_view.past_presidents')}}">{{_('Past Presidents')}}</a></li>
                            @foreach ($committeeTypes as $type)
                                <li class="drop-down"><a href="javascript:voide(0)">{{$type->title}} <i class="fa-solid fa-angle-down"></i></a>
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
                        <a href="javascript:voide(0)">Members <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','who-are-css') }}">Who are CSs</a></li>
                            <li><a href="{{ route('sp.frontend','cs-membership') }}">CS Membership</a></li>
                            <li><a href="{{ route('sp.frontend','membership-benefits') }}">Membership Benefits</a></li>
                            <li class="drop-down"><a href="#">Member’s Search <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('member_view.m_search', 'honorary')}}">Honorary Members</a></li>
                                    <li><a href="{{route('member_view.m_search', 'fellow')}}">Fellow Members</a></li>
                                    <li><a href="{{route('member_view.m_search', 'associate')}}">Associate Members</a></li>
                                    <li><a href="{{route('member_view.m_search', 'deceased')}}">Deceased Members</a></li>
                                </ul>
                            </li>
                            @if(isset($memberPortal->saved_data) && !empty(json_decode($memberPortal->saved_data)->{'portal-url'}))
                                <li><a target="_blank" href="{{ json_decode($memberPortal->saved_data)->{'portal-url'} }}">{{_('Members Portal')}}</a></li>
                            @endif
                            <li><a href="{{route('member_view.cs_firm')}}">{{_('CS Firms')}}</a></li>
                            <li><a href="{{ route('sp.frontend','code-of-conducts') }}">{{_('Code of Conducts')}}</a></li>
                            <li><a href="{{ route('sp.frontend','cpd-program') }}">{{_('CPD Program')}}</a></li>
                            <li><a href="{{ route('sp.frontend','training-program') }}">{{_('Training Program')}}</a></li>
                            <li><a href="{{ route('sp.frontend','members-lounge') }}">{{_('Members’ Lounge')}}</a></li>
                            <li><a href="{{route('notice_view.notice','member-notice')}}">{{_('Members’ Notice Board')}}</a></li>
                            <li><a href="{{ route('member_view.jps') }}">{{_('Job Placement')}}</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Students <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li class="drop-down"><a href="javascript:voide(0)">Admission <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('sp.frontend','entry-criteria') }}">{{_('Entry Criteria ')}}</a></li>
                                    <li><a href="{{ route('sp.frontend','fees-&-costs') }}">{{_('Fees & Costs')}}</a></li>
                                    {{-- <li><a href="{{ route('sp.frontend','examination-policy') }}">{{_('Exemption Policy ')}}</a></li> --}}

                                    @if(isset($policies) && isset($policies->saved_data) && !empty(json_decode($policies->saved_data)->{'upload-files'}))

                                    <li class="drop-down"><a href="javascript:voide(0)">{{_('Policies for Students')}} <i class="fa-solid fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach (json_decode($policies->saved_data)->{'upload-files'} as $k => $up)
                                                <li><a href="{{ route('sp.policy', make_slug(file_title_from_url($up))) }}">{{ file_title_from_url($up) }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    @endif
                                    <li><a href="{{ route('sp.frontend','admission-form') }}">{{_('Admission Forms ')}}</a></li>
                                    {{-- @if(isset($studentPortal->saved_data) && !empty(json_decode($studentPortal->saved_data)->{'portal-url'})) --}}
                                        <li><a target="_blank" href="https://icsberp.org/Home/Default.aspx">{{_('Online Admission')}}</a></li>
                                    {{-- @endif --}}
                                </ul>
                            </li>
                            <li><a href="{{route('student_view.cs_hand_book')}}">{{_('CS Hand Book')}}</a></li>
                            @if(isset($studentPortal->saved_data) && !empty(json_decode($studentPortal->saved_data)->{'portal-url'}))
                                <li><a target="_blank" href="{{ json_decode($studentPortal->saved_data)->{'portal-url'} }}">{{_('Students Portal')}}</a></li>
                            @endif
                            <li><a href="{{ route('sp.frontend','financial-assistance') }}">{{_('Financial Assistance')}}</a></li>
                            <li><a href="{{ route('sp.frontend','icsb-faculty') }}">{{_('ICSB Faculty')}}</a></li>
                            <li><a href="{{ route('sp.frontend','icsb-library') }}">{{_('ICSB Library')}}</a></li>
                            <li><a href="{{route('notice_view.notice','student-notice')}}">{{_('Student Notice Board')}}</a></li>
                            @if(isset($facultyEvaluationSystem->saved_data) && !empty(json_decode($facultyEvaluationSystem->saved_data)->{'url'}))
                                <li><a target="_blank" href="{{ json_decode($facultyEvaluationSystem->saved_data)->{'url'} }}">{{_('Faculty Evaluation System')}}</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Employees <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{route('employee_view.sec_and_ceo')}}">{{_('Secretary & CEO')}}</a></li>
                            <li><a href="{{route('employee_view.organogram')}}">{{_('Organogram')}}</a></li>
                            <li><a href="{{route('employee_view.assined_officer')}}">{{_('Assigned Officers')}}</a></li>
                            <li><a href="{{ route('sp.frontend','help-desk') }}">{{_('Help Desk')}}</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Rules <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            @foreach ($menu_acts as $act)
                                <li><a href="{{route('rules_view.act.view',$act->slug)}}">{{$act->title}}</a></li>
                            @endforeach
                            <li class="drop-down"><a href="javascript:void(0)">Secretarial Standards <i class="fa-solid fa-angle-down"></i></a>
                                @if(count($bsss))
                                    <ul class="sub-menu">
                                        @foreach ($bsss as $bss)
                                            <li><a href="{{route('rules_view.bss.view',$bss->slug)}}">{{$bss->short_title}}{{_(': ')}}{{$bss->title}}</a></li>
                                        @endforeach

                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Publications<i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','the-chartered-secretary') }}">{{_('The Chartered Secretary')}}</a></li>
                            <li><a href="{{route('publication_view.national_award')}}">{{_('ICSB National Award Souvenir')}}</a></li>
                            <li><a href="{{route('publication_view.convocation')}}">{{_('ICSB Convocation Souvenir')}}</a></li>
                            <li><a href="{{ route('sp.frontend','annual-report') }}">{{_('Annual Reports')}}</a></li>
                            <li><a href="{{ route('sp.frontend','other-publications') }}">{{_('Other Publications')}}</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Examination <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{ route('sp.frontend','eligibility') }}">{{_('Eligibility')}}</a></li>
                            <li><a href="{{ route('sp.frontend','exam-schedule') }}">{{_('Exam Schedule')}}</a></li>
                            <li class="drop-down"><a href="javascript:voide(0)">Results <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('sp.frontend','foundation-complete') }}">{{_('Foundation Complete')}}</a></li>
                                    <li><a href="{{ route('sp.frontend','subject-complete') }}">{{_('Subject Complete')}}</a></li>
                                    <li><a href="{{ route('sp.frontend','final-complete') }}">{{_('Final Complete')}}</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('examination.sqp')}}">{{_('Sample Question Papers')}}</a></li>
                            <li><a href="{{route('examination.exam_faq')}}">{{_('Exam FAQs')}}</a></li>
                        </ul>
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Media Room <i class="fa-solid fa-angle-down"></i></a>
                        @if(count($mediaRoomCategory))
                            <ul class="">
                                @foreach ($mediaRoomCategory as $cat)
                                    <li><a href="{{route('media_room_view.cat.all',$cat->slug)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li class="drop-down">
                        <a href="javascript:voide(0)">Contact Us <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="">
                            <li><a href="{{route('contact_us.feedback')}}">{{_('Feedback')}}</a></li>
                            <li><a href="{{route('contact_us.address')}}">{{_('Address')}}</a></li>
                            <li><a href="{{route('contact_us.location_map')}}">{{_('Location Map')}}</a></li>
                            <li><a href="{{route('contact_us.social_platforms')}}">{{_('Social Platforms')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
<!--===================================== Desktop Menu End================================-->
    </div>
    <div class="stiky-logo-right">
        <a href="{{route('home')}}">
            <img src="{{asset('frontend/img/stiky-logo-right.png')}}" alt="{{_('ICSB Logo')}}">
        </a>
    </div>
</div>
