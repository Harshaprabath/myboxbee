<div class="" style="background:#eee;">
    {{-- Builder steps start --}}
    <section class="builder-steps py-3">
        <div class="container navigation px-0 px-md-2">
            <nav class="builder-steps">
                <ul class="flex items-start w-full">
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 0)
                            <a href="#" wire:click="gotoStep(0)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 0 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 0 ? 'text-lg' : 'text-sm'}}">2</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 1 ? 'font-bold' : ''}}">
                            Box
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 1)
                            <a href="#" wire:click="gotoStep(1)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 1 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 1 ? 'text-lg' : 'text-sm'}}">2</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 1 ? 'font-bold' : ''}}">
                            Gifts
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 2)
                            <a href="#" wire:click="gotoStep(2)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 2 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 2 ? 'text-lg' : 'text-sm'}}">3</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 2 ? 'font-bold' : ''}}">
                            Card
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 3)
                            <a href="#" wire:click="gotoStep(3)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 3 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 3 ? 'text-lg' : 'text-sm'}}">4</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 3 ? 'font-bold' : ''}}">
                            Sticker
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 4)
                            <a href="#" wire:click="gotoStep(4)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 4 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 4 ? 'text-lg' : 'text-sm'}}">5</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 4 ? 'font-bold' : ''}}">
                            Voucher
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="relative flex justify-center w-full">
                            <div class="absolute inset-0 flex items-center">
                                <div class="h-0.5 w-full bg-gray-200"></div>
                            </div>
                            @if($currentStep > 5)
                            <a href="#" wire:click="gotoStep(5)"
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-brand-pink rounded-full focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @else
                            <span
                                class="relative w-7 h-7 lg:w-9 lg:h-9 flex items-center justify-center bg-white border-2 rounded-full {{$currentStep == 5 ? 'border-black' : 'border-gray-500'}}">
                                <p class="text-gray-500 {{$currentStep == 5 ? 'text-lg' : 'text-sm'}}">6</p>
                            </span>
                            @endif
                        </div>
                        <div
                            class="relative mt-2 flex justify-center w-full text-black text-sm lg:text-base font-serif {{$currentStep == 5 ? 'font-bold' : ''}}">
                            Review
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    {{-- Builder steps end --}}

    <section class="container pt-3">
        {{-- Builder Content --}}
        <div class="builder-content">
            {{-- First Step --}}
            @if($currentStep == 0)
            <div class="builder-content-step">
                @livewire('giftbox.box-select-component')
            </div>

            {{-- First Step end --}}
            {{-- Second Step --}}
            @elseif($currentStep == 1)
            <div class="builder-content-step">
                @livewire('giftbox.gift-select-component')
            </div>

            {{-- Second Step End --}}
            {{-- Third Step --}}
            @elseif($currentStep == 2)
            <div class="builder-content-step">
                @livewire('giftbox.card-select-component')
            </div>

            {{-- Third Step End --}}
            {{-- Foutrh Step --}}
            @elseif($currentStep == 3)
            <div class="builder-content-step">
                @livewire('giftbox.sticker-select-component')
            </div>

            {{-- Foutrh Step End --}}
            {{-- Fifth Step --}}
            @elseif($currentStep == 4)
            <div class="builder-content-step">
                @livewire('giftbox.voucher-select-component')
            </div>

            {{-- Fifth Step End --}}
            @elseif($currentStep == 5)
            <div class="review">
                <div class="m-0">
                    <div class="header">
                        <div class="container px-2">
                            <div class="row no-gutters">
                                <div class="col-lg-12 px-2 px-lg-4">
                                    <div class="title">
                                        <div class="mb-3">
                                            <h1>
                                                5. Review your box
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <div class="pb-3" style="font-size:12px;">
                                            <p>
                                                Review your box below. Please allow 1-2 business days
                                                for processing
                                            </p>
                                            <p>
                                                Below is a summary of your selection. View your cart and
                                                checkout, or keep shopping. We can deliver your box to
                                                you, or directly to the lucky recipient. Simply enter
                                                shipping address during checkout. </p>
                                            <p> PLEASE NOTE: If you are shipping multiple boxes to
                                                multiple locations, you will need to create a separate
                                                order for each gift box. We will not include an itemized
                                                reciept with your order if it's being shipped directly
                                                to your recipient. </p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col px-2 px-lg-4">
                                    <div class="rule">
                                        <div class="mb-3">
                                            <hr class="border-bottom border-dark border-top m-0">
                                            <hr class="border-bottom border-white border-top m-0">
                                            <hr class="border-dark m-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('giftbox.gift-box-preview-component')
                </div>
            </div>
            @endif
            {{-- Builder Content End --}}


        </div>
    </section>
    {{-- step counter footer --}}
    @php
    $cartItems = ShoppingCart::content();
    $boxStatus = $cartItems->contains(function($item, $key) {
    return $item->options->status2 == 'box';
    });
    $giftStatus = $cartItems->contains(function($item, $key) {
    return $item->options->status2 == 'gift';
    });
    $cardStatus = $cartItems->contains(function($item, $key) {
    return $item->options->status2 == 'card';
    });
    $stickerStatus = $cartItems->contains(function($item, $key) {
    return $item->options->status2 == 'sticker';
    });
    $voucherStatus = $cartItems->contains(function($item, $key) {
    return $item->options->status2 == 'voucher';
    });

    @endphp
    @if($boxStatus)
    <div class="footer fixed-bottom position-sticky border-bottom border-dark fixed-bottom-bar-nxt-prev" id="footer">

        <div class="bg-white shadow">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    @if($currentStep > 0)
                    <div class="col-auto mr-auto p-2">
                        <button class="btn btn-outline-dark px-6" wire:click="previousStep"
                            style="height: 40px;font-size: 17px;">
                            ← Back
                        </button>
                    </div>
                    @endif
                    <div class="col-auto ml-auto p-2">
                        @if($currentStep == 5)
                        <a class="btn btn-outline-dark px-6" href="{{route('checkout')}}"
                        style="height: 40px;font-size: 17px;">
                       Checkout →
                    </a>
                        @else 
                        <button class="btn btn-outline-dark px-6" wire:click="nextStep"
                        @if((!$boxStatus && $currentStep == 0) ||  (!$giftStatus && $currentStep == 1)) disabled @endif
                            style="height: 40px;font-size: 17px;">
                            {{($currentStep == 2 && !$cardStatus) || ($currentStep == 3 && !$stickerStatus) || ($currentStep == 4 && !$voucherStatus) ? 'Skip' : 'Next' }} →
                        </button>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- step counter footer end --}}
</div>