<div class="builder-content-step-inner">
    {{-- builder header --}}
    <div class="builder-content-inner-header">
        <div class="container">
            <div class="row no-gutters px-2">
                <div class="col-12">
                    <div class="title">
                        <div class="mb-3 text-center text-md-left">
                            <h1>Choose your box</h1>
                        </div>
                    </div>
                    <div class="text">
                        <div class="pb-3">
                            <p>PLEASE NOTE: If you're shipping multiple gift boxes to
                                one location you'll only need to create one order, but
                                to ship gift boxes to multiple locations you'll need to
                                create separate orders for each shipment.</p>
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
                @foreach ($boxes as $box)
                <div class="col-6 col-md-4 px-2 px-lg-4" id="gift_box_{{$box->id}}"
                    onclick="$('#gift_box_modal_{{ $box->id }}').modal('show');">
                    @php
                    $boxStatus = $cartItems->contains(function($item, $key) use ($box) {
                    return $item->id == $box->id && $item->options->status2 == 'box';
                    });
                    @endphp
                    <div class="builder-item-wrapper {{$boxStatus?'active':''}}">
                        <div class="image position-relative">
                            <div>
                                <img class="w-100" src="{{ asset('upload') }}/{{ $box->image }} " alt="{{$box->name}}">
                            </div>
                            <div class="item-select-btn">
                                <div class="text1">{{$boxStatus?'Selected':'Select'}}
                                </div>
                            </div>
                        </div>
                        <div class="item-name mb-4 mb-md-0">
                            <div class="text-center">
                                {{ $box->name }}
                            </div>
                        </div>
                        <div class="title d-none d-md-block">
                            <div class="text-center">
                                <p class="mb-4">
                                    {{ $box->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- box modal --}}
                    <div class="modal fade" id="gift_box_modal_{{ $box->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <a href="#builder" data-dismiss="modal" style="font-size: 1.5rem;">×</a>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="item-images-gallery">
                                                    <div class="mb-5">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                {{-- <div class="flexslider"
                                                                    id="flexslider_{{$box->id}}" style="width:100%">
                                                                    --}}
                                                                    {{-- <ul class="slides"> --}}
                                                                        {{-- <li
                                                                            data-thumb="{{ asset('upload') }}/{{$box->image}}"
                                                                            style="min-width: 340px;"> --}}
                                                                            <img src="{{ asset('upload') }}/{{$box->image}}"
                                                                                class="box_img_zoom" />
                                                                            {{--
                                                                        </li> --}}
                                                                        {{-- </ul> --}}
                                                                    {{-- </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 m-auto">
                                                <div class="title">
                                                    <div class="m-0">
                                                        <h1 class="m-0">
                                                            <div class="text-capitalize mb-3">
                                                                {{$box->name}}
                                                            </div>

                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="variant d-block">
                                                    <div class="price">
                                                        <div class="m-0">
                                                            <p style="font-weight: bold;font-size: 21px;">
                                                                LKR {{$box->price}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="rule">
                                                        <div class="mb-3">
                                                            <hr class="border-bottom border-dark border-top m-0">
                                                        </div>
                                                    </div>
                                                    <div class="button">
                                                        <div class="mb-2">
                                                            <button class="btn btn-block  rounded-0 border-0 py-2 px-4"
                                                                type="button"
                                                                wire:click.prevent="addBoxToCart({{$box->id}})"
                                                                wire:loading.attr="disabled" @if($boxStatus) disabled
                                                                @endif
                                                                onclick="$('#gift_box_modal_{{ $box->id }}').modal('hide');"
                                                                style="background-color: rgb(0, 0, 0);color: rgb(255, 255, 255);border: 1px dotted black !important"
                                                                id="addbox">
                                                                Add Box
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="descriptionbox">
                                                    {{$box->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- box modal end --}}
                </div>
                @endforeach

            </div>
            <!-- end loop card box -->
        </div>
    </div>

    
</div>