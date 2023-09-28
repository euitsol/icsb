<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <script async src="https://cse.google.com/cse.js?cx=9471c5d01dcda4965">
    </script>

	<title>
        CS Bangladesh
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!----------------------- Lightbox ------------------------>
    <link rel="stylesheet" href="{{asset('frontend/css/lightbox.min.css')}}" />

	 <!-- Links to the BXSlider -->
	<link rel="stylesheet" href="{{asset('frontend/css/jquery.bxslider.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/bxslider.min.css')}}">
	<!----------------------- Owal Carousel ------------------------>
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    @stack('css_link')

	<!----------------------- Style Sheet -------------------------->
    <link rel="icon" href="{{storage_url(settings('site_favicon'))}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
    <x-embed-styles />
    @stack('css')
</head>

<body>

    @include('frontend.includes.header.header')

    <div class="main">
        @yield('content')
    </div>

    @include('frontend.includes.footer.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- BXSlider -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Lightbox -->
    <script src="{{asset('frontend/js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/bxslider.min.js')}}"></script>
    <!-- Owal Carosel -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="{{asset('frontend/js/query.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <!-- BXSlider -->
    <script src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>

    <script src="{{asset('js/share.js')}}"></script>

    @stack('js_link')

    <!-- Custom js -->
    <script src="{{asset('frontend/js/custom.js')}}"></script>

    @stack('js')
</body>
</html>
