<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text logo-mini">{{ _('ICSB') }}</a>
            <a href="{{ route('dashboard') }}" class="simple-text logo-normal">{{ _('Institute Of Chartered Secretaries Of Bangladesh') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-chart-line @if ($pageSlug == 'dashboard')fa-beat-fade @endif"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a class="@if($pageSlug == 'role' || $pageSlug == 'permission')@else collapsed @endif" data-toggle="collapse" href="#user-management" @if ($pageSlug == 'role' || $pageSlug == 'permission') aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'role' || $pageSlug == 'permission') show @endif" id="user-management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'user') class="active " @endif>
                            <a href="">
                                <i class="fa-solid fa-user-group @if ($pageSlug == 'user')fa-beat-fade @endif"></i>
                                <p>{{ _('Users') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'role') class="active " @endif>
                            <a href="{{ route('um.role.role_list') }}">
                                <i class="fa-solid fa-person-circle-check @if ($pageSlug == 'role')fa-beat-fade @endif"></i>
                                <p>{{ _('Roles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'permission') class="active " @endif>
                            <a href="{{ route('um.permission.list') }}">
                                <i class="fa-solid fa-check-double @if ($pageSlug == 'permission')fa-beat-fade @endif"></i>
                                <p>{{ _('Permission') }}</p>
                            </a>
                        </li>
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
                        <li @if ($pageSlug == 'faq') class="active " @endif>
                            <a href="{{ route('about.faq.faq_list') }}">
                                <i class="fa-solid fa-recycle  @if ($pageSlug == 'faq')fa-beat-fade @endif"></i>
                                <p>{{ _('FAQ') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'service') class="active " @endif>
                <a href="{{ route('service.service_list') }}">
                    <i class="fa-solid fa-screwdriver-wrench @if ($pageSlug == 'service')fa-beat-fade @endif"></i>
                    <p>{{ _('Service') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'contact') class="active " @endif>
                <a href="{{route('contact.contact_create')}}">
                    <i class="fa-solid fa-tty @if ($pageSlug == 'contact')fa-beat-fade @endif"></i>
                    <p>{{ _('Contact Us') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'national_connection') class="active " @endif>
                <a href="{{route('national_connection.national_connection_list')}}">
                    <i class="fa-solid fa-rss @if ($pageSlug == 'national_connection')fa-beat-fade @endif"></i>
                    <p>{{ _('National Connection') }}</p>
                 </a>
            </li>
            <li @if ($pageSlug == 'event') class="active " @endif>
                <a href="{{route('event.event_list')}}">
                    <i class="fa-solid fa-bullhorn @if ($pageSlug == 'event')fa-beat-fade @endif"></i>
                    <p>{{ _('Event') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'wwcs') class="active " @endif>
                <a href="{{route('wwcs.wwcs_list')}}">
                    <i class="fa-solid fa-earth-americas @if ($pageSlug == 'wwcs')fa-beat-fade @endif"></i>
                    <p>{{ _('World Wide CS') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'national_award') class="active " @endif>
                <a href="{{route('national_award.national_award_list')}}">
                    <i class="fa-solid fa-trophy @if ($pageSlug == 'national_award')fa-beat-fade @endif"></i>
                    <p>{{ _('National Award') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'blog') class="active " @endif>
                <a href="{{route('blog.blog_list')}}">
                    <i class="fa-brands fa-blogger-b @if ($pageSlug == 'blog')fa-beat-fade @endif"></i>
                    <p>{{ _('Blog') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
