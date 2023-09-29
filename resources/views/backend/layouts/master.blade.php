<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title', 'ICSB') - Institute of Chartered Secretaries of Bangladesh (ICSB)
        </title>

        <!-- Favicon -->
        <link rel="icon" href="{{storage_url(settings('site_favicon'))}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Icons -->
        <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
        @stack('css_link')

        <!-- CSS -->
        <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>

        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

        @stack('css')
    </head>
    <body class="white-content dark {{ $class ?? '' }}">
        <div class="wrapper">
            @auth()
                @include('backend.partials.navbars.sidebar')
                <div class="main-panel">
                    @include('backend.partials.navbars.navbar')
                    <div class="content">
                        @yield('content')
                    </div>
                    @include('backend.partials.footer')
                </div>
            @else
                @include('layouts.navbars.navbar')
                <div class="wrapper wrapper-full-page">
                    <div class="full-page {{ $contentClass ?? '' }} d-flex align-items-center justify-content-center">
                        <div class="content">
                            <div class="container">
                                @yield('content')
                            </div>
                        </div>
                        @include('layouts.footer')
                    </div>
                </div>
            @endauth
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        {{-- <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary" style="background-color: #182456 !important"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                </ul>
            </div>
        </div> --}}


        <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>
        <script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('white') }}/js/theme.js"></script>
        <script src="{{ asset('white') }}/js/color_change.js"></script>

        {{-- Custom JS --}}
        <script src="{{ asset('backend/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @stack('js_link')
        @stack('js')
        <script src="{{ asset('backend/ckeditor/build/ckeditor.js') }}"></script>
        <script src="{{ asset('backend/js/ckeditor.js') }}"></script>
    </body>
</html>
