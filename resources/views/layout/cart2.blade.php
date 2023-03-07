<?php
use App\Http\Controllers\Frontend\CartController;
$total = CartController::cartitem();

?>
<script>
    load();
   
        </script>
<style>
    .buttonload{
        display: none;
    }
    .cart-flyout.visible .cart-flyout-wrapper {
        right: 0;
    }

    .cart-flyout .cart-flyout-wrapper {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-flow: column nowrap;
        -moz-flex-flow: column nowrap;
        -ms-flex-flow: column nowrap;
        flex-flow: column nowrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        -webkit-justify-content: flex-start;
        -moz-justify-content: flex-start;
        justify-content: flex-start;
        -webkit-box-align: stretch;
        -ms-flex-align: stretch;
        -webkit-align-items: stretch;
        -moz-align-items: stretch;
        align-items: stretch;
        -webkit-align-content: stretch;
        -moz-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;
        position: fixed;
        margin: 0;
        padding: 0;
        top: 0;
        right: -420px;
        bottom: 0;
        width: 420px;
        max-width: 100%;
        height: 100%;
        background: #fff;
        overflow: hidden;
        -webkit-transition: right .25s ease-in-out;
        -moz-transition: right .25s ease-in-out;
        -ms-transition: right .25s ease-in-out;
        -o-transition: right .25s ease-in-out;
        transition: right .25s ease-in-out;
        z-index: 20001;
    }

    .cart-flyout .cart-flyout-wrapper .cart-header {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
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
        margin: 0;
        padding: 0;
        border-bottom: solid 1px #ddd;
    }

    .cart-flyout .cart-flyout-wrapper .cart-header .btn--large,
    .cart-flyout .cart-flyout-wrapper .cart-header .h1,
    .cart-flyout .cart-flyout-wrapper .cart-header .h1--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .h2,
    .cart-flyout .cart-flyout-wrapper .cart-header .h2--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .h3,
    .cart-flyout .cart-flyout-wrapper .cart-header .h3--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .h4,
    .cart-flyout .cart-flyout-wrapper .cart-header .h4--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .h5,
    .cart-flyout .cart-flyout-wrapper .cart-header .h5--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .h6,
    .cart-flyout .cart-flyout-wrapper .cart-header .h6--body,
    .cart-flyout .cart-flyout-wrapper .cart-header .header-logo,
    .cart-flyout .cart-flyout-wrapper .cart-header .home__title,
    .cart-flyout .cart-flyout-wrapper .cart-header .product-form label,
    .cart-flyout .cart-flyout-wrapper .cart-header .title,
    .cart-flyout .cart-flyout-wrapper .cart-header .title--flex,
    .cart-flyout .cart-flyout-wrapper .cart-header h1,
    .cart-flyout .cart-flyout-wrapper .cart-header h2,
    .cart-flyout .cart-flyout-wrapper .cart-header h3,
    .cart-flyout .cart-flyout-wrapper .cart-header h4,
    .cart-flyout .cart-flyout-wrapper .cart-header h5,
    .cart-flyout .cart-flyout-wrapper .cart-header h6,
    .product-form .cart-flyout .cart-flyout-wrapper .cart-header label {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        margin: 0;
        padding: 15px 20px;
        font-size: 18px;
        line-height: 1;
        text-align: left;
    }

    .cart-flyout .cart-flyout-wrapper .cart-header .close {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        margin: 0;
        padding: 15px 20px;
        color: #000;
        font-size: 18px;
        line-height: 1;
        background: 0 0;
        border: none;
        outline: 0;
        text-align: center;
    }

    .cart-flyout .cart-flyout-wrapper .cart-header .count {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        margin: 0;
        padding: 15px 20px;
        font-size: 13px;
        line-height: 1;
        text-align: right;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-shipping {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
    }

    .cart-shipping {
        margin: 0 0 20px 0;
        padding: 0;
    }

    .cart-shipping .shipping-progress {
        margin: 0 0 10px 0;
    }

    .cart-shipping .shipping-helper {
        margin: 0;
        color: #000;
        font-size: 12px;
        text-align: left;
    }

    label.checkbox {
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
        -webkit-box-align: start;
        -ms-flex-align: start;
        -webkit-align-items: flex-start;
        -moz-align-items: flex-start;
        align-items: flex-start;
        margin: 0;
        cursor: pointer;
    }

    label.checkbox input[type="checkbox"] {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        position: relative;
        display: inline-block;
        margin: 0 7px 0 0;
        width: 18px;
        height: 18px;
        outline: 0;
        color: #fff;
        border-radius: 3px;
        border: solid 2px #000;
        -webkit-appearance: none;
        background: 0 0;
        vertical-align: middle;
        cursor: pointer;
        -webkit-transition: all .25s ease-in-out;
        -moz-transition: all .25s ease-in-out;
        -ms-transition: all .25s ease-in-out;
        -o-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
    }

    label.checkbox span {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        display: inline-block;
        margin: 0;
        line-height: 18px;
        font-weight: 400;
        vertical-align: middle;
    }

    .cart-addon-carousel {
        margin: 10px 0 0 0;
        padding: 10px 20px;
        background: #fdf0e2;
        border: solid 1px #fae4cb;
        border-radius: 2px;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-container {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        margin: 0;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-flow: column nowrap;
        -moz-flex-flow: column nowrap;
        -ms-flex-flow: column nowrap;
        flex-flow: column nowrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        -webkit-justify-content: flex-start;
        -moz-justify-content: flex-start;
        justify-content: flex-start;
        -webkit-box-align: stretch;
        -ms-flex-align: stretch;
        -webkit-align-items: stretch;
        -moz-align-items: stretch;
        align-items: stretch;
        -webkit-align-content: stretch;
        -moz-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 20px;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
        background: #fafafa;
    }

    .cart-group {
        margin: 20px 0 0 0;
    }

    .cart-group .cart-group-title {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .cart-group .cart-group-description {
        margin: 5px 0 15px 0;
        font-size: 12px;
        line-height: 1.3;
    }

    .cart-item {
        display: block;
        margin: 10px 0 0 0;
        padding: 20px;
        background: #fff;
        border: solid 1px #ddd;
        border-radius: 2px;
    }

    .cart-item .item-info {
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
        -webkit-box-align: stretch;
        -ms-flex-align: stretch;
        -webkit-align-items: stretch;
        -moz-align-items: stretch;
        align-items: stretch;
        -webkit-align-content: stretch;
        -moz-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer .subtotal-row {
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
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-subtotals {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        margin: 20px 0 0 0;
        padding: 20px 0 0 0;
        border-top: solid 1px #ddd;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-subtotals .subtotal-row {
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
        margin: 0;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-subtotals .subtotal-row .label,
    .cart-flyout .cart-flyout-wrapper .cart-body .cart-subtotals .subtotal-row .value {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
    }

    .cart-flyout .cart-flyout-wrapper .cart-body .cart-subtotals .subtotal-row .label {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        text-align: left;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        margin: 0;
        padding: 20px;
        border-top: solid 1px #ddd;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer .actions {
        margin: 0;
        padding: 15px 0 0 0;
    }

    .button {
        /* display: block; */
        margin: 0;
        padding: 15px 20px;
        width: 100%;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        text-align: center;
        color: #fff;
        background: #000;
        border: solid 1px #000;
        outline: 0;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer .subtotal-row .label {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        text-align: left;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer .subtotal-row .label,
    .cart-flyout .cart-flyout-wrapper .cart-footer .subtotal-row .value {
        margin: 0;
        padding: 0;
        color: #000;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.5;
    }

    .cart-flyout .cart-flyout-wrapper .cart-footer .disclaimer {
        padding: 15px 0 0 0;
        font-size: 10px;
        line-height: 1.2;
    }

    .cart-item .item-info {
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
        -webkit-box-align: stretch;
        -ms-flex-align: stretch;
        -webkit-align-items: stretch;
        -moz-align-items: stretch;
        align-items: stretch;
        -webkit-align-content: stretch;
        -moz-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .cart-item .item-info .item-photo {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        margin: 0;
        padding: 0;
        width: 100px;
    }

    .cart-item .item-info .item-photo a,
    .cart-item .item-info .item-photo img {
        display: block;
        width: 100%;
        max-width: 100%;
    }

    .cart-item .item-info .item-details {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        position: relative;
        margin: 0;
        padding: 0 0 0 20px;
        width: 100%;
    }

    .cart-item .item-info .item-details .item-remove {
        position: absolute;
        top: 0;
        right: 0;
        width: auto;
        color: #999;
        font-size: 13px;
        line-height: 1.3;
        text-align: center;
        cursor: pointer;
    }

    .cart-item .item-info .item-details .item-title {
        display: block;
        margin: 0;
        padding-right: 24px;
    }

    .cart-item .item-info .item-details .item-title .item-product-vendor {
        display: block;
        color: #000;
        font-size: 13px;
        line-height: 1.3;
        text-decoration: none;
        text-transform: uppercase;
    }

    .cart-item .item-info .item-details .item-title .item-product-title {
        display: block;
        color: #000;
        font-size: 11px;
        line-height: 1.3;
        text-decoration: none;
        text-transform: uppercase;
    }

    .cart-item .item-info .item-details .item-title .item-variant-title {
        display: block;
        color: #999;
        font-size: 14px;
        line-height: 18px;
        text-decoration: none;
    }

    .cart-item .item-info .item-details .item-title .item-properties {
        display: block;
        margin: 10px 0 0 0;
        font-size: 11px;
        line-height: 1.3;
    }

    .cart-item .item-info .item-details .item-price-quantity {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-flow: row nowrap;
        -moz-flex-flow: row nowrap;
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        -moz-justify-content: space-between;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        -moz-align-items: center;
        align-items: center;
        margin: 10px 0 0 0;
        width: 100%;
    }

    .cart-item .item-info .item-details .item-price-quantity .item-price {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -moz-box-flex: 0;
        -moz-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        font-size: 13px;
        line-height: 1.3;
        text-transform: uppercase;
        text-align: left;
    }

    .cart-item .item-info .item-details .item-price-quantity .item-quantity {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -moz-box-flex: 1;
        -moz-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        text-align: right;
    }

    .quantity-widget {
        display: inline-block;
        margin: 0;
        padding: 0;
        font-size: 0;
        border: solid 1px #ddd;
        border-radius: 2px;
        white-space: nowrap;
        overflow: hidden;
        vertical-align: top;
    }

    .quantity-widget .quantity-control {
        display: inline-block;
        margin: 0;
        padding: 0;
        width: 32px;
        height: 32px;
        line-height: 30px;
        font-size: 12px;
        text-align: center;
        vertical-align: top;
        border-radius: 0;
        outline: 0;
        border: none;
        color: #000;
        background-color: transparent;
    }

    .quantity-widget .quantity-input {
        display: inline-block;
        margin: 0;
        padding: 6px 0;
        width: 54px;
        height: auto;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        border: none;
        vertical-align: top;
    }

    .cart-flyout.visible .cart-flyout-background {
        opacity: 1;
        pointer-events: auto;
    }

    .cart-flyout .cart-flyout-background {
        position: fixed;
        margin: 0;
        padding: 0;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .4);
        z-index: 20000;
        opacity: 0;
        pointer-events: none;
        -webkit-transition: opacity .25s ease-in-out;
        -moz-transition: opacity .25s ease-in-out;
        -ms-transition: opacity .25s ease-in-out;
        -o-transition: opacity .25s ease-in-out;
        transition: opacity .25s ease-in-out;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- ngIf: cart -->
<div class="cart-flyout-wrapper ng-pristine ng-valid ng-scope ng-valid-min ng-valid-pattern" >

    <!-- Cart header -->
    <div class="cart-header">
        <button class="close" type="button" onclick="hideCart()">
            <i class="far fa-times"></i>
        </button>
        <h3 class="title">Your Cart</h3>
        <span class="count">
            <span ng-bind="itemCount()" class="ng-binding">{{$total}}</span>
            <span ng-bind="itemCountLabel()" class="ng-binding">items</span>
        </span>
    </div>
    @php $total="0" @endphp
    <!-- Cart body -->
    <div class="cart-body">
        <!-- Cart shipping -->
        <!-- <div class="cart-shipping free-shipping" ng-class="{ 'free-shipping' : Cart.hasFreeShipping() }"> -->

            <!-- <div class="shipping-progress" ng-show="!hasMultipleAddressFlag()"> -->
            <!-- ngIf: !Cart.hasFreeShipping() -->


            <!-- <div class="shipping-meter" ng-class="{ 'no-progress': Cart.freeShippingPercentComplete() == 0 }">
            <div class="fill" style="width: 100%;">
              <span class="text ng-binding">

              </span>
            </div>
          </div> -->
            <!-- </div> -->

            <!-- <div class="shipping-helper">
          <label class="checkbox">
            <input type="checkbox" ng-click="toggleMultipleAddressFlag()" ng-checked="hasMultipleAddressFlag()">
            <span>Shipping to multiple addresses?</span>
          </label>
        </div> -->
            <!--
        <div class="multi-shipping-helper ng-hide" ng-show="hasMultipleAddressFlag()">
          Shipping is calculated on a per address basis. Spend over $100 (per address) and unlock free shipping. Sign up for the FOX FLEET to earn perks like free shipping always!
        </div> -->

        <!-- </div> -->


        <div  class="cart-container ng-scope">

            <!-- ngIf: Cart.countGiftBoxItems() > 0 -->
            <div class="cart-group ng-scope" ng-if="Cart.countGiftBoxItems() > 0">
                <h4 class="cart-group-title">Luxury Gift Boxes</h4>
                <p class="cart-group-description">
                    Perfect <u>For Them</u>: These boxes come gift wrapped, handpacked in luxe gift boxes topped with your note, handwritten.
                </p>
                <!-- ngRepeat: item in cart.items track by $index -->
                <!-- ngIf: !Cart.isMarketPlaceItem(item) -->
                <div class="items" id="loadcart2">
                {{-- @foreach($data as $cart)
                <div class="cart-item ng-scope item">

                    <div class="item-info">
                        <div class="item-photo">
                            <a  href="/product/readytoship/{{$cart->item_id}}">
                                <img src="{{asset('upload')}}/{{$cart->item_image}}">
                            </a>
                        </div>
                        <div class="item-details">
                        <input type="hidden" value="{{$cart->id}}" class="cart_id">
                            <a class="item-remove ng-scope remove1" >
                                <i class="far fa-trash" ></i>
                            </a><!-- end ngIf: !isGiftWithPurchase(item) -->

                            <div class="item-title">
                                <!-- ngIf: hasItemDiscountMessage(item) -->
                                <a class="item-product-vendor ng-binding"  href="/product/readytoship/{{$cart->item_id}}">BOXFOX</a>
                                <a class="item-product-title ng-binding"  href="/product/readytoship/{{$cart->item_id}}">{{$cart->item_name}}</a>
                                <div class="item-variant-title ng-binding" ></div>
                                <div class="item-properties">
                                    <!-- ngIf: item.properties['Box Color'] -->
                                    <div class="item-property ng-scope" >
                                        @if($cart -> status2 == 'RTS' )
                                        <strong>Box Color: </strong><span class="ng-binding">{{$cart->box}}</span>
                                        @else
                                        <strong>Box: </strong><span class="ng-binding">{{$cart->box}}</span>
                                        @endif

                                    </div>
                                    @if($cart -> status2 == 'box' )
                                    <div class="item-property ng-scope" >
                                        <strong>Box Type: </strong><span class="ng-binding">{{$cart->type}}</span>
                                    </div>
                                    @endif
                                    <!-- end ngIf: item.properties['Box Color'] -->
                                    <!-- ngIf: item.properties['Card'] -->
                                    <div class="item-property ng-scope">
                                    @if($cart -> status2 == 'RTS' )
                                        <strong>Card: </strong><span class="ng-binding">{{$cart->card}}</span>
                                        @else
                                        @endif
                                    </div><!-- end ngIf: item.properties['Card'] -->
                                    <!-- ngIf: item.properties['To'] -->
                                    @if($cart -> status2 == 'RTS' ||   $cart -> status2 == 'card' )
                                    <div class="item-property ng-scope" >
                                        <strong>To: </strong><span class="ng-binding">{{$cart->to}}</span>
                                    </div><!-- end ngIf: item.properties['To'] -->
                                    <!-- ngIf: item.properties['From'] -->
                                    <div class="item-property ng-scope" >
                                        <strong>From: </strong><span class="ng-binding">{{$cart->from}}</span>
                                    </div><!-- end ngIf: item.properties['From'] -->
                                    <!-- ngIf: item.properties['Message'] -->
                                    <div class="item-property ng-scope" >
                                        <strong>Message: </strong><span class="ng-binding">{{$cart->message}}</span>
                                    </div>
                                    @else
                                    @endif<!-- end ngIf: item.properties['Message'] -->
                                    <!-- ngIf: item.properties['Card Blank'] -->
                                    <!-- ngIf: item.properties['Gift Box Contents'] -->
                                </div>
                            </div>

                            <div class="item-price-quantity">
                                <!-- ngIf: discountedPrice(item) -->
                                <!-- ngIf: !discountedPrice(item) -->

                                <div class="item-price ng-scope grand">
                                    <span  class="money ng-binding grandtotal"> ${{ number_format($cart->item_quantity * $cart->item_price, 2) }}</span>
                                </div><!-- end ngIf: !discountedPrice(item) -->

                                <div class="item-quantity">
                                    <div class="quantity-widget quantity">
                                        <button class="quantity-control minus decrement-btn changeQuantity1" >
                                            <i class="far fa-minus" ></i>
                                        </button>
                                        <input type="hidden" id="operation" value="">
                                        <input type="hidden" value="{{$cart->item_id}}" class="product_id">
                                                            <input type="hidden" value="{{$cart->id}}" class="cart_id">
                                                            <input type="hidden" value="{{$cart->status2}}" class="status2">
                                        @php $total = $total + ($cart->item_quantity * $cart->item_price) @endphp
                                        <input class="quantity-input ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-pattern qty-input2"  data-quantity="1" data-quantity-value="" type="number" min="0" pattern="\d*" value="{{$cart->item_quantity}}">

                                        <button class="quantity-control plus increment-btn changeQuantity1"  type="button">
                                            <i class="far fa-plus" ></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ngIf: hasSubscription(item) && !isGiftWithPurchase(item) -->

                </div>
                @endforeach --}}
                </div>
                <!-- end ngRepeat: item in cart.items track by $index -->

                <!-- end ngRepeat: item in cart.items track by $index -->
            </div><!-- end ngIf: Cart.countGiftBoxItems() > 0 -->

            <!-- ngIf: Cart.countMarketPlaceItems() > 0 -->

        </div><!-- end ngIf: cart.item_count > 0 -->

        <!-- ngIf: cart.item_count > 0 -->

        <div  class="cart-subtotals ng-scope">
            <div>
            <div class="subtotal-row subtotal1">
                <div class="label">
                <p>
                Subtotal
                </p>
            </div>
                <div class="value ng-binding" >
                    
                     <p  ><span id="sub1">{{$total }}</span></p></div>
            </div>
            </div>
            <!-- ngIf: showShipping() -->
            <!-- ngIf: !showShipping() -->
            <div class="subtotal-row ng-scope" ng-if="!showShipping()">
                <div class="label">Shipping <span class="helper">(calculated in checkout)</span></div>
                <div class="value">--</div>
            </div><!-- end ngIf: !showShipping() -->
            <div class="subtotal-row">
                <div class="label">Taxes <span class="helper">(calculated in checkout)</span></div>
                <div class="value">--</div>
            </div>
        </div><!-- end ngIf: cart.item_count > 0 -->

        <!-- ngIf: cart.item_count == 0 -->
    </div>

    <!-- Cart footer -->
    <!-- ngIf: cart.item_count > 0 -->
    <div  class="cart-footer ng-scope">
        <!-- ngIf: showEstimatedTotal() -->
        <div class="subtotal-row ng-scope" ng-if="showEstimatedTotal()">
            <h4 class="label">Estimated Total:</h4>
            <span class="value ng-binding"  ng-bind="total()"> <span id="esti">{{ number_format($total, 2) }}</span></span>
        </div><!-- end ngIf: showEstimatedTotal() -->

        <div class="actions">
            <button class="button bt" type="button" onclick="review()">
            <i class="fa fa-lock"></i> Review
            </button>
            <button class="buttonload button bt2">
  <i class="fa fa-circle-o-notch fa-spin"></i>Loading
</button>


        </div>

        <div class="disclaimer">
            Shipping, taxes, and promotions are calculated during checkout. Shipping charges are calculated per shipping address.
        </div>
    </div><!-- end ngIf: cart.item_count > 0 -->

</div><!-- end ngIf: cart -->
<div class="cart-flyout-background" onclick="hideCart()"></div>
</div>
<script>
      function review(){
      $('.bt').addClass('buttonload');
      $('.bt2').removeClass('buttonload');
      window.setTimeout(function(){
        location.href='/cart'
    });


  }

</script>
<script src="{{asset('js/custom.js')}}"></script>
