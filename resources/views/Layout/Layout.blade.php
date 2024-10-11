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
    <style>
        .ClickAble {
            cursor: pointer;
        }

        .ClickAble:active {
            cursor: default;
        }

        /* Fullscreen Loader CSS */
        #fullscreenLoader {
            position: absolute;
            /* Stay in place */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            background-color: rgba(255, 255, 255, 0.9);
            /* White background with slight opacity */
            z-index: 1050;
            /* High z-index to overlay all elements */
            display: flex;
            /* Flexbox to center content */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */

        }

        .c-pointer {
            cursor: pointer;
        }

        .c-diable {
            cursor: not-allowed
        }
    </style>
    @livewireStyles
    @livewireScripts
</head>

<body>
    <div id="alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1000; width: auto;"></div>
    
    <div class="site-wrapper " id="top"> 
        <x-NavBar></x-NavBar>
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endsession
        @session('fail')
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
        @endsession
        @yield('Content')
        {{-- Product Modal --}}
        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
            aria-labelledby="quickModal" aria-hidden="true">

            @livewire('ProductModalLiveWireComponent')
        </div>
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
