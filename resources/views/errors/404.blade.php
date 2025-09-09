<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">

	<title>
        Page Not Found
    </title>
	
	<!------------- Teko Font Family ----------------->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!------------- Poppins Font Family ----------------->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!--------------- Roboto Font Family ------------------>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<!----------------------- Font Awsome Link --------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<!----------------------- Bootstrap Link --------------------->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!----------------------- Style Sheet -------------------------->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
</head>
<body>

<div class="main-header-section erros-header">
    <div class="container">
        <div class="main-header-column">
            <div class="header-content text-align">
                <div class="logo-column">
                    <img src="{{ storage_url(settings('site_logo')) }}">
                </div>
                <h1>{{ settings('site_name') }}</h1>
                <h2>A Statutory Body Under an Act of Parliament</h2>
                <p><small>Administrative Ministry: Ministry of Commerce, Government of the People's Republic of
                        Bangladesh</small></p>
            </div>
        </div>
    </div>
</div>


<div class="erros-hero-section">
    @php
        $banner_image = asset('breadcumb_img/error-hero-bg.png'); 
        $title = 'Page Not Found'; 
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => '404 Error'
            ]
        ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
</div>
<!-- =============================== Breadcrumb Section ======================================-->

<section class="erros-main-section">
    <div class="container">
        <div class="content-row">
            <h2>404</h2>
            <h3>Oops! Page Not Found</h3>
            <p>Sorry, the page you are looking for does not exist. You can return to the <a href="{{ route('home') }}">homepage</a>.</p>
        </div>
    </div>
</section>
<!-- copyright section -->
<div class="copyright-section text-align">
    <div class="container">
        <p>© Copyright 2023
            {{ date('Y', strtotime(Carbon\Carbon::now())) > 2023 ? '-' . date('Y', strtotime(Carbon\Carbon::now())) : '' }}.
            All Rights Reserved | Website design & developed by <a href="https://euitsols.com/"
                target="_blank">European IT Solutions</a></p>
    </div>
    </div>
</body>
</html>

