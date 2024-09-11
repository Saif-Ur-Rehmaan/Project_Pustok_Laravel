<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL('css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL('css/main.css') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('image/favicon.ico') }}">
    @yield('Css')

</head>

<body>
    <div class="site-wrapper" id="top">

        <x-NavBar></x-NavBar>
        @session('success')
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
        @endsession
        @session('fail')
            <div class="alert alert-danger" role="alert">
              {{session('fail')}}
            </div>
        @endsession
        @yield('Content')
        <x-ProductModal></x-ProductModal>
    </div>
    <!--=================================
    Brands Slider
    ===================================== -->
    <x-BrandSlider></x-BrandSlider>

    <!--=================================
    Footer Area
    ===================================== -->
    <x-Footer></x-Footer>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="{{ URL('js/plugins.js') }}"></script>
    <script src="{{ URL('js/ajax-mail.js') }}"></script>
    <script src="{{ URL('js/custom.js') }}"></script>
    @yield('Scripts')
</body>

</html>
