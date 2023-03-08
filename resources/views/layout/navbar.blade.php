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



.login {
    color: rgb(0, 0, 0);
    line-height: 0 !important;
    margin: 5px;
    border: 0.2px solid black;
    transition: all .5s ease;

    text-align: center;
    line-height: 1;
    background-color: transparent;
    padding: 10px;
    outline: none;
    border-radius: 16px;

}

.login:hover {
    color: #8b8b8b !important;

}

.logo {
    width: 146px;
    height: 53px;
    padding-bottom: 60px;
    position: relative;
    left: 2%;
    top: -60%;
}


.c_heder {
    position: fixed;
    width: -webkit-fill-available;
    margin-top: -32px;
    margin-bottom: 16px;
    height: 33px;
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

.c_heder_center {
    position: absolute;
    top: -6%;
    left: 2%;
}

@media only screen and (max-width: 993px) {
    .heder-hide {
        display: none;
    }

}

@media only screen and (min-width: 992px) {

    .c_heder {
        margin-top: -32px;
        margin-bottom: 16px;
        height: 33px;
    }
    .log-hide{
    display: none;
}
    
}

@media only screen and (min-width: 992px) and (max-width: 1022px) {
    .c_heder {
        position: fixed;
        width: 94%;
        margin-top: -32px;
        margin-bottom: 16px;
        height: 33px;
    }

}

@media only screen and (min-width: 1022px) and (max-width: 1176px) {
    .c_heder {
        position: fixed;
        width: 96%;
        margin-top: -32px;
        margin-bottom: 16px;
        height: 33px;
    }

}

.login_register {
    font-size: 2em;
    color: #8b8b8b;
}

.shopping-cart {
    font-size: 1.6em;
    color: #8b8b8b;
    position: fixed;
    top: 55px;
}

.shopping-cart-mb {

    color: #8b8b8b;
}

.login_register:hover {
    color: #d0d0d0 !important;


}

.shopping-cart:hover {
    color: #d0d0d0 !important;

}

.user {
    color: #8b8b8b;
    position: relative;
    top: 25%;
    right: -30%;
}

.user:hover {
    color: #d0d0d0 !important;
}

.user_icon {
    font-size: 1.6em;
}

.navbar-brand-centered {
    position: absolute;
    left: 50%;
    display: block;
    width: 200px;
    text-align: center;
    transform: translateX(-50%);
}

.cart-aln {
    margin-right: 2%;
}
</style>
<div class="layer">
    <div class="group ">
        <div id="shopify-section-header" class="shopify-section">
            <div class="header">
                <div class="bg-secondary">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="carousel carousel-fade slide" data-ride="carousel" id="header">
                                    <div class="carousel-inner">

                                        <div class="carousel-item active">
                                            <div class="text-center  my-1">
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

<div class="layer sticky-top heder-hide1 ">
    <div class="group">
        <div class="navigation">
            <div class="navbar navbar-light navbar-expand-lg bg-white p-0 m-0">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex justify-content-between flex-row w-100">
                        <div class="navbar-collapse collapse w-100">
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


                        <a class="navbar-brand px-6 m-0 logo log-hide" href="/">
                            @if ($logo->isEmpty())
                            <p>Logo</p>
                            @else
                            <img src="{{ asset('upload/frontend/logo.png') }}" alt="" width="60%">
                            @endif
                        </a>


                        <a class="navbar-toggler border-0 p-3" href="/cart">
                            <i class="fas fa-shopping-cart shopping-cart-mb" width="20" height="20"></i>
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
</div>

<div class="sticky-top heder-hide" style="top: 50px;">
    <div class="layer">
        <div class="group">
            <div id="shopify-section-navigation" class="shopify-section">

                <div class="navigation">


                    <div class="navbar navbar-light navbar-expand-lg bg-white p-0 c_heder">
                        <div class="d-flex flex-column w-100">
                            <div class="navbar-collapse collapse w-100 c_heder_center">

                                <ul class="navbar-nav m-auto px-3">


                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase py-3"
                                            href="/collections/gift-box-builder-gifts/box">
                                            <dev class="nave_text">BUILD A CUSTOM BOX<dev>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown position-static">
                                        <a class="nav-link text-uppercase py-3" href="/collection/ready-to-ship">
                                            <dev class="nave_text"> READY TO SHIP BOXES<dev>
                                        </a>

                                    </li>

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
                                        <a class="nav-link text-uppercase py-3 " href="/collection/coperate">
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
                                        <div class="dropdown user">

                                            <a class=" bi bi-person  " data-toggle="dropdown" href="#">

                                                {{ Auth::user()->name }}

                                                <i class="fas fa-user user_icon "></i>

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

                                                <i class="fas fa-user"></i>

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
                                    <li class="nav-item"><a href="{{ route('login') }}"
                                            class="nav-link text-uppercase py-3 "><i
                                                class="fas fa-sign-in-alt login_register"></i></a></li>

                                    <li class="nav-item"><a href="{{ route('register') }}"
                                            class="nav-link text-uppercase py-3 "><i
                                                class="fas fa-user-plus login_register"></i></a></li>

                                    @endif
                                    @endif


                                    @livewire('cart.cart-icon-component')


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