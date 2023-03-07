<div class="builder-content-step-inner">
    {{-- builder header --}}
    <div class="builder-content-inner-header">
        <div class="container">
            <div class="row no-gutters px-2">
                <div class="col-12">
                    <div class="title">
                        <div class="mb-3 text-center text-md-left">
                            <h1>Add your gifts</h1>
                        </div>
                    </div>
                    <div class="text">
                        <div class="pb-3">
                            <p>
                                Make it memorable! Select from the items below to create
                                your unique gift assortment. Everything you choose will
                                be shipped together in box you’ve selected. Once
                                complete, simply head to the next step to select a card
                                and include a note.<br><br> Not sure where to start?
                            </p>
                            <p><span style="text-decoration: underline;"><strong><a
                                            href="https://www.belleandblush.com/pages/custom-gift-box-ideas">
                                            Click here to view some custom gift box
                                            inspiration!</a></strong></span></p>
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

    {{-- Gift preview --}}
    {{-- @livewire('giftbox.gift-box-preview-component') --}}
    {{-- Gift preview end --}}

    <div class="builder-content-inner-body">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 col-lg-3">
                    <nav class="accordion" id="side-navbar">
                        <ul class="nav gift-sidebar flex-column px-2" id="nav_accordion">
                            <li class="nav-item has-submenu"><a
                                    class="nav-link {{$filterBy == 'all' ? 'link-active':''}}" href="#"
                                    wire:click.prevent="getProducts('all')">All</a>
                            </li>
                            @foreach ($category as $cat)
                            <li class="nav-item has-submenu" id="side-nav-categories">
                                <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-toggle="collapse"
                                    data-target="#nav-item-1_{{$cat->id}}" aria-expanded="true"
                                    aria-controls="nav-item-1_{{$cat->id}}"><span class="text-uppercase">{{
                                        $cat->cname }}</span>
                                    <i class="fa fa-chevron-down"></i></a>
                                <ul class="submenu collapse {{array_search($filterBy, array_column($subCategory->toArray(), 'sname')) ? 'show' :''}}" id="nav-item-1_{{$cat->id}}" data-parent="#nav_accordion">

                                    @foreach ($subCategory as $s)
                                    @if ($s->category_id == $cat->id)
                                    <li class="nav-item {{$filterBy == $s->sname ? 'link-active':''}}" eryry>
                                        <a href="#" class="nav-link ml-2"
                                            wire:click.prevent="getProducts('{{$s->sname}}')">{{
                                            $s->sname }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="nav-item has-submenu" id="side-nav-brands">
                                <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-toggle="collapse" data-target="#nav-item-2"
                                    aria-expanded="true" aria-controls="nav-item-2"><span
                                        class="text-uppercase">Brand</span>
                                        <i class="fa fa-chevron-down"></i></a>
                                <ul class="submenu collapse {{array_search($filterBy, array_column($brand->toArray(), 'bname')) ? 'show' :''}}" id="nav-item-2" data-parent="#nav_accordion">

                                    @foreach ($brand as $br)
                                    <li class="nav-item {{$filterBy == $br->bname ? 'link-active':''}}"><a href="#"
                                            class="nav-link ml-2" wire:click.prevent="getProducts('{{ $br->bname }}')">{{
                                            $br->bname }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item has-submenu" wire:ignore>
                                <a class="nav-link d-flex align-items-center justify-content-between" href="#" data-toggle="collapse" data-target="#nav-item-3"
                                    aria-expanded="true" aria-controls="nav-item-3"><span
                                        class="text-uppercase">Color</span>
                                        <i class="fa fa-chevron-down"></i></a>
                                <ul class="submenu collapse {{array_search($filterBy, array_column($color->toArray(), 'color')) ? 'show' :''}}" id="nav-item-3" data-parent="#nav_accordion">

                                    @foreach ($color as $col)
                                    <li class="nav-item {{$filterBy == $col->color ? 'link-active':''}}"><a href="#"
                                            class="nav-link ml-2" wire:click.prevent="getProducts('{{ $col->color }}')">{{
                                            $col->color }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="widget mercado-widget filter-widget brand-widget">

                        <h2 class="widget-title px-3 py-2" style="font-size:18px;">Sort</h2>
                        <div class="widget-content">
                            <ul class="list-style vertical-list list-limited" data-show="6">

                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'price-ascending' ? 'active':''}}"
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'price-ascending')">

                                        Price: Low to High

                                    </a></li>
                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'price-descending' ? 'active':''}}"
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'price-descending')">

                                        Price: High to Low

                                    </a></li>

                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'title-ascending' ? 'active':''}}"
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'title-ascending')">

                                        A-Z

                                    </a></li>
                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'title-descending' ? 'active':''}} "
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'title-descending')">

                                        Z-A

                                    </a></li>
                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'created-ascending' ? 'active':''}}"
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'created-ascending')">

                                        Oldest to Newest

                                    </a></li>
                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'created-descending' ? 'active':''}}"
                                        href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'created-descending')">

                                        Newest to Oldest
                                    </a></li>
                                <li><a class="gift-sort-item py-2 dropdown-item {{$sortBy == 'best-selling' ? 'active':''}}" href="#"
                                        wire:click.prevent="getProducts('{{ $br->bname }}', 'best-selling')">

                                        Best Selling

                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    @php
                    $cartItems = ShoppingCart::content();
                    @endphp
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3 px-2 px-lg-3" id="gift_item_{{$product->id}}"
                            onclick="$('#gift_item_modal_{{ $product->id }}').modal('show');">
                            @php
                            $itemStatus = $cartItems->contains(function($item, $key) use ($product) {
                            return $item->id == $product->id && $item->options->status2 == 'gift';
                            });
                            @endphp
                            <div class="builder-item-wrapper {{$itemStatus?'active':''}}">
                                <div class="image position-relative">
                                    <div>
                                        <img class="w-100" src="{{ asset('upload') }}/{{ $product->pimage }} "
                                            alt="{{$product->name}}">
                                    </div>
                                    <div class="item-select-btn">
                                        <div class="text1">{{$itemStatus?'Selected':'Select'}}
                                        </div>
                                    </div>
                                </div>
                                <div class="item-name mb-4 mb-md-0">
                                    <div class="text-center">
                                        {{ $product->name }}
                                    </div>
                                </div>
                                <div class="title d-none d-md-block">
                                    <div class="text-center">
                                        <p class="mb-4">
                                            {{ $product->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- model --}}
                            <div class="modal fade" id="gift_item_modal_{{ $product->id }}" wire:ignore>
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <a href="#builder" data-dismiss="modal"
                                                    style="font-size: 1.5rem;">×</a>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="images">
                                                            <div class="mb-5">
                                                                <div class="row">
                                                                    <div class="d-none d-lg-block col-lg-2">
                                                                        <div class="py-lg-5">
                                                                            <ul class="nav flex-column">
                                                                                @php
                                                                                $productImages =
                                                                                $product->images;
                                                                                $productImagesArr =
                                                                                explode('|',$productImages);
                                                                                array_unshift($productImagesArr,$product->pimage)
                                                                                @endphp
                                                                                @foreach ($productImagesArr as $key =>
                                                                                $p_image)
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link img_{{ $product->id }}"
                                                                                        data-slide-to="<?php echo $key; ?>"
                                                                                        href="#img_{{ $product->id }}_{{$key}}">
                                                                                        <img class="w-100"
                                                                                            src="{{ asset('upload') }}/<?php echo $p_image; ?>"
                                                                                            onclick="changeMainImage(this, {{$product->id}});">
                                                                                    </a>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-10">
                                                                        <div class="carousel slide" data-interval="0"
                                                                            id="img_inner_{{ $product->id }}">
                                                                            <ol
                                                                                class="carousel-indicators d-lg-none mb-0">
                                                                                <li data-slide-to=""
                                                                                    data-target="#{{ $product->id }}">
                                                                                </li>
                                                                                <li data-slide-to=""
                                                                                    data-target="#{{ $product->id }}">
                                                                                </li>
                                                                            </ol>
                                                                            <div
                                                                                class="carousel-inner gift-product-carousel gift-product-carousel-{{$product->id}}">
                                                                                @foreach ($productImagesArr as $key=>
                                                                                $image_inner)
                                                                                <div class="carousel-item {{ $product->id }}img"
                                                                                    style="display:{{$key == 0 ? 'block': 'none'}}"
                                                                                    id="{{ $product->id }}">
                                                                                    <img class="imgproduc box_img_zoom"
                                                                                        src="{{ asset('upload') }}/{{ $image_inner }}">
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="title">
                                                            <div class="m-0">
                                                                <h1 class="m-0">
                                                                    <div class="text-capitalize mb-3">
                                                                        {{ $product->name }}
                                                                    </div>

                                                                </h1>
                                                            </div>
                                                        </div>
                                                        <div class="variant d-block">
                                                            <div class="price">
                                                                <div class="m-0">
                                                                    @if ($product->discount == '0')
                                                                    <p style="font-weight: bold;font-size: 21px;">
                                                                        LKR {{ $product->regular_price }}
                                                                    </p>
                                                                    @else
                                                                    <div class="d-flex align-items-end">
                                                                        <p
                                                                            style="-webkit-text-decoration-line: line-through; text-decoration-line: line-through;font-weight: bold;font-size: 15px;padding-right:3px ">
                                                                            LKR {{ $product->regular_price }}
                                                                        </p>
                                                                        <p
                                                                            style="color: red;font-weight: bold;font-size: 21px;">
                                                                            LKR {{ $product->discountprice }}
                                                                        </p>

                                                                    </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                            <div class="rule">
                                                                <div class="mb-3">
                                                                    <hr
                                                                        class="border-bottom border-dark border-top m-0">
                                                                </div>
                                                            </div>

                                                            <div class="button">
                                                                <div class="mb-2">
                                                                    @if ($product->quantity == '0' ||
                                                                    $product->stock_status ==
                                                                    'outofstock')
                                                                    <div class="btn btn-block  py-2 px-4"
                                                                        style="color: rgb(247, 25, 25);border: 1px solid red; background:#fff;">
                                                                        Outofstock</div>
                                                                    @else
                                                                    <button
                                                                        class="btn btn-block rounded-0 border-0 py-2 px-4"
                                                                        wire:click="addGiftsToCart({{$product->id}})"
                                                                        wire:loading.attr="disabled"
                                                                        onclick="$('#gift_item_modal_{{ $product->id }}').modal('hide');"
                                                                        type="submit">

                                                                        Add to box

                                                                    </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="promotion">
                                                            <div class="text-center mb-2">
                                                                <svg class="d-inline-block mr-2"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 15.38 10" fill="#888" height="10">
                                                                    <path
                                                                        d="M15.23,4.94v0h0l-.3-1.53h0l-.15-.78a1.37,1.37,0,0,0-1.3-1.06H10.38A1.21,1.21,0,0,0,10,1.6V1.15A1.16,1.16,0,0,0,8.85,0H1.15A1.16,1.16,0,0,0,0,1.15V7.31A1.16,1.16,0,0,0,1.15,8.46H2.31a1.54,1.54,0,1,0,3.07,0H9.3a1.15,1.15,0,0,0,1.08.77H11a1.53,1.53,0,0,0,2.66,0h.59a1.15,1.15,0,0,0,1.15-1.15V6.54a10.7,10.7,0,0,0-.15-1.6Zm-.85-.32H12.31V3.85h1.91ZM3.85,9.23a.77.77,0,0,1,0-1.54.77.77,0,0,1,0,1.54ZM5.18,7.69a1.54,1.54,0,0,0-2.67,0H1.15a.38.38,0,0,1-.38-.38V1.15A.38.38,0,0,1,1.15.77h7.7a.38.38,0,0,1,.38.38V7.69Zm7.13,1.54a.77.77,0,1,1,0-1.54.77.77,0,0,1,0,1.54Zm1.92-.77h-.38a1.54,1.54,0,1,0-3.08,0h-.39A.38.38,0,0,1,10,8.08V2.69a.38.38,0,0,1,.38-.38h3.08a.59.59,0,0,1,.54.44l.07.33H11.92a.38.38,0,0,0-.38.38V5a.39.39,0,0,0,.38.39h2.6c0,.24.06.51.08.76h-.37a.39.39,0,0,0-.38.39.38.38,0,0,0,.38.38h.39V8.08A.39.39,0,0,1,14.23,8.46Z">
                                                                    </path>
                                                                </svg>
                                                                <em style="font-size : 10px; font-weight : 400;">
                                                                    Free US shipping on orders over $100
                                                                </em>
                                                            </div>
                                                        </div>
                                                        <div class="rule">
                                                            <div class="mb-3">
                                                                <hr class="border-dark m-0">
                                                            </div>
                                                        </div>
                                                        <div class="">

                                                            <div id="barefoot-dreams-cozychic-lamb-buddie-description">
                                                                @php
                                                                    $heading = $product->heading;
                                                                    $des = $product->description;
                                                                    $depheading = explode('|', $heading);
                                                                    $depdes = explode('|', $des);
                                                                @endphp
                                                                @if($heading != null)
                                                                <div class="accordion" id="accordionExample">
                                                                    @foreach ($depheading as $key => $heading)
                                                                    <div class="card">
                                                                        <div class="card-header p-1" id="heading_{{$product->id}}_{{$key}}">
                                                                          <h2 class="mb-0" style="font-size: 18px;text-transform: capitalize;">
                                                                            <a href="#" class="text-left" type="button" data-toggle="collapse" data-target="#collapse_{{$product->id}}_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$product->id}}_{{$key}}">
                                                                              {{$heading}}
                                                                            </a>
                                                                          </h2>
                                                                        </div>
                                                                    
                                                                        <div id="collapse_{{$product->id}}_{{$key}}" class="collapse {{$key == 0 ? 'show': ''}}" aria-labelledby="heading_{{$product->id}}_{{$key}}" data-parent="#accordionExample">
                                                                          <div class="card-body p-1" style="font-size:13px;">
                                                                            {{$depdes[$key]}}
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                @endforeach
                                                                  </div>
                                                                @endif            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- model end --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>