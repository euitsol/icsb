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
            <li>
                <a class="@if($pageSlug == 'faq')@else collapsed @endif" data-toggle="collapse" href="#about" @if ($pageSlug == 'faq') aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-regular fa-address-card"></i>
                    <span class="nav-link-text" >{{ __('About') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'faq') show @endif" id="about">
                    <ul class="nav pl-4">
                        @include('backend.partials.menu_buttons', [
                            'menuItems' => [
                                ['pageSlug' => 'faq', 'routeName' => 'about.faq.faq_list', 'iconClass' => 'fa-solid fa-recycle', 'label' => 'FAQ'],
                            ]
                        ])
                    </ul>
                </div>
            </li>
            @include('backend.partials.menu_buttons', [
                'menuItems' => [
                    ['pageSlug' => 'service', 'routeName' => 'service.service_list', 'iconClass' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Service'],
                    ['pageSlug' => 'contact', 'routeName' => 'contact.contact_create', 'iconClass' => 'fa-solid fa-tty', 'label' => 'Contact Us'],
                    ['pageSlug' => 'national_connection', 'routeName' => 'national_connection.national_connection_list', 'iconClass' => 'fa-solid fa-rss', 'label' => 'National Connection'],
                    ['pageSlug' => 'event', 'routeName' => 'event.event_list', 'iconClass' => 'fa-solid fa-bullhorn', 'label' => 'Event'],
                    ['pageSlug' => 'wwcs', 'routeName' => 'wwcs.wwcs_list', 'iconClass' => 'fa-solid fa-earth-americas', 'label' => 'World Wide CS'],
                    ['pageSlug' => 'national_award', 'routeName' => 'national_award.national_award_list', 'iconClass' => 'fa-solid fa-trophy', 'label' => 'National Award'],
                    // ['pageSlug' => 'blog', 'routeName' => 'blog.blog_list', 'iconClass' => 'fa-brands fa-blogger-b', 'label' => 'Blog'],
                    ['pageSlug' => 'banner', 'routeName' => 'banner.banner_list', 'iconClass' => 'fa-regular fa-images', 'label' => 'Banner'],
                ]
            ])
        </ul>
    </div>
</div>
