<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
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
            <li @if ($pageSlug == 'faq') class="active " @endif>
                <a href="{{ route('faq.faq_list') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('FAQ') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
