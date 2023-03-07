<?php
use App\Http\Controllers\Frontend\CartController;
use App\Models\slider;
use App\Models\cart;

$total = CartController::cartitem();
$total1 = CartController::wishlist();
$logo = slider::where('type', '=', 'logo')->get();

$user_id = Auth::id();
$cart_items = cart::where('user_id', $user_id)->get();
?>
<style>
    .box-builder-link:hover {
        color: rgb(255, 255, 255);
        background-color: rgb(3, 3, 3);
    }

    .box-builder-link {
        color: rgb(5, 5, 5);
        border: 2px solid black
    }

    .login:hover {
        color: rgb(255, 255, 255) !important;
        font-size: 150%;
        background-color: #62022e;
    }

    .login {

        color: rgb(0, 0, 0);
        line-height: 0 !important;
        margin: 5px;
        border: 0.2px solid black;
        transition: all .5s ease;
        font-family: 'Montserrat', sans-serif;
        text-align: center;
        line-height: 1;
        background-color: transparent;
        padding: 10px;
        outline: none;
        border-radius: 16px;
    }

    .login_text {
        margin: 0px 15px;
        font-size: 11px;
    }

    .nave_text {
        position: relative;
        font-size: 13px;
    }

    .nave_text:after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 1px;
        bottom: -5px;
        left: 0;
        background-color: #c91b6b;
        transform-origin: bottom center;
        transition: transform 0.25s ease-out;
    }

    .nave_text:hover:after {
        transform: scaleX(1);
        transform-origin: bottom center;
    }

    .logo {
        width: 146px;
        height: 53px;
        padding-bottom: 60px;
        position: relative;
        left: 2%;
        top: -60%;
    }

    .cart {
        min-width: 25px;
        width: 25px;
    }

    .btn_login {
        display: inline-block;
        position: absolute;
        left: 80%;
        top: 23%;
    }

    .btn_register {
        display: inline-block;
        position: absolute;
        left: 86%;
        top: 23%;
    }

    .btn_cart {
        display: inline-block;
        position: absolute;
        left: 94%;
        top: 23%;
    }

    .c_nav {
        margin-top: 16px;
        height: 70px;
    }


    .c_heder {

        margin-top: 10px;
        margin-bottom: 10px;
        height: 64px;
    }

    @media only screen and (min-width: 992px) and (max-width: 1273px) {
        .btn_login {
            display: inline-block;
            position: absolute;
            left: 85%;
            top: 23%;
        }

    }

    @media only screen and (min-width: 1150px) and (max-width: 1273px) {

        .btn_login {
            display: inline-block;
            position: absolute;
            left: 79%;
            top: 23%;
        }

        .btn_register {
            display: inline-block;
            position: absolute;
            left: 86.5%;
            top: 23%;
        }

        .btn_cart {
            display: inline-block;
            position: absolute;
            left: 96%;
            top: 23%;
        }

    }

    @media only screen and (min-width: 1273px) and (max-width: 1469px) {
        .btn_login {
            display: inline-block;
            position: absolute;
            left: 78%;
            top: 23%;
        }

        .btn_register {
            display: inline-block;
            position: absolute;
            left: 85%;
            top: 23%;
        }

    }

    @media only screen and (min-width: 992px) and (max-width: 1150px) {
        .btn_cart {
            display: inline-block;
            position: absolute;
            left: 94%;
            top: 23%;
        }

        .btn_register {
            display: none;
        }

    }


    @media only screen and (min-width: 1700px) and (max-width: 1919px) {
        .btn_login {
            display: inline-block;
            position: absolute;
            left: 82%;
            top: 23%;
        }

        .btn_register {
            display: inline-block;
            position: absolute;
            left: 87.5%;
            top: 23%;
        }

    }

    @media only screen and (width: 1920px) {
        .btn_login {
            display: inline-block;
            position: absolute;
            left: 83%;
            top: 23%;
        }

        .btn_register {
            display: inline-block;
            position: absolute;
            left: 87.5%;
            top: 23%;
        }

    }
</style>


<div class="layer ">
    <div class="group ">
        <div id="shopify-section-header" class="shopify-section">
            <div class="header">
                <div class="bg-secondary">
                    <div class="container">
                        <div class="row">
                            <div class="col ">
                                <div class="carousel carousel-fade slide " data-ride="carousel" id="header">
                                    <div class="carousel-inner">

                                        <div class="carousel-item active" style="text-align: center;">
                                            Please allow 1-2 business days for orders to ship. | Free shipping with
                                            U.S. orders $100 &amp; over!
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>


<!-- <div class="layer sticky-top">
    <div class="group">
        <div class="navigation">
            <div class="navbar navbar-light navbar-expand-lg bg-white p-0 m-0 c_heder">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex justify-content-between flex-row w-100 ">
                        <div class="navbar-collapse collapse w-100 ">
                            <ul class="navbar-nav mr-auto pr-3">

                                <li class="nav-item">
                                    <a class="nav-link py-3 pl-0" href="/collections/gift-box-builder-gifts">

                                    </a>
                                </li>

                            </ul>
                        </div>
                        <a class="navbar-toggler border-0 p-3" data-easing="none" data-duration="none"
                            data-distance="none" data-target="#stage" data-toggle="stage">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" width="20"
                                height="20">
                                <polyline points="0,6.5 20,6.5"></polyline>
                                <polyline points="0,13.5 20,13.5"></polyline>
                            </svg>
                        </a>

                        <a class="navbar-toggler border-0 p-3" href="/cart">
                            <svg class="d-block" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none"
                                width="20" height="20">
                                <polygon points="0,8 20,8 10,18"></polygon>
                                <polygon points="4,8 10,2 16,8"></polygon>
                            </svg>
                        </a>

                        <div class="navbar-collapse collapse w-100">
                            <ul class="navbar-nav ml-auto px-1">



                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="sticky-top">
    <div class="layer">
        <div class="group">
            <div id="shopify-section-navigation" class="shopify-section">

                <div class="navigation">


                    <div class="navbar navbar-light navbar-expand-lg bg-white p-0 c_heder">
                        <div class="d-flex flex-column w-100 c_nav">
                            <div class="navbar-collapse collapse w-100 ">

                                <ul class="navbar-nav m-auto px-3">


                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase py-3 "
                                            href="/collections/gift-box-builder-gifts">
                                            <dev class="nave_text">BUILD A CUSTOM BOX<dev>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown position-static">
                                        <a class="nav-link text-uppercase py-3" href="/collection/ready-to-ship">
                                            <dev class="nave_text"> READY TO SHIP BOXES<dev>
                                        </a>

                                    </li>


                                    <li class="nav-item  ">
                                        <a class="navbar-brand px-6 m-0 logo" href="/">
                                            @if ($logo->isEmpty())
                                            <p>Logo</p>
                                            @else
                                            <img src="{{ asset('upload/frontend/logo.png') }}" alt="" width="100%">
                                            @endif
                                        </a>
                                    </li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-uppercase py-3" href="/collection/coperate">
                                            <dev class="nave_text"> COPARATE GIFTING<dev>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link text-uppercase py-3" href="/about">
                                            <dev class="nave_text"> ABOUT US<dev>
                                        </a>
                                    </li>

                                    <li class="nav-item mx-lg-5 d-inline-block b">
                                        @if (Route::has('login'))
                                        @auth
                                        @if (Auth::user()->utype == 'USR')

                                        <!-- <li class="nav-item nav-link py-lg-3"></li> -->
                                        <div class="dropdown"
                                            style="background-color: rgb(255, 255, 255);padding: 0 25px;">

                                            <a class=" bi bi-person " data-toggle="dropdown" href="#"
                                                style="color: rgb(5, 5, 5);">

                                                {{ Auth::user()->name }}

                                                <i class="icon-user"></i> icon-user

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
                                        @else(Auth::user()->utype =='ADM')
                                        <div class="dropdown">

                                            <a class=" d-block py-2" data-toggle="dropdown" href="#">

                                                <i class="fas fa-user" style="font-size: 1.8rem"></i>

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
                                    <div class="btn_login_register_cart">
                                        <li class="nav-item"><a href="{{ route('login') }}"
                                                class="nav-link text-uppercase login btn_login">
                                                <div class="login_text">login</div>
                                            </a></li>

                                        <li class="nav-item"><a href="{{ route('register') }}"
                                                class="nav-link text-uppercase  login btn_register">
                                                <div class="login_text">Register</div>
                                            </a></li>

                                        @endif
                                        @endif

                                        @livewire('cart.cart-icon-component')
                                    </div>

                                </ul>
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>