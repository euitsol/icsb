<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text logo-mini">{{ _('ICSB') }}</a>
            <a href="{{ route('dashboard') }}" class="simple-text logo-normal">{{ _('Institute Of Chartered Secretaries Of Bangladesh') }}</a>
        </div>
        <ul class="nav">
              @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'dashboard', 'routeName' => 'dashboard', 'iconClass' => 'fa-solid fa-chart-line', 'label' => 'Dashboard'],
                    ]
               ])


            {{-- User Management --}}
            <li>
                <a class="@if($pageSlug == 'role' || $pageSlug == 'permission')@else collapsed @endif" data-toggle="collapse" href="#user-management" @if ($pageSlug == 'role' || $pageSlug == 'permission') aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'role' || $pageSlug == 'permission') show @endif" id="user-management">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'user', 'routeName' => '', 'iconClass' => 'fa-solid fa-user-group', 'label' => 'Users'],
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
                        $pageSlug == 'banner' ||
                        $pageSlug == 'event' ||
                        $pageSlug == 'national_connection' ||
                        $pageSlug == 'recent_video'
                    )@else collapsed @endif" data-toggle="collapse" href="#home" @if (
                        // $pageSlug == 'icsb_profile' ||
                        $pageSlug == 'banner' ||
                        $pageSlug == 'event' ||
                        $pageSlug == 'national_connection' ||
                        $pageSlug == 'recent_video'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span class="nav-link-text" >{{ __('Home') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    // $pageSlug == 'icsb_profile' ||
                    $pageSlug == 'banner' ||
                    $pageSlug == 'event' ||
                    $pageSlug == 'national_connection' ||
                    $pageSlug == 'recent_video'
                ) show @endif" id="home">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'banner', 'routeName' => 'banner.banner_list', 'label' => 'Banner'],
                                ['pageSlug' => 'event', 'routeName' => 'event.event_list', 'label' => 'Event'],
                                ['pageSlug' => 'national_connection', 'routeName' => 'national_connection.national_connection_list', 'label' => 'National Connection'],
                                ['pageSlug' => 'recent_video', 'routeName' => 'recent_video.recent_video_list', 'label' => 'Recent Video'],
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
                    $pageSlug == 'csr-initiatives' ||
                    $pageSlug == 'faq'
                ) show @endif" id="about">
                    <ul class="nav pl-4">
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
                    <ul class="nav pl-4">
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
                        $pageSlug == 'who-are-css' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'members_notice_board' ||
                        $pageSlug == 'job_placement'
                    )@else collapsed @endif" data-toggle="collapse" href="#member" @if (
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-css' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'members_notice_board' ||
                        $pageSlug == 'job_placement'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-people-group"></i>
                    <span class="nav-link-text" >{{ __('Members') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-css' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'membership-benefits' ||
                        $pageSlug == 'member-portal' ||
                        $pageSlug == 'cs_firm' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members-lounge' ||
                        $pageSlug == 'members_notice_board' ||
                        $pageSlug == 'job_placement'
                ) show @endif" id="member">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'who-are-css', 'routeName' => 'sp.show', 'params' => 'who-are-css', 'label' => 'Who are CSs'],
                                ['pageSlug' => 'cs-membership', 'routeName' => 'sp.show', 'params' => 'cs-membership', 'label' => 'CS Membership'],
                                ['pageSlug' => 'membership-benefits', 'routeName' => 'sp.show', 'params' => 'membership-benefits', 'label' => 'Membership Benefits'],
                                ['pageSlug' => 'member', 'routeName' => 'member.member_list', 'label' => 'Member Search'],
                                ['pageSlug' => 'member-portal', 'routeName' => 'sp.show', 'params' => 'member-portal', 'label' => 'Member Portal'],
                                ['pageSlug' => 'cs_firm', 'routeName' => 'cs_firm.cs_firm_list', 'label' => 'CS Firms'],
                                ['pageSlug' => 'code-of-conducts', 'routeName' => 'sp.show', 'params' => 'code-of-conducts', 'label' => 'Code of Conducts'],
                                ['pageSlug' => 'cpd-program', 'routeName' => 'sp.show', 'params' => 'cpd-program', 'label' => 'CPD Program'],
                                ['pageSlug' => 'training-program', 'routeName' => 'sp.show', 'params' => 'training-program', 'label' => 'Training Program'],
                                ['pageSlug' => 'members-lounge', 'routeName' => 'sp.show', 'params' => 'members-lounge', 'label' => 'Members’ Lounge'],
                                ['pageSlug' => 'members_notice_board', 'routeName' => '', 'label' => 'Members’ Notice Board'],
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
                        $pageSlug == 'examination-policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty-evaluation-system'
                    )@else collapsed @endif" data-toggle="collapse" href="#student" @if (
                        $pageSlug == 'admission-form' ||
                        $pageSlug == 'entry-criteria' ||
                        $pageSlug == 'examination-policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty-evaluation-system'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="nav-link-text" >{{ __('Student') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'admission-form' ||
                        $pageSlug == 'entry-criteria' ||
                        $pageSlug == 'examination-policy' ||
                        $pageSlug == 'cs-hand-book' ||
                        $pageSlug == 'student-portal' ||
                        $pageSlug == 'financial-assistance' ||
                        $pageSlug == 'icsb-library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty-evaluation-system'
                ) show @endif" id="student">
                    <ul class="nav pl-4">
                        <li>
                            <a class="@if(
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'examination-policy' ||
                                    $pageSlug == 'admission-form'
                                )@else collapsed @endif" data-toggle="collapse" href="#admission" @if (
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'examination-policy' ||
                                    $pageSlug == 'admission-form'
                                ) aria-expanded="true" @else aria-expanded="false"@endif">
                                <i class="fa-solid fa-people-group"></i>
                                <span class="nav-link-text" >{{ __('Admission') }}</span>
                                <b class="caret mt-1"></b>
                            </a>

                            <div class="collapse @if (
                                    $pageSlug == 'entry-criteria' ||
                                    $pageSlug == 'examination-policy' ||
                                    $pageSlug == 'admission-form'
                            ) show @endif" id="admission">
                            <ul class="nav pl-4">
                                @include('backend.partials.menu_buttons', [
                                    'menuItems' => [
                                        ['pageSlug' => 'entry-criteria', 'routeName' => 'sp.show', 'params' => 'entry-criteria', 'label' => 'Entry Criteria'],
                                        ['pageSlug' => 'examination-policy', 'routeName' => 'sp.show', 'params' => 'examination-policy', 'label' => 'Examination Policy'],
                                        ['pageSlug' => 'admission-form', 'routeName' => 'sp.show', 'params' => 'admission-form', 'label' => 'Admission Form'],
                                    ]
                                ])
                            </ul>

                        </li>
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'cs-hand-book', 'routeName' => 'sp.show', 'params' => 'cs-hand-book', 'label' => 'CS Hand Book'],
                                ['pageSlug' => 'student-portal', 'routeName' => 'sp.show', 'params' => 'student-portal', 'label' => 'Student Portal'],
                                ['pageSlug' => 'financial-assistance', 'routeName' => 'sp.show', 'params' => 'financial-assistance', 'label' => 'Financial Assistance'],
                                ['pageSlug' => 'icsb-library', 'routeName' => 'sp.show', 'params' => 'icsb-library', 'label' => 'ICSB Library'],
                                ['pageSlug' => 'student_notice_board', 'routeName' => '', 'label' => 'Student Notice Board'],
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
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'
                    )@else collapsed @endif" data-toggle="collapse" href="#employees" @if (
                        $pageSlug == 'sec_and_ceo' ||
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-people-roof"></i>
                    <span class="nav-link-text" >{{ __('Employees') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'sec_and_ceo' ||
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assined_officer' ||
                        $pageSlug == 'help-desk'

                ) show @endif" id="employees">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'sec_and_ceo', 'routeName' => 'sec_and_ceo.sc_list', 'label' => 'Secretary & CEO'],
                                ['pageSlug' => 'organogram', 'routeName' => '', 'label' => 'Organogram'],
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
                        $pageSlug == 'acts' ||
                        $pageSlug == 'cs-practicing-guideline'
                    )@else collapsed @endif" data-toggle="collapse" href="#rules" @if (
                        $pageSlug == 'bss'||
                        $pageSlug == 'acts' ||
                        $pageSlug == 'cs-practicing-guideline'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-gavel"></i>
                    <span class="nav-link-text" >{{ __('Rules') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'bss'||
                        $pageSlug == 'acts' ||
                        $pageSlug == 'cs-practicing-guideline'


                ) show @endif" id="rules">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'bss', 'routeName' => 'bss.bss_list', 'label' => 'BSS'],
                                ['pageSlug' => 'acts', 'routeName' => 'acts.acts_list', 'label' => 'Acts'],
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
                        $pageSlug == 'other'
                    )@else collapsed @endif" data-toggle="collapse" href="#publications" @if (
                        $pageSlug == 'the-chartered-secretary'||
                        $pageSlug == 'national_award' ||
                        $pageSlug == 'convocation' ||
                        $pageSlug == 'other'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-regular fa-newspaper"></i>
                    <span class="nav-link-text" >{{ __('Publications') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'the-chartered-secretary'||
                        $pageSlug == 'national_award' ||
                        $pageSlug == 'convocation' ||
                        $pageSlug == 'other'


                ) show @endif" id="publications">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'the-chartered-secretary', 'routeName' => 'sp.show', 'params' => 'the-chartered-secretary', 'label' => 'The Chartered Secretary'],
                                ['pageSlug' => 'national_award', 'routeName' => 'national_award.national_award_list',  'label' => 'National Award'],
                                ['pageSlug' => 'convocation', 'routeName' => 'convocation.convocation_list',  'label' => 'ICSB Convocation'],
                                ['pageSlug' => 'annual-report', 'routeName' => 'sp.show', 'params' => 'annual-report', 'label' => 'Annual Report'],
                                ['pageSlug' => 'others', 'routeName' => 'sp.show', 'params' => 'others', 'label' => 'Others'],
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
                        $pageSlug == 'results' ||
                        $pageSlug == 'sample_question_paper' ||
                        $pageSlug == 'exam_faq'
                    )@else collapsed @endif" data-toggle="collapse" href="#examination" @if (
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'results' ||
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
                        $pageSlug == 'results' ||
                        $pageSlug == 'sample_question_paper' ||
                        $pageSlug == 'exam_faq'


                ) show @endif" id="examination">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'eligibility', 'routeName' => 'sp.show', 'params' => 'eligibility', 'label' => 'Eligibility'],
                                ['pageSlug' => 'exam-schedule', 'routeName' => 'sp.show', 'params' => 'exam-schedule', 'label' => 'Exam Schedule'],
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
                    ['pageSlug' => 'settings', 'routeName' => 'settings.site_settings', 'iconClass' => 'fa-solid fa-gear', 'label' => 'Site Settings'],
                ]
            ])
        </ul>
    </div>
</div>
