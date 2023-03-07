<title>Wishlist</title>
<div class="main">

    <div class="container">


        <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
            <a href="/" title="Home">Home</a>
            <span aria-hidden="true" style="width: 15px;margin: 2px 14px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
            <span>My wishlist</span>

        </nav>

    </div>

    <!--NEW WISHLIST//-->
    <div class="iwishWrapper collection">
        <div class="title">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h1>My Wishlist</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="container">
                <div class="iwishProducts row">
                    @foreach($products as $product)
                    <div class="iwishItem col-6 col-lg-3">
                        <form id="addForm" action="/add-to-cart" method="post" enctype="multipart/form-data" class="iwish-product-form shappify_add_to_cart_form home-&amp;-gifts" data-product-id="{{$product->id}}">
                        @csrf
                        <div class="product">
                                <div class="pb-4">
                                    <div class="image" data-transition="entrance" style="transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s; transform: none;">
                                        <div class="mb-4">

                                            <div class="card border-0">
                                                <div class="card-img">
                                                    <div class="bg-white">
                                                        <div class="image">
                                                            <div class="embed-responsive embed-responsive-1by1">
                                                                <div class="embed-responsive-item text-center">
                                                                    <img class="w-100 lazyloaded" src="{{asset('upload')}}/{{$product->pimage}}" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                        <div class="vendor" data-transition="entrance" style="transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s; transform: none;">
                                            <div class="text-center">
                                                <h6 class="text-dark m-0">{{$product->name}}</h6>
                                            </div>
                                        </div>
                                        <div class="title" data-transition="entrance" style="transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s; transform: none;">
                                            <div class="text-center">{{$product->name}} | {{$product->title}}</div>
                                        </div>

                                    <div class="price" data-transition="entrance" style="transition: transform 1200ms cubic-bezier(0.2, 0.7, 0.5, 1) 0s; transform: none;">
                                        <div class="text-center mb-3"><span class="product-price money" data-price="5000">{{$product->regular_price}}</span></div>
                                    </div>
                                    <div><input class="iwishBuyBtn btn btn-block btn-primary rounded-0 py-2 px-4" type="submit" value="Add to Cart" name="add"></div>
                                    <div class="text-center"><a class="iwishRemoveBtn" href="#" data-variant="40968445231260" title="Remove from wishlist">Remove</a></div>
                                </div>
                            </div>
                            <input type="hidden" name="quantity" value="1"><input type="hidden" name="id" value="{{$product->id}}"><!-- inventory_policy: deny-->
                            <!-- inventory_management: shopify-->
                        </form>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <div style="clear: both;"></div>
                    <div class="iwishShareContainer">
                        <div class="shareTitle">Email / Share Your Wishlist :</div>
                        <div class="iwishbtn-group" style="margin: 0 5px; display: inline-block; vertical-align: middle;"><a class="iwishShareBtn iwishEmail" title="Email" href="https://iwish.myshopapps.com/share/shareWishlist.php?shop=429&amp;cust=0&amp;url=https%3A%2F%2Fwww.belleandblush.com%2Fapps%2Fiwish%3Fshare%3D0%26iwishlist%3D%7B%227051781701788%22%3A%5B%2240968445231260%22%5D%2C%227050127605916%22%3A%5B%2240963708420252%22%5D%7D" target="_blank">Email</a><a class="iwishShareBtn iwishFb" title="On Facebook" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.belleandblush.com%2Fapps%2Fiwish%3Fshare%3D0%26iwishlist%3D%7B%227051781701788%22%3A%5B%2240968445231260%22%5D%2C%227050127605916%22%3A%5B%2240963708420252%22%5D%7D&amp;v=1633078579" target="_blank">Facebook</a><a class="iwishShareBtn iwishTw" title="On Twitter" href="https://twitter.com/share?text=&amp;url=https%3A%2F%2Fwww.belleandblush.com%2Fapps%2Fiwish%3Fshare%3D0%26iwishlist%3D%7B%227051781701788%22%3A%5B%2240968445231260%22%5D%2C%227050127605916%22%3A%5B%2240963708420252%22%5D%7D&amp;v=1633078579" target="_blank">Twitter</a></div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <link href="https://s3.amazonaws.com/media.myshopapps.com/iwish/css/iwish_proxy.css" rel="stylesheet" type="text/css">


</div>
