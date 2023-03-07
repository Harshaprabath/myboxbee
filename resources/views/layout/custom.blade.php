<!DOCTYPE html>
<html lang="en">
    @php
        $logo = App\Models\slider::where('type', '=', 'logo')->get();
    @endphp
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

            {{-- livewire Styles --}}
            @livewireStyles

            <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
            {{-- Theme styles --}}
            <link type="text/css" href="{{ asset('css/layout.theme.css') }}" rel="stylesheet">
            <link type="text/css" href="{{ asset('css/theme.css') }}" rel="stylesheet">
            
            {{-- Other Styles Libraries --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/sweetalert2/sweetalert2.min.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/flexslider/flexslider.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-select/jquery.fontselect.css') }}">
            
            {{-- Custom Styles --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
            <style>
                .layer.sticky-top.heder-hide1 {
                    /* height: 3px; */
                }
                .c_heder{
                    height: 60px !important;
                }
                .navbar .dropdown:hover .dropdown-menu {
    display: block;
}
.btn_cart .dropdown .dropdown-menu {
    width: 260px;
    padding: 5px 15px;
    overflow: hidden;
    overflow-y: scroll;
    max-height: 250px;
}

.cart-item-image {
    max-width: 65px;
    min-width: 65px;
    max-height: 65px;
}

.cart-item-content {
    padding: 2px 12px;
    font-size: 13px;
    font-weight: 600;
}

.cart-item-content .price {
    color: #9b9999;
    font-size: 12px;
    padding-top: 10px;
}
.cart-item-total {
    font-size: 14px;
    font-weight: 800;
    text-align: right;
    width: 100%;
    padding: 12px 10px;
}
.cart-item-checkout-btn {
    padding: 12px;
    text-align: center;
}
.cart-items-count {
    position: absolute;
    top: 0;
    left: 28px;
    background: red;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    text-align: center;
    line-height: 20px;
    color: #fff;
    font-weight: 700;
}
            </style>
    </head>
    <body class="home-page home-01">
        <div class="stage" id="stage">
        @include('layout.navbar')
        <div class="layer">
            <div class="group ">
                <div class="main">
        {{-- page content --}}
        <main class="bg-ash"> {{ $slot }}</main>
                </div>
                @include('components.includes.footer')
            </div>
        </div>
        {{-- page content end --}}
        </div>
        {{-- livewire Scripts --}}
        @livewireScripts

        <script src="{{ asset('assets/vendor/jquery/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/popover/popover.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        
        {{-- Other Script Libraries --}}
        <script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
        {{-- Livewire Sweetalert Script --}}
        <x-livewire-alert::scripts />
        <script src="{{ asset('assets/vendor/flexslider/jquery.flexslider.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/zoom-magnify/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/font-select/jquery.fontselect.js') }}"></script>
        {{-- custom scripts --}}
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>