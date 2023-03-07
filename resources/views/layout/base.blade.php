<!DOCTYPE html>
<html lang="en">
<?php

use App\Models\slider;

$logo = slider::where('type', '=', 'logo')->get();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($logo->isEmpty())
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/frontend') }}/{{ $logo[0]->image }}">
    @endif
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery.fontselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/easyzoom.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link type="text/css" href="{{ asset('css/layout.theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/theme.css') }}?v=208273474052650987" rel="stylesheet">
    
    {{-- custom stylesheet --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom-style.css') }}">

    <style>
        .hed .owl-nav button {
            background: transparent !important;
            color: black;
        }

        .hed .owl-nav button:hover {
            background: transparent !important;
        }
    </style>

    <style>
        .layer {
            overflow-x: hidden;
        }

        @media(min-width : 992px) {
            .layer {
                overflow-x: visible;
            }
        }

        .group {
            transition: transform 300ms ease;
        }

        .stage-open .group {
            transform: translateX(250px);
        }

        .stage-shelf {
            transition: transform 300ms ease;
            -webkit-overflow-scrolling: touch;
            transform: translateX(-250px);
            position: fixed !important;
            z-index: 1030 !important;
            overflow-y: auto;
        }

        .stage-open+.stage-shelf {
            transform: translateX(0);
        }

        [data-toggle="stage"] polyline {
            transition: transform 300ms ease;
            transform-origin: 13.333px;
            transform: rotate(0deg);
        }

        .stage-open [data-toggle="stage"] polyline:first-of-type {
            transform: rotate(-45deg);
        }

        .stage-open [data-toggle="stage"] polyline:last-of-type {
            transform: rotate(45deg);
        }

        .navbar .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    @livewireStyles

</head>

<body class="home-page home-01 " style="padding-right: 0 !important">
    <div class="stage" id="stage">
        @include('layout.navbar')
        <div class="layer">
            <div class="group ">
                <div class="main">
                    <main class="bg-ash"> {{ $slot }}</main>
                </div>

                @include('components.includes.footer')

            </div>
        </div>
    </div>
    <div class="stage-shelf p-0">
        <div class="menu h-100">
            <div class="carousel slide h-100" id="menu">
                <div class="carousel-inner h-100">
                    <div class="carousel-item h-100 active">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase py-3"
                                    href="/collections/gift-box-builder-gifts/box">
                                    Build a custom box
                                </a>
                            </li>
                            <li class="nav-item dropdown position-static">
                                <a class="nav-link text-uppercase py-3" href="/collection/ready-to-ship">
                                    Ready to ship boxes
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-uppercase py-3" href="/collection/coperate">
                                    Coparete gifting
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-uppercase py-3" href="/about">
                                    About us
                                </a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype == 'USR')
                                        <li class="nav-item ">
                                            <div class="dropdown"
                                                style="background-color: rgb(255, 255, 255);padding: 0 25px;">

                                                <a class=" d-block py-2" data-toggle="dropdown" href="#"
                                                    style="color: rgb(5, 5, 5);">
                                                    {{ Auth::user()->name }}
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" style="padding: 5px;"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout').submit()">Logout</a>

                                                    <form action="{{ route('logout') }}" method="POST" id="logout">
                                                        @csrf
                                                    </form>
                                                    <a class="dropdown-item" style="padding: 5px;" href="/myaccount">My
                                                        Account</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="dropdown" style="background-color: black;padding: 0 25px;">
                                                <a class=" d-block py-2" data-toggle="dropdown" href="#"
                                                    style="color: white;">
                                                    {{ Auth::user()->name }}
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" style="padding: 5px;"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout').submit()">Logout</a>

                                                    <form action="{{ route('logout') }}" method="POST" id="logout">
                                                        @csrf
                                                    </form>
                                                    <a class="dropdown-item" style="padding: 5px;"
                                                        href="/admin">Dashboard</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item "><a href="{{ route('login') }}"
                                            class="nav-link text-uppercase py-3 login">Login</a></li>
                                    <li class="nav-item"><a href="{{ route('register') }}"
                                            class="nav-link text-uppercase py-3 login">Register</a></li>
                                @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
        {{-- <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script> --}}
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/jquery.fontselect.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/layout.js') }}" defer="defer"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        {{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
        <script src="{{ asset('js/easyzoom.js') }}"></script>

        <script src="{{ asset('js/zoomsl.js') }}"></script>
        





        <script>
            // Default dropdown action to show/hide dropdown content
            $('.js-dropp-action0').click(function(e) {
                e.preventDefault();
                if ($('.dropp-body0').hasClass('js-open')) {

                    $('.dropp-body0').removeClass('js-open');
                    $('.js-dropp-action0').removeClass('js-open')
                    $(this).parent().next('.dropp-body0').toggleClass('js-open');
                } else {
                    $(this).parent().next('.dropp-body').toggleClass('js-open');
                }

                $(this).toggleClass('js-open');
                $('.dropp-body1').removeClass('js-open')
                $('.dropp-body2').removeClass('js-open')
                $('.js-dropp-action1').removeClass('js-open')
                $('.js-dropp-action2').removeClass('js-open')



            });
            $('.js-dropp-action1').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('js-open');
                $('.dropp-body0').removeClass('js-open')
                $('.dropp-body2').removeClass('js-open')
                $('.js-dropp-action0').removeClass('js-open')

                $('.js-dropp-action2').removeClass('js-open')
                $(this).parent().next('.dropp-body').toggleClass('js-open');
            });
            $('.js-dropp-action2').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('js-open');
                $('.dropp-body0').removeClass('js-open')
                $('.dropp-body1').removeClass('js-open')
                $('.js-dropp-action1').removeClass('js-open')
                $('.js-dropp-action0').removeClass('js-open')
                $(this).parent().next('.dropp-body').toggleClass('js-open');
            });
            AOS.init();
        </script>
            @livewireScripts
            <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        @include('layout.notify')
        <script src="{{ asset('assets/vendor/zoom-magnify/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('assets/js/scroll-me.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom-script.js') }}"></script>


    </body>

    </html>
