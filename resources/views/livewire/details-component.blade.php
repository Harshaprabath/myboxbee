<title>Product View</title>
<div class="container">


    <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs" style="background: none;">
        <a href="/" title="Home">Home</a>


        <span aria-hidden="true" style="width: 15px;margin: 2px 14px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg></span>


        <span aria-hidden="true" style="width: 15px;margin: 2px 14px;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg></span>
        <span>{{$product->name}}</span>

    </nav>

</div>



<div class="product" itemscope="">

    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <div class="images">

                    <div class="mb-5">

                        <div class="row">

                            <div class="carousel slide" data-interval="0" id="images">

                                <ol class="carousel-indicators d-none mb-0">

                                    <li class="active" data-slide-to="0" data-target="#images"></li>

                                    <li class="" data-slide-to="1" data-target="#images"></li>

                                </ol>

                                <div class="carousel-inner">


                                <div class="carousel-item  {{$product ->name}} activeimg">

                                    <img class="w-100 big_img" src="{{asset('upload')}}/{{$product ->pimage}}">

                                    </div>

                                @foreach($images as $image)
                                <?php
                                    $img = $image->images;
                                    $explodeimg = explode('|',$img);
                                    for($i = 0;$i<count($explodeimg);$i++){
                                        $img = $explodeimg[$i];
                                ?>

                                    <div class="carousel-item {{$product ->name}}<?php echo $i ?>">

                                        <img class="w-100 big_img" src="{{asset('upload')}}/<?php echo $img ?>">

                                    </div>

                                    <?php } ?>
                                    @endforeach


                                </div>

                            </div>

                        </div>
                        <style>
                .activeimg{
                    display: block;
                }
            </style>
                        <div class="row">

                            <div class="py-lg-2">

                                <ul class="nav flex-row d-lg-flex-column">

                                <li class="nav-item" style="width: 140px;">

                                    <a class="nav-link  {{$product ->name}} activeimg" data-slide-to="0" href="#images">

                                    <img class="w-100" src="{{asset('upload')}}/{{$product ->pimage}}">

                                    </a>

                                    </li>

                                            @foreach($images as $image)
                                            <?php
                                                $img = $image->images;
                                                if($img == ''){

                                                }else{
                                                    $explodeimg = explode('|',$img);
                                                    for($i = 0;$i<count($explodeimg);$i++){
                                                        $img = $explodeimg[$i]
                                                ?>


                                        <li class="nav-item" style="width: 140px;">

                                            <a class="nav-link {{$product ->name}}<?php echo $i ?>" data-slide-to="0" href="#images">

                                            <img class="w-100" src="{{asset('upload')}}/<?php echo $img ?>">

                                            </a>

                                        </li>
                                        <script>
                                                                    $('.{{$product ->name}}<?php echo $i ?>').click(function(){
                                                                                if(!$(this).hasClass("activeimg")){
                                                                                $(".activeimg").removeClass("activeimg");
                                                                                $(this).addClass("activeimg");
                                                                                if($(this).hasClass('activeimg')){
                                                                                    $('.{{$product ->name}}<?php echo $i ?>').addClass('activeimg')
                                                                                }
                                                                        }else{
                                                                            return false;//this prevents flicker
                                                                        }
                                                                    })
                                                                    $('.{{$product ->name}}').click(function(){
                                                                                if(!$(this).hasClass("activeimg")){
                                                                                $(".activeimg").removeClass("activeimg");
                                                                                $(this).addClass("activeimg");
                                                                                if($(this).hasClass('activeimg')){
                                                                                    $('.{{$product->name}}').addClass('activeimg')
                                                                                }
                                                                        }else{
                                                                            return false;//this prevents flicker
                                                                        }

                                                                    })
                                                                    </script>

    <?php }

}

  ?>

@endforeach



                                    <!-- <li class="nav-item" style="width: 140px;">

                                        <a class="nav-link" data-slide-to="1" href="#images">

                                            <img class="w-100" src="{{asset('upload')}}/{{$product ->pimage}}">

                                        </a>

                                    </li> -->



                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <style>
                .activeimg {
                    display: block;
                }

                .zoom:hover {
                    -ms-transform: scale(1.5);
                    /* IE 9 */
                    -webkit-transform: scale(1.5);
                    /* Safari 3-8 */
                    transform: scale(1.5);
                }
                .codepen_profile{position: fixed; right: 20px; bottom: 20px;}
            .codepen_profile a {background: rgb(245 122 32 / 53%); padding: 15px; border-radius: 50%; box-shadow: hsl(0deg 0% 80%) 0 5px 16px; height: 60px; width: 60px; display: inline-block; }
            /*Footer End*/
            </style>
            <div class="col-lg-4">



                <div class="py-lg-5">

                    <div class="title mb-3">
                        <div class="m-0">
                            <h1 class="text-capitalize text-xl"><a href="/collections/vendors?q=BAREFOOT%20DREAMS" title="BAREFOOT DREAMS">{{$product ->name}}</a></h1>
                            <h2 class="text-lg">{{$product ->short_description}}</h2>
                        </div>
                    </div>

                    <div class="variants" itemprop="offers">

                        <div class="m-0">





                            <input class="d-none" type="radio" name="variant" id="40918955262108" checked="">

                            <div class="variant" itemscope="" itemtype="http://schema.org/Offer">

                                <meta itemprop="priceCurrency" content="USD">

                                <meta itemprop="price" content="44.0">

                                <link itemprop="availability" href="http://schema.org/InStock">

                                <div class="price">

                                    <div class="m-0">

                                        <p>

                                        ${{$product ->regular_price}}



                                        </p>

                                    </div>

                                </div>

                                <div class="rule">

                                    <div class="mb-3">

                                        <hr class="border-bottom border-dark border-top m-0">

                                        @foreach($colors as $color)
                                        <?php
                                            $clor = $color->color;
                                            $emp = explode('|',$clor);
                                            if($clor == ''){

                                            }
                                            else{
                                                ?>
                                                <div class="row">
                                               <h5 style="margin: 10px 8px;">color :</h5>
                                                <?php
                                                for($i=0;$i<count($emp);$i++){
                                                    $cl = $emp[$i]
                                                    ?>

                                                            <span style="width: 30px;height: 30px;background-color: <?php echo $cl ?>;margin: 5px;"></span>

                                            <?php   }?>
                                            </div>
                                            <?php   } ?>


                                        @endforeach

                                    </div>

                                </div>



                                <div class="form">

                                    <div class="m-0">

                                        <form  method="post" class="product">

                                            <input type="hidden" name="id" value="{{$product->id}}" class="product_id">

                                            <div class="button">

                                                <div class="mb-2">




                                                    <div class="mb-2">
                                                        <label for="quantity">Qty: </label>
                                                        <input min="1" type="number" class="qty-input" id="qty-input" name="quantity" value="1">
                                                    </div>


                                                    <button class="btn btn-block btn-primary rounded-0 py-2 px-4 add-to-cart" type="submit">



                                                        Add to bag



                                                    </button>



                                                </div>

                                            </div>

                                            <div class="iwishAddWrap" style="text-align: center;text-transform: uppercase;">
                                                @if($product->wishlist == 0)
                                                <a class="iWishAdd" href="#" id="iWishAdd" data-product="7033494274204" data-ptitle="BAREFOOT DREAMS | CozyChic Lamb Buddie">Add to Wishlist</a>
                                                @else
                                                <p >Added in wishlist</p>
                                                @endif
                                                <p class="iWishLoginMsg" ></p>
                                            </div>


                                        </form>

                                    </div>

                                </div>

                            </div>





                            <div id="shopify-section-message" class="shopify-section pb-2">

                                <div class="message">

                                    <div class="text-center">

                                        <svg class="d-inline-block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.38 10" fill="#888" height="10">

                                            <path d="M15.23,4.94v0h0l-.3-1.53h0l-.15-.78a1.37,1.37,0,0,0-1.3-1.06H10.38A1.21,1.21,0,0,0,10,1.6V1.15A1.16,1.16,0,0,0,8.85,0H1.15A1.16,1.16,0,0,0,0,1.15V7.31A1.16,1.16,0,0,0,1.15,8.46H2.31a1.54,1.54,0,1,0,3.07,0H9.3a1.15,1.15,0,0,0,1.08.77H11a1.53,1.53,0,0,0,2.66,0h.59a1.15,1.15,0,0,0,1.15-1.15V6.54a10.7,10.7,0,0,0-.15-1.6Zm-.85-.32H12.31V3.85h1.91ZM3.85,9.23a.77.77,0,0,1,0-1.54.77.77,0,0,1,0,1.54ZM5.18,7.69a1.54,1.54,0,0,0-2.67,0H1.15a.38.38,0,0,1-.38-.38V1.15A.38.38,0,0,1,1.15.77h7.7a.38.38,0,0,1,.38.38V7.69Zm7.13,1.54a.77.77,0,1,1,0-1.54.77.77,0,0,1,0,1.54Zm1.92-.77h-.38a1.54,1.54,0,1,0-3.08,0h-.39A.38.38,0,0,1,10,8.08V2.69a.38.38,0,0,1,.38-.38h3.08a.59.59,0,0,1,.54.44l.07.33H11.92a.38.38,0,0,0-.38.38V5a.39.39,0,0,0,.38.39h2.6c0,.24.06.51.08.76h-.37a.39.39,0,0,0-.38.39.38.38,0,0,0,.38.38h.39V8.08A.39.39,0,0,1,14.23,8.46Z"></path>

                                        </svg>

                                        <em style="font-size : 10px; font-weight : 400;">

                                            Free U.S. Shipping on orders $100+

                                        </em>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>



                    <div class="rule">

                        <div class="mb-3">

                            <hr class="border-dark m-0">

                        </div>

                    </div>





                    <div class="description">

                        <style>
                            .description h5:before {

                                content: '- ';

                            }

                            .description .collapsed h5:before {

                                content: '+ ';

                            }
                        </style>

                        <div id="barefoot-dreams-cozychic-lamb-buddie-description">
                            @foreach($optionals as $optional)
                            @if($optional -> id == '' )

                            <a class="" data-toggle="collapse" href="#barefoot-dreams-cozychic-lamb-buddie-details">

                                <h5>Details</h5>


                            </a>
                            <div class="collapse show" data-parent="#barefoot-dreams-cozychic-lamb-buddie-description" id="barefoot-dreams-cozychic-lamb-buddie-details">
                                <p>Made from CozyChic fabrication, this cuddly lamb is the perfect companion for your growing little one to cozy up with for years to come!</p>
                            </div>
                            @else

                                                <?php
                                                $heading = $optional->heading;
                                                $des = $optional->description;
                                                $depheading = explode('|', $heading);
                                                $depdes = explode('|', $des);

                                                if ($heading == null) {
                                                    echo $heading;
                                                } else {
                                                    for ($i = 0; $i < count($depheading); $i++) {
                                                ?>
                                                        <a class="" data-toggle="collapse" href="#<?php echo $depheading[$i] ?>view">

                                                            <h5><?php echo $depheading[$i] ?></h5>


                                                        </a>
                                                        <div class="collapse show" data-parent="#barefoot-dreams-cozychic-lamb-buddie-description" id="<?php echo $depheading[$i] ?>view">
                                                            <p><?php echo $depdes[$i] ?></p>
                                                        </div>

                                                <?php  }
                                                } ?>

                            @endif

                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="mb-5" id="shopify-product-reviews" data-id="7033494274204">
            <style scoped="">
                .spr-container {
                    padding: 24px;
                    border-color: #ececec;
                }

                .spr-review,
                .spr-form {
                    border-color: #ececec;
                }
            </style>

            <div class="spr-container">
                <div class="spr-header">
                    <h2 class="spr-header-title">Customer Reviews</h2>
                    <div class="spr-summary">
                        <span class="spr-summary-caption">No reviews yet</span><span class="spr-summary-actions">
                            <a href="#" class="spr-summary-actions-newreview">Write a review</a>
                        </span>
                    </div>
                </div>

                <div class="spr-content">
                    <div class="spr-form" id="form_7033494274204" style="display: none">
                        <form method="post" action="//productreviews.shopifycdn.com/api/reviews/create" id="new-review-form_7033494274204" class="new-review-form" onsubmit="SPR.submitForm(this);return false;"><input type="hidden" name="review[rating]"><input type="hidden" name="product_id" value="7033494274204">
                            <h3 class="spr-form-title">Write a review</h3>
                            <fieldset class="spr-form-contact">
                                <div class="spr-form-contact-name">
                                    <label class="spr-form-label" for="review_author_7033494274204">Name</label>
                                    <input class="spr-form-input spr-form-input-text " id="review_author_7033494274204" type="text" name="review[author]" value="" placeholder="Enter your name">
                                </div>
                                <div class="spr-form-contact-email">
                                    <label class="spr-form-label" for="review_email_7033494274204">Email</label>
                                    <input class="spr-form-input spr-form-input-email " id="review_email_7033494274204" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                </div>
                            </fieldset>


                            <fieldset class="spr-form-review">

                                <div class="spr-form-review-rating">
                                    <label class="spr-form-label" for="review[rating]">Rating</label>
                                    <div class="spr-form-input spr-starrating ">
                                        <a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="1" aria-label="1 of 5 stars">&nbsp;</a>
                                        <a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="2" aria-label="2 of 5 stars">&nbsp;</a>
                                        <a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="3" aria-label="3 of 5 stars">&nbsp;</a>
                                        <a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="4" aria-label="4 of 5 stars">&nbsp;</a>
                                        <a href="#" onclick="SPR.setRating(this);return false;" class="spr-icon spr-icon-star spr-icon-star-empty" data-value="5" aria-label="5 of 5 stars">&nbsp;</a>
                                    </div>
                                </div>

                                <div class="spr-form-review-title">
                                    <label class="spr-form-label" for="review_title_7033494274204">Review Title</label>
                                    <input class="spr-form-input spr-form-input-text " id="review_title_7033494274204" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                </div>

                                <div class="spr-form-review-body">
                                    <label class="spr-form-label" for="review_body_7033494274204">
                                        Body of Review
                                        <span role="status" aria-live="polite" aria-atomic="true">
                                            <span class="spr-form-review-body-charactersremaining">(1500)</span>
                                            <span class="visuallyhidden">characters remaining</span>
                                        </span>
                                    </label>
                                    <div class="spr-form-input">
                                        <textarea class="spr-form-input spr-form-input-textarea " id="review_body_7033494274204" data-product-id="7033494274204" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>

                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="spr-form-actions">
                                <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                            </fieldset>
                        </form>
                    </div>
                    <div class="spr-reviews" id="reviews_7033494274204" style="display: none"></div>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="products">

    <div class="m-0">





    </div>

</div>

<script>
    window

        .addEventListener(

            'load',

            function(event) {

                $('[data-image]').click(

                    function() {

                        $('#images').carousel(

                            $(this).data('image')

                        );

                    }

                );

            }

        );
</script>

<!-- PERFECT AUDIENCE INTEGRATION START -->

            <script>
               $(document).ready(function(){

                       $('.big_img').imagezoomsl({
                           zoomrange:[7,7]
                       })

               })
           </script>
<script type="text/javascript">
    window._pq = window._pq || [];
    _pq.push(['trackProduct', '7033494274204']);
</script>

<!-- PERFECT AUDIENCE INTEGRATION END -->
