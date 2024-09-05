<!doctype html>
<html lang="en">
<!-- index-235:58-->

<head>
    <!-- Basic Page Needs==================================================-->
    <title>DISABILITY : @yield('fmenuname')</title>
    <link rel="icon" href="{{ asset('frontend_assets/assets/img/logo.jpg') }}" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--FOR VIDEO GALLERY -->
    <script type="text/javascript" src="html5gallery/jquery.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/assets/plugins/css/plugins.css')}} ">
    <link href="{{ asset('frontend_assets/assets/css/style.css')}}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('frontend_assets/assets/css/colors/green-style.css')}}">
    <script type="text/javascript" src="{{ asset('frontend_assets/assets/plugins/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
          width: 100%;
          margin: auto;
          overflow: hidden;
        }
    </style>

    {{-- <style type="text/css">
        #slider {
            overflow: hidden;
        }

        #slider figure {
            position: relative;
            width: 500%;
            margin: 0;
            left: 0;
            animation: 20s slider infinite;
        }

        #slider figure img {
            width: 20%;
            float: left;
        }

        @keyframes slider {
            0% {
                left: 0;
            }

            20% {
                left: 0;
            }

            25% {
                left: -100%;
            }

            45% {
                left: -100%;
            }

            50% {
                left: -200%;
            }

            70% {
                left: -200%;
            }

            75% {
                left: -300%;
            }

            95% {
                left: -300%;
            }

            100% {
                left: -400%;
            }
        }
    </style> --}}
</head>

<body>
