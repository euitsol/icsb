<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text logo-mini">{{ _('CS') }}</a>
            <a href="{{ route('dashboard') }}" class="simple-text logo-normal">{{ _('Bangladesh') }}</a>
            {{-- <a href="{{ route('dashboard') }}" class="simple-text logo-mini">{{ _('ICSB') }}</a>
            <a href="{{ route('dashboard') }}" class="simple-text logo-normal">{{ _('Institute Of Chartered Secretaries Of Bangladesh') }}</a> --}}
        </div>
        <ul class="nav">
              @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'dashboard', 'routeName' => 'dashboard', 'iconClass' => 'fa-solid fa-chart-line', 'label' => 'Dashboard'],
                    ]
               ])


            {{-- User Management --}}
            <li>
                <a class="@if(
                        $pageSlug == 'role' ||
                        $pageSlug == 'permission'||
                        $pageSlug == 'user'
                    )@else collapsed @endif" data-toggle="collapse" href="#user-management" @if (
                        $pageSlug == 'role' ||
                        $pageSlug == 'permission'||
                        $pageSlug == 'user'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    $pageSlug == 'role' ||
                    $pageSlug == 'permission'||
                    $pageSlug == 'user'
                ) show @endif" id="user-management">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'user', 'routeName' => 'um.user.user_list', 'iconClass' => 'fa-solid fa-user-group', 'label' => 'Users'],
                                ['pageSlug' => 'role', 'routeName' => 'um.role.role_list', 'iconClass' => 'fa-solid fa-person-circle-check', 'label' => 'Roles'],
                                ['pageSlug' => 'permission', 'routeName' => 'um.permission.permission_list', 'iconClass' => 'fa-solid fa-check-double', 'label' => 'Permission'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Home --}}
            <li>
                <a class="@if(
                        $pageSlug == 'pop-up' ||
                        $pageSlug == 'banner-video' ||
                        $pageSlug == 'banner' ||
                        $pageSlug == 'who-we-are' ||
                        $pageSlug == 'latest_news' ||
                        $pageSlug == 'event' ||
                        $pageSlug == 'national_connection' ||
                        $pageSlug == 'recent_video' ||
                        $pageSlug == 'testimonial' ||
                        $pageSlug == 'student-login' ||
                        $pageSlug == 'member-login'
                    )@else collapsed @endif" data-toggle="collapse" href="#home" @if (
                        $pageSlug == 'pop-up' ||
                        $pageSlug == 'banner-video' ||
                        $pageSlug == 'banner' ||
                        $pageSlug == 'who-we-are' ||
                        $pageSlug == 'latest_news' ||
                        $pageSlug == 'event' ||
                        $pageSlug == 'national_connection' ||
                        $pageSlug == 'recent_video' ||
                        $pageSlug == 'testimonial' ||
                        $pageSlug == 'student-login' ||
                        $pageSlug == 'member-login'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span class="nav-link-text" >{{ __('Home') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    $pageSlug == 'pop-up' ||
                    $pageSlug == 'banner-video' ||
                    $pageSlug == 'banner' ||
                    $pageSlug == 'who-we-are' ||
                    $pageSlug == 'latest_news' ||
                    $pageSlug == 'event' ||
                    $pageSlug == 'national_connection' ||
                    $pageSlug == 'recent_video' ||
                    $pageSlug == 'testimonial' ||
                    $pageSlug == 'student-login' ||
                    $pageSlug == 'member-login'
                ) show @endif" id="home">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'pop-up', 'routeName' => 'sp.show', 'params' =>'pop-up', 'label' => 'Pop Up'],
                                ['pageSlug' => 'banner-video', 'routeName' => 'sp.show', 'params' =>'banner-video', 'label' => 'Banner Video'],
                                ['pageSlug' => 'banner', 'routeName' => 'banner.banner_list', 'label' => 'Banner'],
                                ['pageSlug' => 'who-we-are', 'routeName' => 'sp.show', 'params' =>'who-we-are', 'label' => 'Who we are'],
                                ['pageSlug' => 'latest_news', 'routeName' => 'latest_news.latest_news_list', 'label' => 'Latest News'],
                                ['pageSlug' => 'event', 'routeName' => 'event.event_list', 'label' => 'Event'],
                                ['pageSlug' => 'testimonial', 'routeName' => 'testimonial.testimonial_list', 'label' => 'Quotes'],
                                ['pageSlug' => 'national_connection', 'routeName' => 'national_connection.national_connection_list', 'label' => 'National Connection'],
                                ['pageSlug' => 'recent_video', 'routeName' => 'recent_video.recent_video_list', 'label' => 'Recent Video'],


                                ['pageSlug' => 'student-login', 'routeName' => 'sp.show', 'params' =>'student-login', 'label' => 'Student Login'],
                                ['pageSlug' => 'member-login', 'routeName' => 'sp.show', 'params' =>'member-login', 'label' => 'Member Login'],
                            ]
                        ])
                    </ul>
                </div>
            </li>
            {{-- About CS --}}
            <li>
                <a class="@if(
                        // $pageSlug == 'icsb_profile' ||
                        $pageSlug == 'icsb-profile' ||
                        $pageSlug == 'vision' ||
                        $pageSlug == 'mission' ||
                        $pageSlug == 'objectives' ||
                        $pageSlug == 'values' ||
                        $pageSlug == 'wwcs' ||
                        $pageSlug == 'corporate-governance' ||
                        $pageSlug == 'cs-for-cg' ||
                        $pageSlug == 'genesis' ||
                        $pageSlug == 'purpose-of-the-award' ||
                        $pageSlug == 'eligibility-for-participation' ||
                        $pageSlug == 'sources-for-evaluation' ||
                        $pageSlug == 'evaluation-&-assessment-basis' ||
                        $pageSlug == 'jury-board' ||
                        $pageSlug == 'assessment-criteria' ||
                        $pageSlug == 'csr-initiatives' ||
                        $pageSlug == 'faq'
                    )@else collapsed @endif" data-toggle="collapse" href="#about" @if (
                        // $pageSlug == 'icsb_profile' ||
                        $pageSlug == 'icsb-profile' ||
                        $pageSlug == 'vision' ||
                        $pageSlug == 'mission' ||
                        $pageSlug == 'objectives' ||
                        $pageSlug == 'values' ||
                        $pageSlug == 'wwcs' ||
                        $pageSlug == 'corporate-governance' ||
                        $pageSlug == 'cs-for-cg' ||
                        $pageSlug == 'genesis' ||
                        $pageSlug == 'purpose-of-the-award' ||
                        $pageSlug == 'eligibility-for-participation' ||
                        $pageSlug == 'sources-for-evaluation' ||
                        $pageSlug == 'evaluation-&-assessment-basis' ||
                        $pageSlug == 'jury-board' ||
                        $pageSlug == 'assessment-criteria' ||
                        $pageSlug == 'csr-initiatives' ||
                        $pageSlug == 'faq'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-regular fa-address-card"></i>
                    <span class="nav-link-text" >{{ __('About CS') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    // $pageSlug == 'icsb_profile' ||
                    $pageSlug == 'icsb-profile' ||
                    $pageSlug == 'vision' ||
                    $pageSlug == 'mission' ||
                    $pageSlug == 'objectives' ||
                    $pageSlug == 'values' ||
                    $pageSlug == 'wwcs' ||
                    $pageSlug == 'corporate-governance' ||
                    $pageSlug == 'cs-for-cg' ||
                    $pageSlug == 'genesis' ||
                    $pageSlug == 'purpose-of-the-award' ||
                    $pageSlug == 'eligibility-for-participation' ||
                    $pageSlug == 'sources-for-evaluation' ||
                    $pageSlug == 'evaluation-&-assessment-basis' ||
                    $pageSlug == 'jury-board' ||
                    $pageSlug == 'assessment-criteria' ||
                    $pageSlug == 'csr-initiatives' ||
                    $pageSlug == 'faq'
                ) show @endif" id="about">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                // ['pageSlug' => 'icsb_profile', 'routeName' => 'icsb_profile.icsb_profile_create', 'label' => 'ICSB Profile'],
                                ['pageSlug' => 'icsb-profile', 'routeName' => 'sp.show', 'params' => 'icsb-profile', 'label' => 'ICSB Profile'],
                                ['pageSlug' => 'vision', 'routeName' => 'sp.show', 'params' => 'vision', 'label' => 'Vision'],
                                ['pageSlug' => 'mission', 'routeName' => 'sp.show', 'params' => 'mission', 'label' => 'Mission'],
                                ['pageSlug' => 'objectives', 'routeName' => 'sp.show', 'params' => 'objectives', 'label' => 'Objectives'],
                                ['pageSlug' => 'values', 'routeName' => 'sp.show', 'params' => 'values', 'label' => 'Values'],
                                ['pageSlug' => 'wwcs', 'routeName' => 'wwcs.wwcs_list', 'label' => 'World Wide CS'],
                                ['pageSlug' => 'corporate-governance', 'routeName' => 'sp.show', 'params' => 'corporate-governance', 'label' => 'Corporate Governance'],
                                ['pageSlug' => 'cs-for-cg', 'routeName' => 'sp.show', 'params' => 'cs-for-cg', 'label' => 'CS for CG'],
                            ]
                        ])
                        <li>
                            <a class="@if(
                                    $pageSlug == 'genesis' ||
                                    $pageSlug == 'purpose-of-the-award' ||
                                    $pageSlug == 'eligibility-for-participation' ||
                                    $pageSlug == 'sources-for-evaluation' ||
                                    $pageSlug == 'evaluation-&-assessment-basis' ||
                                    $pageSlug == 'jury-board' ||
                                    $pageSlug == 'assessment-criteria'
                                )@else collapsed @endif" data-toggle="collapse" href="#national_award_for_cg" @if (
                                    $pageSlug == 'genesis' ||
                                    $pageSlug == 'purpose-of-the-award' ||
                                    $pageSlug == 'eligibility-for-participation' ||
                                    $pageSlug == 'sources-for-evaluation' ||
                                    $pageSlug == 'evaluation-&-assessment-basis' ||
                                    $pageSlug == 'jury-board' ||
                                    $pageSlug == 'assessment-criteria'
                                ) aria-expanded="true" @else aria-expanded="false"@endif">
                                <i class="fa-solid fa-minus"></i>
                                <span class="nav-link-text" >{{ __('National Award for CG') }}</span>
                                <b class="caret mt-1"></b>
                            </a>

                            <div class="collapse @if (
                                    $pageSlug == 'genesis' ||
                                    $pageSlug == 'purpose-of-the-award' ||
                                    $pageSlug == 'eligibility-for-participation' ||
                                    $pageSlug == 'sources-for-evaluation' ||
                                    $pageSlug == 'evaluation-&-assessment-basis' ||
                                    $pageSlug == 'jury-board' ||
                                    $pageSlug == 'assessment-criteria'
                            ) show @endif" id="national_award_for_cg">
                            <ul class="nav pl-2">
                                @include('backend.partials.menu_buttons', [
                                    'menuItems' => [
                                        ['pageSlug' => 'genesis', 'routeName' => 'sp.show', 'iconClass' => 'fa-solid fa-o','params' => 'genesis', 'label' => 'Genesis'],
                                        ['pageSlug' => 'purpose-of-the-award', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'purpose-of-the-award', 'label' => 'Purpose of the Award'],
                                        ['pageSlug' => 'eligibility-for-participation', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'eligibility-for-participation', 'label' => 'Eligibility for Participation'],
                                        ['pageSlug' => 'sources-for-evaluation', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'sources-for-evaluation', 'label' => 'Sources for Evaluation'],
                                        ['pageSlug' => 'evaluation-&-assessment-basis', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'evaluation-&-assessment-basis', 'label' => 'Evaluation & Assessment Basis'],
                                        ['pageSlug' => 'jury-board', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'jury-board', 'label' => 'Jury Board'],
                                        ['pageSlug' => 'assessment-criteria', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'assessment-criteria', 'label' => 'Assessment Criteria'],
                                    ]
                                ])
                            </ul>

                        </li>
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'csr-initiatives', 'routeName' => 'sp.show', 'params' => 'csr-initiatives', 'label' => 'CSR Initiatives'],
                                ['pageSlug' => 'faq', 'routeName' => 'about.faq.faq_list', 'label' => 'FAQ'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Council --}}
            <li>
                <a class="@if(
                        $pageSlug == 'council' ||
                        $pageSlug == 'president' ||
                        $pageSlug == 'committee'
                    )@else collapsed @endif" data-toggle="collapse" href="#council" @if (
                        $pageSlug == 'council' ||
                        $pageSlug == 'president' ||
                        $pageSlug == 'committee'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-brands fa-slack"></i>
                    <span class="nav-link-text" >{{ __('Council') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    $pageSlug == 'council' ||
                    $pageSlug == 'president' ||
                    $pageSlug == 'committee'
                ) show @endif" id="council">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'council', 'routeName' => 'council.council_list', 'label' => 'Council'],
                                ['pageSlug' => 'committee', 'routeName' => 'committee.committee_list', 'label' => 'Committee'],
                                ['pageSlug' => 'president', 'routeName' => 'president.president_list', 'label' => 'President'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Members --}}
            <li>
                <a class="@if(
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-cs' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'member_notice' ||
                        $pageSlug == 'job_placement'
                    )@else collapsed @endif" data-toggle="collapse" href="#member" @if (
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-cs' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'member_notice' ||
                        $pageSlug == 'job_placement'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-people-group"></i>
                    <span class="nav-link-text" >{{ __('Members') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-cs' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'member_notice' ||
                        $pageSlug == 'job_placement'
                ) show @endif" id="member">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'who-are-cs', 'routeName' => 'sp.show', 'params' => 'who-are-cs', 'label' => 'Who are CS'],
                                ['pageSlug' => 'cs-membership', 'routeName' => 'sp.show', 'params' => 'cs-membership', 'label' => 'CS Membership'],
                                ['pageSlug' => 'membership-benefits', 'routeName' => 'sp.show', 'params' => 'membership-benefits', 'label' => 'Membership Benefits'],
                                ['pageSlug' => 'member', 'routeName' => 'member.member_list', 'label' => 'Member Search'],
                                ['pageSlug' => 'member-portal', 'routeName' => 'sp.show', 'params' => 'member-portal', 'label' => 'Member Portal'],
                                ['pageSlug' => 'cs_firm', 'routeName' => 'cs_firm.cs_firm_list', 'label' => 'CS Firms'],
                                ['pageSlug' => 'code-of-conducts', 'routeName' => 'sp.show', 'params' => 'code-of-conducts', 'label' => 'Code of Conducts'],
                                ['pageSlug' => 'cpd-program', 'routeName' => 'sp.show', 'params' => 'cpd-program', 'label' => 'CPD Program'],
                                ['pageSlug' => 'training-program', 'routeName' => 'sp.show', 'params' => 'training-program', 'label' => 'Training Program'],
                                ['pageSlug' => 'members-lounge', 'routeName' => 'sp.show', 'params' => 'members-lounge', 'label' => 'Members’ Lounge'],
                                ['pageSlug' => 'member_notice', 'routeName' => 'notice_board.member_notice_list', 'label' => 'Members’ Notice'],
                                ['pageSlug' => 'job_placement', 'routeName' => 'job_placement.jp_list', 'label' => 'Job Placement'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Students --}}
            <li>
                <a class="@if(
                        $pageSlug == 'admission-form' ||
                        $pageSlug == 'entry-criteria' ||
                        $pageSlug == 'fees-&-costs' ||
                        $pageSlug == 'policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-faculty' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice' ||
                        $pageSlug == 'faculty-evaluation-system' ||
                        $pageSlug == 'online-admission'
                    )@else collapsed @endif" data-toggle="collapse" href="#student" @if (
                        $pageSlug == 'admission-form' ||
                        $pageSlug == 'entry-criteria' ||
                        $pageSlug == 'fees-&-costs' ||
                        $pageSlug == 'policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-faculty' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice' ||
                        $pageSlug == 'faculty-evaluation-system' ||
                        $pageSlug == 'online-admission'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="nav-link-text" >{{ __('Student') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'admission-form' ||
                        $pageSlug == 'entry-criteria' ||
                        $pageSlug == 'fees-&-costs' ||
                        $pageSlug == 'policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-faculty' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice' ||
                        $pageSlug == 'faculty-evaluation-system' ||
                        $pageSlug == 'online-admission'
                ) show @endif" id="student">
                    <ul class="nav pl-2">
                        <li>
                            <a class="@if(
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'fees-&-costs' ||
                                    $pageSlug == 'policy' ||
                                    $pageSlug == 'admission-form' ||
                                    $pageSlug == 'online-admission'
                                )@else collapsed @endif" data-toggle="collapse" href="#admission" @if (
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'fees-&-costs' ||
                                    $pageSlug == 'policy' ||
                                    $pageSlug == 'admission-form' ||
                                    $pageSlug == 'online-admission'
                                ) aria-expanded="true" @else aria-expanded="false"@endif">
                                <i class="fa-solid fa-minus"></i>
                                <span class="nav-link-text" >{{ __('Admission') }}</span>
                                <b class="caret mt-1"></b>
                            </a>

                            <div class="collapse @if (
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'fees-&-costs' ||
                                    $pageSlug == 'policy' ||
                                    $pageSlug == 'admission-form' ||
                                    $pageSlug == 'online-admission'
                            ) show @endif" id="admission">
                            <ul class="nav pl-2">
                                @include('backend.partials.menu_buttons', [
                                    'menuItems' => [
                                        ['pageSlug' => 'entry-criteria', 'routeName' => 'sp.show', 'iconClass' => 'fa-solid fa-o','params' => 'entry-criteria', 'label' => 'Entry Criteria'],
                                        ['pageSlug' => 'fees-&-costs', 'routeName' => 'sp.show', 'iconClass' => 'fa-solid fa-o','params' => 'fees-&-costs', 'label' => 'Fees & Costs'],
                                        ['pageSlug' => 'policy', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'policy', 'label' => 'Policies'],
                                        ['pageSlug' => 'admission-form', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'admission-form', 'label' => 'Admission Form'],
                                        ['pageSlug' => 'online-admission', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'online-admission', 'label' => 'Online Admission'],
                                    ]
                                ])
                            </ul>

                        </li>
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'cs-hand-book', 'routeName' => 'sp.show', 'params' => 'cs-hand-book', 'label' => 'CS Hand Book'],
                                ['pageSlug' => 'student-portal', 'routeName' => 'sp.show', 'params' => 'student-portal', 'label' => 'Student Portal'],
                                ['pageSlug' => 'financial-assistance', 'routeName' => 'sp.show', 'params' => 'financial-assistance', 'label' => 'Financial Assistance'],
                                ['pageSlug' => 'icsb-faculty', 'routeName' => 'sp.show', 'params' => 'icsb-faculty', 'label' => 'ICSB Faculty'],
                                ['pageSlug' => 'icsb-library', 'routeName' => 'sp.show', 'params' => 'icsb-library', 'label' => 'ICSB Library'],
                                ['pageSlug' => 'student_notice', 'routeName' => 'notice_board.student_notice_list', 'label' => 'Student Notice'],
                                ['pageSlug' => 'faculty-evaluation-system', 'routeName' => 'sp.show', 'params' => 'faculty-evaluation-system', 'label' => 'Faculty Evaluation System'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Employees --}}
            <li>
                <a class="@if(
                        $pageSlug == 'sec_and_ceo' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'
                    )@else collapsed @endif" data-toggle="collapse" href="#employees" @if (
                        $pageSlug == 'sec_and_ceo' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-people-roof"></i>
                    <span class="nav-link-text" >{{ __('Employees') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'sec_and_ceo' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'

                ) show @endif" id="employees">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'sec_and_ceo', 'routeName' => 'sec_and_ceo.sc_list', 'label' => 'Secretary & CEO'],
                                ['pageSlug' => 'assined_officer', 'routeName' => 'assined_officer.assined_officer_list', 'label' => 'Assigned Officers'],
                                ['pageSlug' => 'help-desk', 'routeName' => 'sp.show', 'params' => 'help-desk', 'label' => 'Help Desk'],
                            ]
                        ])
                    </ul>
                </div>
            </li>
            {{-- Rules --}}
            <li>
                <a class="@if(
                        $pageSlug == 'bss' ||
                        $pageSlug == 'act' ||
                        $pageSlug == 'cs-practicing-guideline'
                    )@else collapsed @endif" data-toggle="collapse" href="#rules" @if (
                        $pageSlug == 'bss'||
                        $pageSlug == 'act' ||
                        $pageSlug == 'cs-practicing-guideline'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-gavel"></i>
                    <span class="nav-link-text" >{{ __('Rules') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'bss'||
                        $pageSlug == 'act' ||
                        $pageSlug == 'cs-practicing-guideline'


                ) show @endif" id="rules">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'bss', 'routeName' => 'bss.bss_list', 'label' => 'BSS'],
                                ['pageSlug' => 'act', 'routeName' => 'acts.acts_list', 'label' => 'Acts'],
                                ['pageSlug' => 'cs-practicing-guideline', 'routeName' => 'sp.show', 'params' => 'cs-practicing-guideline', 'label' => 'CS Practicing Guideline'],
                            ]
                        ])
                    </ul>
                </div>
            </li>
            {{-- Publications --}}
            <li>
                <a class="@if(
                        $pageSlug == 'the-chartered-secretary'||
                        $pageSlug == 'national_award' ||
                        $pageSlug == 'convocation' ||
                        $pageSlug == 'annual-report' ||
                        $pageSlug == 'other-publications'
                    )@else collapsed @endif" data-toggle="collapse" href="#publications" @if (
                        $pageSlug == 'the-chartered-secretary'||
                        $pageSlug == 'national_award' ||
                        $pageSlug == 'convocation' ||
                        $pageSlug == 'annual-report' ||
                        $pageSlug == 'other-publications'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-regular fa-newspaper"></i>
                    <span class="nav-link-text" >{{ __('Publications') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'the-chartered-secretary'||
                        $pageSlug == 'national_award' ||
                        $pageSlug == 'convocation' ||
                        $pageSlug == 'annual-report' ||
                        $pageSlug == 'other-publications'


                ) show @endif" id="publications">
                    <ul class="nav pl-2">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'the-chartered-secretary', 'routeName' => 'sp.show', 'params' => 'the-chartered-secretary', 'label' => 'The Chartered Secretary'],
                                ['pageSlug' => 'national_award', 'routeName' => 'national_award.national_award_list',  'label' => 'National Award'],
                                ['pageSlug' => 'convocation', 'routeName' => 'convocation.convocation_list',  'label' => 'ICSB Convocation'],
                                ['pageSlug' => 'annual-report', 'routeName' => 'sp.show', 'params' => 'annual-report', 'label' => 'Annual Report'],
                                ['pageSlug' => 'other-publications', 'routeName' => 'sp.show', 'params' => 'other-publications', 'label' => 'Other Publications'],
                            ]
                        ])
                    </ul>
                </div>
            </li>



            {{-- Examination --}}
            <li>
                <a class="@if(
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'exam-registration' ||
                        $pageSlug == 'foundation-complete' ||
                        $pageSlug == 'subject-complete' ||
                        $pageSlug == 'final-complete'||
                        $pageSlug == 'sample_question_paper' ||
                        $pageSlug == 'exam_faq'
                    )@else collapsed @endif" data-toggle="collapse" href="#examination" @if (
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'exam-registration' ||
                        $pageSlug == 'foundation-complete' ||
                        $pageSlug == 'subject-complete' ||
                        $pageSlug == 'final-complete' ||
                        $pageSlug == 'sample_question_paper' ||
                        $pageSlug == 'exam_faq'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-file-pen"></i>
                    <span class="nav-link-text" >{{ __('Eamination') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'exam-registration' ||
                        $pageSlug == 'foundation-complete' ||
                        $pageSlug == 'subject-complete' ||
                        $pageSlug == 'final-complete' ||
                        $pageSlug == 'sample_question_paper' ||
                        $pageSlug == 'exam_faq'


                ) show @endif" id="examination">
                    <ul class="nav pl-2">
                        <li>
                            <a class="@if(
                                    $pageSlug == 'foundation-complete' ||
                                    $pageSlug == 'subject-complete' ||
                                    $pageSlug == 'final-complete'
                                )@else collapsed @endif" data-toggle="collapse" href="#result" @if (
                                    $pageSlug == 'foundation-complete' ||
                                    $pageSlug == 'subject-complete' ||
                                    $pageSlug == 'final-complete'
                                ) aria-expanded="true" @else aria-expanded="false"@endif">
                                <i class="fa-solid fa-minus"></i>
                                <span class="nav-link-text" >{{ __('Result') }}</span>
                                <b class="caret mt-1"></b>
                            </a>

                            <div class="collapse @if (
                                    $pageSlug == 'foundation-complete' ||
                                    $pageSlug == 'subject-complete' ||
                                    $pageSlug == 'final-complete'
                            ) show @endif" id="result">
                            <ul class="nav pl-2">
                                @include('backend.partials.menu_buttons', [
                                    'menuItems' => [
                                        ['pageSlug' => 'foundation-complete', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'foundation-complete', 'label' => 'Foundation Complete'],
                                        ['pageSlug' => 'subject-complete', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'subject-complete', 'label' => 'Subject Complete'],
                                        ['pageSlug' => 'final-complete', 'routeName' => 'sp.show','iconClass' => 'fa-solid fa-o', 'params' => 'final-complete', 'label' => 'Final Complete'],
                                    ]
                                ])
                            </ul>

                        </li>
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'eligibility', 'routeName' => 'sp.show', 'params' => 'eligibility', 'label' => 'Eligibility'],
                                ['pageSlug' => 'exam-schedule', 'routeName' => 'sp.show', 'params' => 'exam-schedule', 'label' => 'Exam Schedule'],
                                ['pageSlug' => 'exam-registration', 'routeName' => 'sp.show', 'params' => 'exam-registration', 'label' => 'Exam Registration'],
                                ['pageSlug' => 'results', 'routeName' => '', 'label' => 'Results'],
                                ['pageSlug' => 'sample_question_paper', 'routeName' => 'sample_question_paper.sqp_list', 'label' => 'Sample Question Papers'],
                                ['pageSlug' => 'exam_faq', 'routeName' => 'exam_faq.exam_faq_list', 'label' => 'Exam FAQs'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Media Room, Contact Us, Site Settings  --}}
            @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'media_room', 'routeName' => 'media_room.media_room_list', 'iconClass' => 'fa-solid fa-photo-film', 'label' => 'Media Room'],
                    ['pageSlug' => 'contact', 'routeName' => 'contact.contact_create', 'iconClass' => 'fa-solid fa-tty', 'label' => 'Contact Us'],
                    ['pageSlug' => 'notice_board', 'routeName' => 'notice_board.notice_list', 'iconClass' => 'fa-solid fa-bullhorn', 'label' => 'Notice Board'],
                    ['pageSlug' => 'settings', 'routeName' => 'settings.site_settings', 'iconClass' => 'fa-solid fa-gear', 'label' => 'Site Settings'],
                ]
            ])
        </ul>
    </div>
</div>
