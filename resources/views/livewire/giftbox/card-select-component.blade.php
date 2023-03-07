<div class="builder-content-step-inner">
    {{-- builder header --}}
    <div class="builder-content-inner-header">
        <div class="container">
            <div class="row no-gutters px-2">
                <div class="col-12">
                    <div class="title">
                        <div class="mb-3 text-center text-md-left">
                            <h1>Include a personal note (Optional )</h1>
                        </div>
                    </div>
                    <div class="text">
                        <div class="pb-3">
                            <p>
                                It’s all in the details. Select from our catalog of
                                luxurious designs to find the perfect card for any
                                occasion. We’ll print your message with care to keep
                                your gifts personal. If you choose not to include a
                                card, we can still add a To: and From: tag. Just leave
                                us a note letting us know you want one.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col px-2 px-lg-4">
                <div class="rule">
                    <div class="pb-3 mb-3">
                        <hr class="border-bottom border-dark border-top m-0">
                        <hr class="border-bottom border-white border-top m-0">
                        <hr class="border-dark m-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- builder header end --}}

    <div class="builder-content-inner-body">
        @php
        $cartItems = ShoppingCart::content();
        @endphp
        <div class="container px-0 px-md-2">
            <div class="row no-gutters">
                @foreach ($cards as $card)
                <div class="col-6 col-md-3 px-2 px-lg-4" onclick="$('#gift_card_{{ $card->id }}').modal('show');">
                    @php
                    $cardStatus = $cartItems->contains(function($item, $key) use ($card) {
                    return $item->id == $card->id && $item->options->status2 == 'card';
                    });
                    @endphp
                    <div class="builder-item-wrapper {{$cardStatus?'active':''}}">
                        <div class="image position-relative">
                            <div>
                                <img class="w-100" src="{{ asset('upload') }}/{{ $card->image }} "
                                    alt="{{$card->name}}">
                            </div>
                            <div class="item-select-btn">
                                <div class="text1">{{$cardStatus?'Selected':'Select'}}
                                </div>
                            </div>
                        </div>
                        <div class="item-name mb-4 mb-md-0">
                            <div class="text-center">
                                {{ $card->name }}
                            </div>
                        </div>
                        <div class="title d-none d-md-block">
                            <div class="text-center">
                                <p class="mb-4">
                                    {{ $card->title }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- card modal --}}
                    <div class="modal fade" id="gift_card_{{$card->id}}" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                {{-- @if (!$customizeCard) --}}
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <a href="#builder" data-dismiss="modal" style="font-size: 1.5rem;">×</a>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="images">
                                                    <div class="mb-5">
                                                        <div class="row">
                                                            <div id="carouselExampleControls" class="carousel slide"
                                                                data-interval="false">
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                        <div class="col-lg-12">
                                                                            <div>
                                                                                <img class="d-block box_img_zoom"
                                                                                    src="{{ asset('upload') }}/{{ $card->image }}"
                                                                                    id="card_img" alt="First slide">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExampleControls" role="button"
                                                                    data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExampleControls" role="button"
                                                                    data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 m-auto">
                                                <div class="title">
                                                    <div class="m-0">
                                                        <h1 class="m-0">
                                                            <div class="text-capitalize mb-3" id="heding">
                                                                {{$card->name}}
                                                            </div>

                                                        </h1>
                                                    </div>
                                                </div>
                                                <input class="d-none" type="radio" name="id" checked="">
                                                <div class="variant d-block">
                                                    <div class="price">
                                                        <div class="m-0">
                                                            <p style="font-weight: bold;font-size: 21px;" id="price">
                                                                LKR {{$card->price}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="rule">
                                                        <div class="mb-3">
                                                            <hr class="border-bottom border-dark border-top m-0">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="id" name="id">
                                                    <div class="button">
                                                        <div class="mb-2">
                                                            <button class="btn btn-block  rounded-0 border-0 py-2 px-4"
                                                                id="cardsmesage" type="button"
                                                                style="background-color: white;color: black;border: 1px dotted black !important"
                                                                wire:click.prevent="showCustomize({{true}})""
                                                                >
                                                                Write Your Message
                                                            </button>
                                                        </div>
                                                        <div style="text-align: center" class="mb-2">
                                                            <h6>OR</h6>
                                                        </div>
                                                        <div class="mb-2">
                                                            <button class="btn btn-block  rounded-0 border-0 py-2 px-4"
                                                                wire:click.prevent="addCardToCart({{$card->id}}, {{true}})"
                                                                wire:loading.attr="disabled" @if($cardStatus) disabled
                                                                @endif
                                                                onclick="$('#gift_card_{{$card->id}}').modal('hide');"
                                                                type="button">
                                                                Order My Card blank
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                <div class="promotion">
                                                    <div class="text-center mb-2">
                                                        <svg class="d-inline-block mr-2"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.38 10"
                                                            fill="#888" height="10">
                                                            <path
                                                                d="M15.23,4.94v0h0l-.3-1.53h0l-.15-.78a1.37,1.37,0,0,0-1.3-1.06H10.38A1.21,1.21,0,0,0,10,1.6V1.15A1.16,1.16,0,0,0,8.85,0H1.15A1.16,1.16,0,0,0,0,1.15V7.31A1.16,1.16,0,0,0,1.15,8.46H2.31a1.54,1.54,0,1,0,3.07,0H9.3a1.15,1.15,0,0,0,1.08.77H11a1.53,1.53,0,0,0,2.66,0h.59a1.15,1.15,0,0,0,1.15-1.15V6.54a10.7,10.7,0,0,0-.15-1.6Zm-.85-.32H12.31V3.85h1.91ZM3.85,9.23a.77.77,0,0,1,0-1.54.77.77,0,0,1,0,1.54ZM5.18,7.69a1.54,1.54,0,0,0-2.67,0H1.15a.38.38,0,0,1-.38-.38V1.15A.38.38,0,0,1,1.15.77h7.7a.38.38,0,0,1,.38.38V7.69Zm7.13,1.54a.77.77,0,1,1,0-1.54.77.77,0,0,1,0,1.54Zm1.92-.77h-.38a1.54,1.54,0,1,0-3.08,0h-.39A.38.38,0,0,1,10,8.08V2.69a.38.38,0,0,1,.38-.38h3.08a.59.59,0,0,1,.54.44l.07.33H11.92a.38.38,0,0,0-.38.38V5a.39.39,0,0,0,.38.39h2.6c0,.24.06.51.08.76h-.37a.39.39,0,0,0-.38.39.38.38,0,0,0,.38.38h.39V8.08A.39.39,0,0,1,14.23,8.46Z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="rule">
                                                    <div class="mb-3">
                                                        <hr class="border-dark m-0">
                                                    </div>
                                                </div>
                                                <div class="descriptioncard">
                                                    {{$card->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @else --}}
                                {{-- <div class="modal-body" style="background: #fff;">
                                    <a href="#builder" onclick="$('#modelselectcard_{{$card->id}}').modal('hide');"
                                        data-dismiss="modal" id="cardpre" style="font-size: 1.5rem;" wire:click.prevent="showCustomize({{false}})">×</a>
                                    <form wire:submit=>
                                        <div class="container px-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row no-gutters">
                                                        <div class="col px-2 px-lg-4">
                                                            <div class="title">
                                                                <div class="mb-4">
                                                                    <h1 style="font-size: 25px;">
                                                                        Write your card message
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black-50" for="cardTo">
                                                                    To
                                                                </label>
                                                                <input class="form-control bg-transparent px-1"
                                                                    type="text" name="to" id="cardTo" wire:modal="to">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black-50" for="catdFrom">
                                                                    From
                                                                </label>
                                                                <input class="form-control bg-transparent px-1"
                                                                    type="text" name="from" id="catdFrom"
                                                                    wire:modal="from">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black-50"
                                                                    for="cardMessage">
                                                                    Card Message ( 350 characters max,
                                                                    please )
                                                                </label>
                                                                <textarea
                                                                    class="form-control bg-transparent px-1"
                                                                    name="message" rows="5" maxlength="350"
                                                                    id="cardMessage" wire:modal="message"></textarea>

                                                            </div>
                                                            <div class="form-group" wire:ignore>
                                                                <label class="text-black-50 col-md-12"
                                                                    for="message">
                                                                    Font
                                                                </label>
                                                                <input id="font-selector-input-{{$card->id}}" type="text"
                                                                    class="form-control font-selector-input bg-transparent px-1 col-md-12"
                                                                    wire:modal="font">
                                                                    <script>
                                                                        initFontField('font-selector-input-{{$card->id}}')
                                                                    </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters">
                                                        <div class="col px-2 px-lg-4">
                                                            <div class="rule">
                                                                <div class="mb-3">


                                                                    <hr
                                                                        class="border-bottom border-dark border-top m-0">
                                                                    <hr
                                                                        class="border-bottom border-white border-top m-0">
                                                                    <hr class="border-dark m-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6 m-auto"
                                                    style="font-size: 22px;background-size: contain;background-repeat: no-repeat;background-image:url('{{asset('upload') }}/screen/62c083fa268b5.png')"
                                                    id="cardprev">
                                                    <div class=" no-gutters" style="width: 396.85px;height: 559.37px;">
                                                        <div class="resizeme"
                                                            style="text-align: center;font-size: 19px">
                                                            <svg width="100%" height="100%" viewBox="0 0 500 600"
                                                                preserveAspectRatio="xMinYMin meet">
                                                                <foreignObject width="100%" height="100%"
                                                                    xmlns="http://www.w3.org/1999/xhtml">
                                                                    <div xmlns="http://www.w3.org/1999/xhtml">
                                                                        <div class="col px-2 px-lg-4">
                                                                            <div class="">
                                                                                <div class="previewto prev"
                                                                                    style="text-align: center;padding:0px 13px">
                                                                                </div>

                                                                            </div>


                                                                            <div class="" style="margin: 50px 0">

                                                                                <div class=" previewmessage prev">

                                                                                </div>
                                                                            </div>
                                                                            <div class="">

                                                                                <div class=" previewfrom prev"
                                                                                    style="text-align: center;padding:0px 13px">

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
                                        </div>
                                        <button type="submit" class="btn"
                                            wire:click.prevent="addCardToCart({{$card->id}}, {{false}})"
                                            onclick="$('#cardcustomize_{{$card->id}}').modal('hide');$('#modelselectcard_{{$card->id}}').modal('hide');"
                                            style="background-color: green;color: white;font-size: 15px;padding: 10px;" wire:click.prevent="showCustomize({{false}})">NEXT</button>
                                    </form>
                                </div> --}}
                                {{-- @endif --}}

                            </div>
                        </div>
                    </div>
                    {{-- card modal end --}}

                    {{-- card customize model --}}
                    <div class="modal fade" id="gift_card_customize_{{$card->id}}" wire:ignore>
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content bg-transparent border-0">


                            </div>
                        </div>

                    </div>
                    {{-- card customize model end --}}

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>