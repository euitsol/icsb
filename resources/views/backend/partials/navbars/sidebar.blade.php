<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text logo-mini">{{ _('ICSB') }}</a>
            <a href="{{ route('dashboard') }}" class="simple-text logo-normal">{{ _('Institute Of Chartered Secretaries Of Bangladesh') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'service') class="active " @endif>
                <a href="{{ route('service.service_list') }}">
                    <i class="tim-icons icon-vector"></i>
                    <p>{{ _('Service') }}</p>
                </a>
            </li>
            <li>
                <a class="@if($pageSlug == 'role')@else collapsed @endif" data-toggle="collapse" href="#user-management" @if ($pageSlug == 'role') aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'role') show @endif" id="user-management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'role') class="active " @endif>
                            <a href="{{ route('um.role.role_list') }}">
                                <i class="fa-solid fa-users-rectangle"></i>
                                <p>{{ _('Roles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'user') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Users') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a class="@if($pageSlug == 'faq')@else collapsed @endif" data-toggle="collapse" href="#about" @if ($pageSlug == 'faq') aria-expanded="true" @else aria-expanded="false"@endif">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="nav-link-text" >{{ __('About') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'faq') show @endif" id="about">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'faq') class="active " @endif>
                            <a href="{{ route('about.faq.faq_list') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>{{ _('FAQ') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'contact') class="active " @endif>
                <a href="{{route('contact.contact_create')}}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('Contact Us') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'national_connection') class="active " @endif>
                <a href="{{route('national_connection.national_connection_list')}}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('National Connection') }}</p>
                 </a>
            </li>
            <li @if ($pageSlug == 'event') class="active " @endif>
                <a href="{{route('event.event_list')}}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('Event') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'wwcs') class="active " @endif>
                <a href="{{route('wwcs.wwcs_list')}}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('World Wide CS') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'national_award') class="active " @endif>
                <a href="{{route('national_award.national_award_list')}}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ _('National Award') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
