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
                                ['pageSlug' => 'permission', 'routeName' => 'um.permission.list', 'iconClass' => 'fa-solid fa-check-double', 'label' => 'Permission'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- About CS --}}
            <li>
                <a class="@if(
                        $pageSlug == 'icsb_profile' ||
                        $pageSlug == 'vision' ||
                        $pageSlug == 'mission' ||
                        $pageSlug == 'objectives' ||
                        $pageSlug == 'values' ||
                        $pageSlug == 'wwcs' ||
                        $pageSlug == 'corporate-governance' ||
                        $pageSlug == 'cs-for-cg' ||
                        $pageSlug == 'faq'
                    )@else collapsed @endif" data-toggle="collapse" href="#about" @if (
                        $pageSlug == 'icsb_profile' ||
                        $pageSlug == 'vision' ||
                        $pageSlug == 'mission' ||
                        $pageSlug == 'objectives' ||
                        $pageSlug == 'values' ||
                        $pageSlug == 'wwcs' ||
                        $pageSlug == 'corporate-governance' ||
                        $pageSlug == 'cs-for-cg' ||
                        $pageSlug == 'faq'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-regular fa-address-card"></i>
                    <span class="nav-link-text" >{{ __('About CS') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    $pageSlug == 'icsb_profile' ||
                    $pageSlug == 'vision' ||
                    $pageSlug == 'mission' ||
                    $pageSlug == 'objectives' ||
                    $pageSlug == 'values' ||
                    $pageSlug == 'wwcs' ||
                    $pageSlug == 'corporate-governance' ||
                    $pageSlug == 'cs-for-cg' ||
                    $pageSlug == 'faq'
                ) show @endif" id="about">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'icsb_profile', 'routeName' => 'icsb_profile.icsb_profile_create', 'label' => 'ICSB Profile'],
                                ['pageSlug' => 'vision', 'routeName' => 'sp.show', 'params' => 'vision', 'label' => 'Vision'],
                                ['pageSlug' => 'mission', 'routeName' => 'sp.show', 'params' => 'mission', 'label' => 'Mission'],
                                ['pageSlug' => 'objectives', 'routeName' => 'sp.show', 'params' => 'objectives', 'label' => 'Objectives'],
                                ['pageSlug' => 'values', 'routeName' => 'sp.show', 'params' => 'values', 'label' => 'Values'],
                                ['pageSlug' => 'wwcs', 'routeName' => 'wwcs.wwcs_list', 'label' => 'World Wide CS'],
                                ['pageSlug' => 'corporate-governance', 'routeName' => 'sp.show', 'params' => 'corporate-governance', 'label' => 'Corporate Governance'],
                                ['pageSlug' => 'cs-for-cg', 'routeName' => 'sp.show', 'params' => 'cs-for-cg', 'label' => 'CS for CG'],
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
                        // $pageSlug == 'past_president' ||
                        $pageSlug == 'standing_committees' ||
                        $pageSlug == 'sub_committees'
                    )@else collapsed @endif" data-toggle="collapse" href="#council" @if (
                        $pageSlug == 'council' ||
                        $pageSlug == 'president' ||
                        // $pageSlug == 'past_president' ||
                        $pageSlug == 'standing_committees' ||
                        $pageSlug == 'sub_committees'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-brands fa-slack"></i>
                    <span class="nav-link-text" >{{ __('Council') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                    $pageSlug == 'council' ||
                    $pageSlug == 'president' ||
                    // $pageSlug == 'past_president' ||
                    $pageSlug == 'standing_committees' ||
                    $pageSlug == 'sub_committees'
                ) show @endif" id="council">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'council', 'routeName' => '', 'params' => '', 'label' => 'The Council'],
                                ['pageSlug' => 'president', 'routeName' => '', 'label' => 'The President'],
                                // ['pageSlug' => 'past_president', 'routeName' => '', 'label' => 'The Past President'],
                                ['pageSlug' => 'standing_committees', 'routeName' => '', 'label' => 'The Standing Committees'],
                                ['pageSlug' => 'sub_committees', 'routeName' => '', 'label' => 'The Sub Committees'],
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
                        $pageSlug == 'cs_firms' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members_lounge' ||
                        $pageSlug == 'members_notice_board' ||
                        $pageSlug == 'job_placement'
                    )@else collapsed @endif" data-toggle="collapse" href="#member" @if (
                        $pageSlug == 'member' ||
                        $pageSlug == 'who-are-css' ||
                        $pageSlug == 'cs-membership' ||
                        $pageSlug == 'cs_firms' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members_lounge' ||
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
                        $pageSlug == 'cs_firms' ||
                        $pageSlug == 'code-of-conducts' ||
                        $pageSlug == 'cpd-program' ||
                        $pageSlug == 'training-program' ||
                        $pageSlug == 'members_lounge' ||
                        $pageSlug == 'members_notice_board' ||
                        $pageSlug == 'job_placement'
                ) show @endif" id="member">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'who-are-css', 'routeName' => 'sp.show', 'params' => 'who-are-css', 'label' => 'Who are CSs'],
                                ['pageSlug' => 'cs-membership', 'routeName' => 'sp.show', 'params' => 'cs-membership', 'label' => 'CS Membership'],
                                ['pageSlug' => 'member', 'routeName' => 'member.member_list', 'label' => 'Member Search'],
                                ['pageSlug' => 'cs_firms', 'routeName' => '', 'label' => 'CS Firms'],
                                ['pageSlug' => 'code-of-conducts', 'routeName' => 'sp.show', 'params' => 'code-of-conducts', 'label' => 'Code of Conducts'],
                                ['pageSlug' => 'cpd-program', 'routeName' => 'sp.show', 'params' => 'cpd-program', 'label' => 'CPD Program'],
                                ['pageSlug' => 'training-program', 'routeName' => 'sp.show', 'params' => 'training-program', 'label' => 'Training Program'],
                                ['pageSlug' => 'members_lounge', 'routeName' => '', 'label' => 'Members’ Lounge'],
                                ['pageSlug' => 'members_notice_board', 'routeName' => '', 'label' => 'Members’ Notice Board'],
                                ['pageSlug' => 'job_placement', 'routeName' => '', 'label' => 'Job Placement'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Students --}}
            <li>
                <a class="@if(
                        $pageSlug == 'admission' ||
                        $pageSlug == 'financial_assistance' ||
                        $pageSlug == 'icsb_library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty_evaluation_system'
                    )@else collapsed @endif" data-toggle="collapse" href="#student" @if (
                        $pageSlug == 'admission' ||
                        $pageSlug == 'financial_assistance' ||
                        $pageSlug == 'icsb_library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty_evaluation_system'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="nav-link-text" >{{ __('Student') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'admission' ||
                        $pageSlug == 'financial_assistance' ||
                        $pageSlug == 'icsb_library' ||
                        $pageSlug == 'student_notice_board' ||
                        $pageSlug == 'faculty_evaluation_system'
                ) show @endif" id="student">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'admission', 'routeName' => '', 'label' => 'Admission'],
                                ['pageSlug' => 'cs_hand_book', 'routeName' => '', 'label' => 'CS Hand Book'],
                                ['pageSlug' => 'financial_assistance', 'routeName' => '', 'label' => 'Financial Assistance'],
                                ['pageSlug' => 'icsb_library', 'routeName' => '', 'label' => 'ICSB Library'],
                                ['pageSlug' => 'student_notice_board', 'routeName' => '', 'label' => 'Student Notice Board'],
                                ['pageSlug' => 'faculty_evaluation_system', 'routeName' => '', 'label' => 'Faculty Evaluation System'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Employees --}}
            <li>
                <a class="@if(
                        $pageSlug == 'secretary_and_ceo' ||
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assigned_officers' ||
                        $pageSlug == 'help-desk'
                    )@else collapsed @endif" data-toggle="collapse" href="#employees" @if (
                        $pageSlug == 'secretary_and_ceo' ||
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assigned_officers' ||
                        $pageSlug == 'help-desk'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-people-roof"></i>
                    <span class="nav-link-text" >{{ __('Employees') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'secretary_and_ceo' ||
                        $pageSlug == 'organogram' ||
                        $pageSlug == 'assigned_officers' ||
                        $pageSlug == 'help-desk'

                ) show @endif" id="employees">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'secretary_and_ceo', 'routeName' => '', 'label' => 'Secretary & CEO'],
                                ['pageSlug' => 'organogram', 'routeName' => '', 'label' => 'Organogram'],
                                ['pageSlug' => 'assigned_officers', 'routeName' => '', 'label' => 'Assigned Officers'],
                                ['pageSlug' => 'help-desk', 'routeName' => 'sp.show', 'params' => 'help-desk', 'label' => 'Help Desk'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Rules, Publications --}}
            @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'rules', 'routeName' => '','iconClass' => 'fa-solid fa-gavel', 'label' => 'Rules'],
                    ['pageSlug' => 'publications', 'routeName' => '','iconClass' => 'fa-solid fa-newspaper', 'label' => 'Publications'],
                ]
            ])


            {{-- Examination --}}
            <li>
                <a class="@if(
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'results' ||
                        $pageSlug == 'sample_question_papers' ||
                        $pageSlug == 'exam_faqs'
                    )@else collapsed @endif" data-toggle="collapse" href="#examination" @if (
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'results' ||
                        $pageSlug == 'sample_question_papers' ||
                        $pageSlug == 'exam_faqs'
                    ) aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span class="nav-link-text" >{{ __('Eamination') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if (
                        $pageSlug == 'eligibility' ||
                        $pageSlug == 'exam-schedule' ||
                        $pageSlug == 'results' ||
                        $pageSlug == 'sample_question_papers' ||
                        $pageSlug == 'exam_faqs'


                ) show @endif" id="examination">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'eligibility', 'routeName' => 'sp.show', 'params' => 'eligibility', 'label' => 'Eligibility'],
                                ['pageSlug' => 'exam-schedule', 'routeName' => 'sp.show', 'params' => 'exam-schedule', 'label' => 'Exam Schedule'],
                                ['pageSlug' => 'results', 'routeName' => '', 'label' => 'Results'],
                                ['pageSlug' => 'sample_question_papers', 'routeName' => '', 'label' => 'Sample Question Papers'],
                                ['pageSlug' => 'exam_faqs', 'routeName' => '', 'label' => 'Exam FAQs'],
                            ]
                        ])
                    </ul>
                </div>
            </li>

            {{-- Media Room, Contact Us, Banner, Event, National Connection,  National Award, Service, Site Settings  --}}
            @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'blog', 'routeName' => 'blog.blog_list', 'iconClass' => 'fa-solid fa-photo-film', 'label' => 'Media Room'],
                    ['pageSlug' => 'contact', 'routeName' => 'contact.contact_create', 'iconClass' => 'fa-solid fa-tty', 'label' => 'Contact Us'],

                    ['pageSlug' => 'banner', 'routeName' => 'banner.banner_list', 'iconClass' => 'fa-regular fa-images', 'label' => 'Banner'],
                    ['pageSlug' => 'event', 'routeName' => 'event.event_list', 'iconClass' => 'fa-solid fa-bullhorn', 'label' => 'Event'],
                    ['pageSlug' => 'national_connection', 'routeName' => 'national_connection.national_connection_list', 'iconClass' => 'fa-solid fa-rss', 'label' => 'National Connection'],
                    ['pageSlug' => 'national_award', 'routeName' => 'national_award.national_award_list', 'iconClass' => 'fa-solid fa-trophy', 'label' => 'National Award'],
                    ['pageSlug' => 'service', 'routeName' => 'service.service_list', 'iconClass' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Service'],
                    ['pageSlug' => 'settings', 'routeName' => 'settings.site_settings', 'iconClass' => 'fa-solid fa-gear', 'label' => 'Site Settings'],
                ]
            ])
        </ul>
    </div>
</div>
