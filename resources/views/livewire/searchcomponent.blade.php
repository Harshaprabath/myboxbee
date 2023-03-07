<title>Search</title>
@if($error == '1')
<div>
<div style="margin: auto;">
                           <img src="{{asset('img/something-wrong.png')}}" alt="" width="100%">
                       </div>
</div>
@else
<div class="container">


    <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
        <a href="/" title="Home">Home</a>

        <span>
            /
        </span>
        <span>Search: {{count($products)}} results found for "{{$result}}"</span>

    </nav>

</div>

<div class="search">

        <div class="results">

            <div class="container px-2 px-lg-4">

                <div class="row nog-gutters">
                    @if($products->isEmpty())
                       <div style="margin: auto;">
                           <img src="{{asset('img/empty_item.svg')}}" alt="">
                       </div>
                    @else
                @foreach($products as $product)

<div class="col-6 col-lg-3">
    <div class="product">

        <div class="pb-4">

            <div class="image" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

                <div class="mb-4">

                    <a href="{{ route('product.details',['id'=> $product->id])}}" title="{{$product ->name}}">

                        <div class="card border-0">

                            <div class="card-img">

                                <div class="bg-white">
                                    <div class="image curev">

                                        <div class="embed-responsive embed-responsive-1by1">

                                            <div class="embed-responsive-item text-center">

                                                <img class="w-100 lazyloaded" src="{{asset('upload')}}/{{$product ->pimage}}" alt="{{$product ->name}}" data-expand="-50">



                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>
                            <div class="hover">
                                <style>
                                    .hover {

                                        display: none;

                                    }

                                    .product:hover .hover {

                                        display: block;

                                    }
                                </style>
                                <!-- <div class="d-none d-lg-block">
                                    <div class="card-img-overlay p-0">
                                        <div class="image curev">
                                            <div class="embed-responsive embed-responsive-1by1">
                                                <div class="embed-responsive-item text-center">
                                                    <img class="w-100 lazyloaded" data-srcset="{{asset('upload')}}/{{$product ->pimage}}" src="{{asset('upload')}}/{{$product ->pimage}}" alt="{{$product ->name}}" data-expand="-50">
                                                    <noscript>
                                                        <img class="w-100" src="{{asset('upload')}}/{{$product ->pimage}}" alt="nest-wild-mint-eucalyptus-hand-sanitizer-travel">
                                                    </noscript>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{ route('product.details',['id'=> $product->id])}}" title="{{$product ->name}}">
                <div class="vendor" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">
                    <div class="text-center">
                        <h6 class="text-dark m-0">
                        {{$product ->name}}
                        </h6>
                    </div>
                </div>
                <div class="title" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">
                    <div class="text-center">
                    {{$product ->short_description}}
                    </div>
                </div>
            </a>
            <div class="price" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">

                <div class="text-center mb-2">
                {{$product ->regular_price}}

                </div>
            </div>
            <div class="variants p-2 text-center" data-transition="entrance" style="transform: none; transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s;">
                <div class="collection-product-swatches">
                </div>
            </div>

       </div>
    </div>
</div>
@endforeach
@endif
                </div>
            </div>
        </div>
</div>

@endif
