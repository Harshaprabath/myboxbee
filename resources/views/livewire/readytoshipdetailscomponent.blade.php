<?php
use Illuminate\Support\Facades\Auth;
?>
<title>Ready to ship </title>
<style>
    .container {
        max-width: 1180px;
    }

    .box-options .box-option .box.selectedBox {
        border: solid 3px #000;
    }

    .box-options .box-option .box {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        color: #000;
        text-decoration: none;
        border: solid 2px #ddd;
    }

    .box-options .box-option .box .selected-flag {
        position: absolute;
        top: 0;
        right: 0;
        width: 22px;
        height: 22px;
        line-height: 22px;
        color: #fff;
        text-align: center;
    }

    .grid__item img,
    img.auto {
        max-width: 100%;
    }

    .box-options .box-option .box .box-title {
        margin: 0;
        padding: 10px 0;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
    }

    .box-options .box-option .box .selected-flag .flag-icon {
        position: relative;
        z-index: 2;
    }

    .box-options .box-option .box .selected-flag::after {

        content: '';
        position: absolute;
        top: 0;
        right: 0;
        border-color: transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-style: solid;
        border-width: 20px;
        border-right-color: #e51164;
        border-top-color: #e51164;
        z-index: 1;

    }

    .pick-card {
        display: block;
        margin: 25px 0 0 0;
        padding: 15px 20px;
        width: 100%;
        font-weight: 700;
        text-align: center;
        border: 2px dashed #ddd;
        cursor: pointer;
    }

    .btn--full {
        width: 100%;

    }

    .flex-control-thumbs img {
        max-width: 53px;
    }

    .flex-control-thumbs .owl-item {
        width: auto !important;
    }

    .flex-control-nav {
        width: 270px;
        margin: 0 200px;
    }

    .picked-card {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-flow: row nowrap;
        -moz-flex-flow: row nowrap;
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        -webkit-justify-content: flex-start;
        -moz-justify-content: flex-start;
        justify-content: flex-start;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        -moz-align-items: center;
        align-items: center;
        -webkit-align-content: center;
        -moz-align-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
        margin: 25px 0 0 0;
        width: 100%;
        border: 2px solid #000;
        cursor: pointer;
    }

    *,
    ::after,
    ::before,
    input {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .picked-card .card-image {
        max-height: 80px;
        height: 100%;
        align-self: center;
    }

    .picked-card .card-info {
        display: block;
        margin: 0;
        padding-left: 25px;
    }

    .boxfox-modal.visible {
        opacity: 1;
    }

    .boxfox-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 20px 10px;
        background: rgba(0, 0, 0, .4);
        overflow: auto;
        opacity: 0;
        z-index: 2147483647;
        display: flex;
        justify-content: center;
        align-items: center;
        -webkit-transition: opacity .25s cubic-bezier(.25, .46, .45, .94);
        -moz-transition: opacity .25s cubic-bezier(.25, .46, .45, .94);
        -ms-transition: opacity .25s cubic-bezier(.25, .46, .45, .94);
        -o-transition: opacity .25s cubic-bezier(.25, .46, .45, .94);
        transition: opacity .25s cubic-bezier(.25, .46, .45, .94);
    }

    .boxfox-modal .modal-dialog {
        margin: auto;
        width: 100%;
        max-width: 500px;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .2);
        border: solid 1px rgba(0, 0, 0, .4);
        border-radius: 6px;
        align-self: center;
        opacity: 0;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all .15s cubic-bezier(.25, .46, .45, .94);
        -moz-transition: all .15s cubic-bezier(.25, .46, .45, .94);
        -ms-transition: all .15s cubic-bezier(.25, .46, .45, .94);
        -o-transition: all .15s cubic-bezier(.25, .46, .45, .94);
        transition: all .15s cubic-bezier(.25, .46, .45, .94);
    }

    .boxfox-modal.visible .modal-dialog {
        opacity: 1;
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        transform: scale(1);
    }

    .boxfox-modal .modal-dialog-header {
        display: block;
        padding: 20px 25px 0 25px;
        font-size: 20px;
        color: #000;
        text-align: left;
    }

    .boxfox-modal .modal-dialog-content {
        display: block;
        padding: 20px 25px;
        font-size: 14px;
        color: #000;
        text-align: left;
    }

    .boxfox-modal .modal-dialog-actions {
        display: block;
        padding: 20px 25px;
        border-top: solid 1px #eaeaea;
        text-align: right;
    }

    .boxfox-modal .modal-dialog-actions .btn,
    .boxfox-modal .modal-dialog-actions .button {
        display: inline-block;
        width: auto;
    }

    .vi {
        display: none;
    }

    #card-options .card-options .card-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .75);
        border: solid 2px #36c069;
        z-index: 100;
        opacity: 0;
        -webkit-transition: opacity .25s ease-in-out;
        -moz-transition: opacity .25s ease-in-out;
        -ms-transition: opacity .25s ease-in-out;
        -o-transition: opacity .25s ease-in-out;
        transition: opacity .25s ease-in-out;
    }

    #card-options .card-options .selected .card-image::before {
        opacity: 1;
        z-index: 300;
    }

    #card-options .card-options .card-image .selected-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 36px;
        color: #36c069;
        opacity: 0;
        -webkit-transform: scale(0) translate(-50%, -50%);
        -moz-transform: scale(0) translate(-50%, -50%);
        transform: scale(0) translate(-50%, -50%);
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
        pointer-events: none;
        z-index: 301;
        background: #fff;
        border-radius: 50%;
    }

    #card-options .card-options .selected .card-image .selected-icon {
        opacity: 1;
        -webkit-transform: scale(1) translate(-50%, -50%);
        -moz-transform: scale(1) translate(-50%, -50%);
        transform: scale(1) translate(-50%, -50%);
    }

    #card-options .card-options .card-image {
        display: block;
        position: relative;
    }

    @media (max-width:768px) {

        .flex-control-nav {

            margin: 0 0px;
        }
    }

    .owl-prev,
    .owl-next {
        display: none;
    }

    .mainimage {
        width: 100% !important
    }

    #featured {
        max-width: 500px;
        max-height: 600px;

        cursor: pointer;
        border: 2px solid black;

    }

</style>


<div class="container">
    <div class="row">

        <div class="col-md-7 main-content-area">
            <div class="wrap-product-detail">
                <div class="detail-media" style="width: 100%;">
                    <div class="product-gallery">
                        <ul class="slides">
                            <?php
                            $img = $ready->images;
                            if ($img == '') {
                            } else {
                                $explodeimg = explode('|', $img);
                                for ($i = 0; $i < count($explodeimg); $i++) {
                                    $img = $explodeimg[$i];
                            ?>

                            <li data-thumb="{{ asset('upload') }}/<?php echo $img; ?>">
                                <img class="big_img" src="{{ asset('upload') }}/<?php echo $img; ?>"
                                    alt="product " />
                            </li>
                            <?php }
                            } ?>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-5 main-content-area">
            <div class="text-center">
                <input type="hidden" class="id" id="prod_id" value="{{ $ready->id }}">
                <h1 class="h2">{{ $ready->name }}</h1>

                <h5 class="product__price uppercase h5">
                    <span class="money"><span id="ProductPrice-product">${{ $ready->price }}</span></span>
                    <!--
                    <p class="small compare-at em" id="ComparePriceWrapper-product" style="display: none">
                        <span class="money compare-at"><span id="ComparePrice-product">$0.00</span></span>
                    </p> -->
                </h5>
                <p class="afterpay-paragraph" data-product-id="20779008012"><span class="afterpay-text1">or 4
                        interest-free payments of </span><strong
                        class="afterpay-instalments">${{ $ready->afterpay }}</strong><span class="afterpay-text2"> with
                    </span><img class="afterpay-logo"
                        style="vertical-align: middle; width: 100px; border: 0px none;display: inline;"
                        src="https://static.afterpay.com/integration/product-page/logo-afterpay-colour.png"
                        srcset="https://static.afterpay.com/integration/product-page/logo-afterpay-colour.png 1x, https://static.afterpay.com/integration/product-page/logo-afterpay-colour@2x.png 2x, https://static.afterpay.com/integration/product-page/logo-afterpay-colour@3x.png 3x"
                        alt="Afterpay" width="100" height="21"><span class="afterpay-text3">&nbsp;</span><a
                        class="afterpay-link" href="https://www.afterpay.com/installment-agreement" target="_blank"><u
                            class="afterpay-link-inner" style="font-size: 12px; text-decoration: underline;">More
                            info</u></a></p>

            </div>
            <div class="product-description rte" itemprop="description">
            </div>
            <div class="block accordion">

                <div>
                    <input type="radio" name="accordion" id="dimensions-20779008012" checked="">

                    <label for="dimensions-20779008012">

                        Description

                    </label>

                    <span>

                        {{ $ready->descrription }}
                    </span>

                </div>
                <div>

                    <input type="radio" name="accordion" id="details-20779008012">

                    <label for="details-20779008012">

                        Includes

                    </label>

                    <span>

                        {{ $ready->includes }}
                    </span>

                </div>

                <div>

                    <input type="radio" name="accordion" id="source-20779008012">

                    <label for="source-20779008012">

                        The Details

                    </label>

                    <span>

                        {{ $ready->details }}
                    </span>

                </div>

                <style>
                    label {
                        display: block;
                    }

                    .accordion {

                        padding: 0px 5px !important;

                    }

                    .accordion label {

                        border-bottom: 1px solid #cccccc;

                        margin-bottom: 20px;

                        line-height: 30px;

                        text-align: center;

                        text-transform: uppercase;

                        font-family: "sofia-pro", sans-serif;

                        letter-spacing: 1px;

                        font-size: 0.8em;

                        font-weight: bold;

                    }

                    .accordion label:after {

                        content: '–';

                        float: right;

                    }

                    .accordion span,

                    .accordion input {

                        display: none;

                    }

                    .accordion input:checked~span {

                        display: block;

                        text-align: justify;

                        padding-bottom: 10px;

                    }

                    .accordion input:checked~label:after {

                        content: '+';

                    }

                    input[type="checkbox"]+label,

                    input[type="radio"]+label {

                        font-weight: bold;

                    }

                </style>

            </div>
            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                <meta itemprop="priceCurrency" content="USD">
                <meta itemprop="price" content="78">
                <link itemprop="availability" href="http://schema.org/InStock">
                <form action="/cart/add" method="post" enctype="multipart/form-data" id="AddToCartForm"
                    data-section="product"
                    class="product-form-product product-form  ng-pristine ng-valid ng-valid-maxlength"
                    ng-submit="addToCart($event)">
                    <div class="quantity-selector__wrapper text-center" id="Quantity-product">
                        <label for="Quantity" class="quantity-selector uppercase">Quantity</label>
                        <div class="quantity " style="border: 1px solid;padding: 5px;margin: 0 116px;">
                            <input type="hidden" value="{{ $ready->price }}" class="priceinput">
                            <button type="button" class="decrement-btn" data-id="" data-qty="0">−</button>
                            <input type="text" class="qty-input1 m-auto" style="width: 59px;text-align: center;"
                                value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="quantity"
                                id="" data-submit="">
                            <button type="button" class="increment-btn " data-id="" data-qty="11">+</button>
                        </div>
                    </div>
                    <input type="hidden" value="{{ Auth::id() }}" id="auth">

                    <div class="custom-form mt-4 ">
                        <label class="custom-form-label" style="text-align: center;">BOX COLOR</label>
                        <div class="box-options row">
                            <!-- ngRepeat: box in boxes -->
                            @foreach ($boxs as $box)
                                <div class="box-option ng-scope col-md-6">
                                    <div class="box  {{ $box->id }}" onclick="selectedbox({{ $box->id }})">
                                        <span class="selected-flag ng-scope {{ $box->id }}">
                                            <i class="flag-icon fas fa-check"></i>
                                        </span>
                                        <img alt="" src="{{ asset('upload') }}/{{ $box->image }}">
                                        <div class="box-title ng-binding">{{ $box->name }}</div>
                                    </div>
                                </div><!-- end ngRepeat: box in boxes -->
                            @endforeach
                        </div>
                    </div>

                    <!-- ngIf: selectedCard === null -->
                    <div class="pick-card ng-scope pic" id="pic">
                        Pick a card

                    </div><!-- end ngIf: selectedCard === null -->
                    <div id="pic1">

                    </div>
            </div>

            <div class="add-to-cart__wrapper" style="max-width: 100%;margin: 29px 0;">
                <button type="button" style="padding: 19px;border: 1px solid;" name="add" id="AddToCart-product"
                    class="btn btn--large btn--full btn--clear uppercase addToCart" onclick="addcart()">
                    <span id="AddToCartText-product">Add to Cart</span>
                    <!--
                            <span>Pre-Order</span> -->

                    <span class="add-to-cart__price money"><span class="buttonPrice" id="ButtonPrice-product"
                            data-item-price="7800"></span></span>
                </button>


            </div>
            </form>

        </div>
    </div>
</div>
</div>

<!-- modal -->
<style>
    .pick-card-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 0;
        padding: 20px;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, .4);
        overflow: auto;
        z-index: 9999;
    }

    .pick-card-modal .pick-card-wrapper {
        margin: auto;
        padding: 20px;
        max-width: 1180px;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
    }

    #card-options .card-wrapper {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
        align-items: flex-start;
        align-content: flex-start;
    }

    #card-options .card-options .card-options-list {
        display: block;
        margin: -10px;
        padding: 0;
        font-size: 0;
        list-style: none;
        text-align: left;
    }

    #card-options .card-options .card-options-list li {
        display: inline-block;
        margin: 0;
        padding: 10px;
        width: 25%;
        font-size: 14px;
        text-align: center;
        vertical-align: top;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    #card-options .card-options a {
        display: block;
        margin: 0 auto;
        text-decoration: none;
    }

    #card-options .card-options .card-image .selected-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 36px;
        color: #36c069;
        opacity: 0;
        -webkit-transform: scale(0) translate(-50%, -50%);
        -moz-transform: scale(0) translate(-50%, -50%);
        transform: scale(0) translate(-50%, -50%);
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
        pointer-events: none;
        z-index: 301;
        background: #fff;
        border-radius: 50%;
    }

    #card-options .card-options .card-title {
        margin-top: 10px;
        font-weight: 700;
    }

</style>
<div class="container">
    <div id="model" class="pick-card-modal">
        <div class="pick-card-wrapper">
            <div id="card-options">
                <h1 class="step-title primary">Choose Your Card</h1>
                <div class="step-description" style="margin: 22px;">
                    <p>Choose the perfect card for the occasion from our selection of exclusive designs. Our team
                        handwrites each and every note to keep your gifts personal. (Plus, we have great handwriting.)
                    </p>
                </div>

                <div class="card-wrapper">
                    <div class="card-options active">
                        <ul class="card-options-list desktop-4 tablet-3 mobile-2">

                            @foreach ($cards as $card)
                                <li class="ng-scope {{ $card->id }}">

                                    <a href="#" class="selectcard" onclick="selectCard({{ $card }})">
                                        <div class="card-image">
                                            <img src="{{ asset('upload') }}/{{ $card->image }}">
                                            <i class="selected-icon far fa-check-circle"></i>
                                        </div>
                                        <div class="card-title ng-binding">{{ $card->name }}</div>
                                    </a>
                                </li><!-- end ngRepeat: card in cards -->
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div style="justify-content: end;display: flex">
                    <button class="btn btn-danger cancel">Cancel</button>
                </div>
            </div>

        </div>

    </div>
</div>
</div>


<script>
    $('.pick-card').click(function() {
        var model = document.getElementById('model');
        model.style.display = 'block'
    })
    $('.cancel').click(function() {
        var model = document.getElementById('model');
        model.style.display = 'none'
    })

    function selectCard(data) {
        console.log(data.image);
        var model = document.getElementById('model1');
        model.style.display = 'flex'
        $('#card_id').val(data.id)
        document.getElementById('cardprev').style.backgroundImage = 'url({{ asset('upload') }}/' + data.image + ')'

    }
</script>

<div class="container">
    <div id="model1" class="pick-card-modal" style="justify-content: center">
        <div class="pick-card-wrapper col-md-11">
            <div id="card-options">
                <h1 class="step-title primary">Write Your Message</h1>
                <!-- <div class="step-description" style="margin: 22px;">
                    <p>Choose the perfect card for the occasion from our selection of exclusive designs. Our team handwrites each and every note to keep your gifts personal. (Plus, we have great handwriting.)</p>
                </div> -->

                <div class="row">

                    <div class="col-md-6" style="margin: 68px 0;">
                        <form action="" style="text-align: start;">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="To">To</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="to" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="To">From</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control " id="from">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="To">Message</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <style>
                                .font-select {
                                    width: 100%;
                                }

                            </style>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="To">Font</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="font1" type="text"
                                        class="form-control bg-transparent border-0 px-0 col-md-12">
                                </div>
                            </div>


                        </form>
                    </div>

                    <input type="hidden" id="card_id">
                    <div class="col-md-6"
                        style="font-size: 22px;background-size: contain;background-repeat: no-repeat"
                        id="cardprev">
                        <div class="no-gutters" style="margin: 123px 25px">
                            <div class="resizeme" style="text-align: center">
                                <svg width="100%" height="100%" viewBox="0 0 500 600"
                                    preserveAspectRatio="xMinYMin meet">
                                    <foreignObject width="100%" height="100%" xmlns="http://www.w3.org/1999/xhtml">
                                        <div xmlns="http://www.w3.org/1999/xhtml">
                                            <div class="col px-2 px-lg-4">
                                                <div class="">

                                                    <div class="previewto prev" style="text-align: center;padding:0px 30px">

                                                    </div>
                                                </div>
                                               

                                                <div class="" style="margin: 50px 0">

                                                    <div class=" previewmessage prev" style="padding: 0 26px 0 10px;">

                                                    </div>
                                                </div>
                                                <div class="">

                                                    <div class="previewfrom prev" style="text-align: center;padding:0px 30px">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </foreignObject>

                                </svg>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="form-group row justify-content-start">

                    <button class="btn cancel"
                        style="background-color: red;color: white;font-size: 15px;padding: 10px;">CANCEL</button>

                    &nbsp;
                    <button class="btn"
                        style="background-color: green;color: white;font-size: 15px;padding: 10px;"
                        onclick="store()">NEXT</button>

                </div>


            </div>

        </div>


    </div>
</div>
</div>

<div class="modl vi">
    <div class="modal-dialog alert">
        <div class="modal-dialog-header">Please select a card!</div>
        <div class="modal-dialog-content">You must select a card before adding this box to your cart.</div>
        <div class="modal-dialog-actions">
            <button class="btn btn-dark okwarnbing" type="button" style="cursor: pointer;pointer-events: all;">
                Okay
            </button>
        </div>
    </div>
</div>
<div class="modl1 vi">
    <div class="modal-dialog alert">
        <div class="modal-dialog-header">Please select a Box!</div>
        <div class="modal-dialog-content">You must select a box before adding this box to your cart.</div>
        <div class="modal-dialog-actions">
            <button class="btn btn-dark okwarnbing1" type="button" style="cursor: pointer;pointer-events: all;">
                Okay
            </button>
        </div>
    </div>
</div>
<div class="modl2 vi">
    <div class="modal-dialog alert">
        <div class="modal-dialog-header">You can type 350 characters. </div>
        <div class="modal-dialog-content">Chracters Limited</div>
        <div class="modal-dialog-actions">
            <button class="btn btn-dark okwarnbing2" type="button" style="cursor: pointer;pointer-events: all;">
                Okay
            </button>
        </div>
    </div>
</div>
<div id="cart_load" class="cart-flyout ng-scope visible">

</div>
<style>
    .selected-flag {
        display: none;
    }

    .display {
        display: block;
    }

</style>
<script>
    $(document).ready(function() {

        $('.big_img').imagezoomsl({
            zoomrange: [3, 3]
        })

    })
</script>
<script>
    $('.cancel').click(function() {

        var model = document.getElementById('model1');
        model.style.display = 'none'
    })
    var id = localStorage.getItem('boxid');
    if (!$('.' + id).hasClass("selectedBox")) {
        $('.display').removeClass("display");
        $(".selectedBox").removeClass("selectedBox");
        $('.' + id).addClass("selectedBox");
        $('.' + id).addClass("display");

    }

    function selectedbox(id) {

        localStorage.setItem('boxid', id);
        // $('.'+id).addClass('selectedBox');
        if (!$('.' + id).hasClass("selectedBox")) {
            $('.display').removeClass("display");
            $(".selectedBox").removeClass("selectedBox");
            $('.' + id).addClass("selectedBox");
            $('.' + id).addClass("display");

        } else {
            return false;
        }

    }
    var price = $('.priceinput');

    var pricefi = price.val() * $('.qty-input1').val();
    $('.buttonPrice').text('$' + pricefi + '.00');
    $('.changeqty').click(function() {
        var quantity = $(this).closest(".quantity").find('.qty-input1').val();
        var finalprice = price.val() * quantity;
        $('.buttonPrice').text('$' + finalprice + '.00');

    })
    var to = document.getElementById('to');
    var from = document.getElementById('from');
    var message = document.getElementById('message');
    to.addEventListener('keyup', function(event) {
        $('.previewto').text( event.target.value)
    })
    from.addEventListener('keyup', function(event) {
        $('.previewfrom').text(event.target.value)
    });
    message.addEventListener('keyup', function(event) {
        if (event.target.value.length >= 350) {
            console.log(event.target.value.length);
            $('.modl2').removeClass('vi')
            $('.modl2').addClass('boxfox-modal')
            $('.modl2').addClass('visible')

            return false;
        } else {
            $('.previewmessage').text(event.target.value)
        }

    })

    $('.okwarnbing').click(function() {
        $('.modl').addClass('vi');
    })
    $('.okwarnbing1').click(function() {
        $('.modl1').addClass('vi');
    })
    $('.okwarnbing2').click(function() {
        $('.modl2').addClass('vi');
    })

    function store() {
        const id = $('#card_id').val();
        const to = $('#to').val();
        const from = $('#from').val();
        const message = $('#message').val();
        var obj = {
            'id': id,
            'to': to,
            'from': from,
            'message': message
        }

        if (!to) {
            console.log('required to');
        } else if (!from) {
            console.log('required from');
        } else if (!message) {
            console.log('required message');
        } else {
            var model = document.getElementById('model1');
            document.getElementById('model').style.display = "none"
            model.style.display = 'none'
            localStorage.setItem('setcard', JSON.stringify(obj));
            var old = localStorage.setItem('setcardold', id);
            render();


        }


    }

    var cards = {};
    @foreach ($cards as $c)
        cards["{{ $c->id }}"] = {
        image: "{{ asset('upload') }}/{{ $c->image }}",
        title: "{{ $c->name }}|{{ $c->title }}",
        price: "{{ $c->price }}",
        id: "{{ $c->id }}"
        };
    @endforeach;
    var data = {
        cards
    }
</script>

<script>
    // $('.cart-flyout').addClass('visible');
    //                     $('#cart_load').load('/cart/model');

    render();
    // document.getElementById('pic1').style.display='none';
    function render() {
        var json = localStorage.getItem('setcard');
        var states = JSON.parse(json);

        // console.log(states.id);
        var card = data.cards[states.id];
        if (!states) {
            document.getElementById('pic1').style.display = 'none';

        } else {
            document.getElementById('pic').style.display = 'none';
            document.getElementById('pic1').style.display = 'block';

            document.getElementById('pic1').innerHTML = (
                '<div  class="picked-card ng-scope"  onclick="showCardModal()">' +
                '<img class="card-image" src="' + card.image + '">' +
                '<div class="card-info">' +
                '<div class="title ng-binding" ng-bind="selectedCard.title">' + card.title + '</div>' +
                '<div class="subtitle">(change card)</div>' +
                '</div>' +
                '</div>' +
                '<div class="mt-5">' +
                '<div class="row">' +
                '<div class="form-group col-md-5">' +
                '<label> To </label>' +
                '<div> ' + states.to + ' </div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label> From </label>' +
                '<div>' + states.from + ' </div>' +
                '</div>' +
                '<div class="form-group col-md-12">' +
                '<label> Message </label>' +
                '<div>' + states.message + ' </div>' +
                '</div>' +
                '</div>' +
                '</div>'


            )


        }
    }


    function showCardModal() {
        var getid = localStorage.getItem('setcardold');
        var model = document.getElementById('model');
        model.style.display = 'block';
        var json = localStorage.getItem('setcard');
        var states = JSON.parse(json);
        $('.' + getid).addClass('selected')
        if ($('.' + getid).hasClass('selected')) {
            $('.selected').removeClass('selected')
            $('.' + states.id).addClass('selected');

        }

    }

    function addcart() {
        var json = localStorage.getItem('setcard');
        var box = localStorage.getItem('boxid');
        var states = JSON.parse(json);
        var ids = $('.id').val();
        var font = $('#font1').val();
        var auth = $('#auth').val();

        var quantity = $('.qty-input1').val();
        if (!box) {
            $('.modl1').removeClass('vi')
            $('.modl1').addClass('boxfox-modal')
            $('.modl1').addClass('visible')
        } else if (!states) {
            $('.modl').removeClass('vi')
            $('.modl').addClass('boxfox-modal')
            $('.modl').addClass('visible')
        } else {
            var xhr = new XMLHttpRequest();
            xhr.open(
                'POST',
                '/add-to-cart/radyoship'
            );
            xhr.setRequestHeader(
                'Content-Type',
                'application/json'
            );
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.addEventListener(
                'load',
                function(event) {
                    // var response =this.response;
                    var response = JSON.parse(this.response);
                    setcart(response, 'rts');

                    // if (response == 200) {
                    //     $('.cart-flyout').addClass('visible');
                    //     $('#cart_load').load('/cart/model');
                    //     reset();

                    // } else {
                    //     console.log('There was a problem adding to the cart.');
                    // }
                }
            );
            xhr.send(
                JSON.stringify({
                    properties: {
                        box: Math.random().toString(36).substr(2, 5)
                    },
                    box_id: box,
                    ship: ids,
                    id: states.id,
                    status: 'RTS',
                    to: states.to,
                    from: states.from,
                    message: states.message,
                    quantity: quantity,
                    font: font
                })
            );
        }

    }
</script>
