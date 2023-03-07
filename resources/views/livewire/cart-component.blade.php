<title>Cart</title>
<div id="shopify-section-cart" class="shopify-section">

    <div class="cart max-w-5xl mx-auto">

        <div class="py-5 my-4">



            <div class="form ">

                <div class="container px-2 px-lg-4">

                    <div class="row no-gutters">

                        @php $total="0" @endphp
                        <div class="col px-2 px-lg-4">

                            <div class="header">

                                <div class="text-right">

                                    Price

                                    <hr>

                                </div>

                            </div>

                            <div class="items" id="loadcart">




                            </div>

                            <div class="footer mt-8">

                                <div class="row flex-lg-row-reverse justify-content-between">

                                    <div class="col-lg-5">

                                        <div class="mb-5">

                                            <div class=" mb-4">
                                                <div class="row subtotal" style="font-size: 20px;">

                                                    <div class="col ">

                                                        <p>

                                                            Subtotal

                                                        </p>

                                                    </div>

                                                    <div class="col-auto ">

                                                        <p id="sub">

                                                            {{-- ${{ number_format($total, 2) }} --}}

                                                        </p>

                                                    </div>
                                                </div>

                                            </div>

                                            <a class="btn btn-block btn-primary py-2" href="/checkout" name="checkout">

                                                Checkout

                                            </a>

                                        </div>

                                    </div>

                                    <div class="col-lg-5">

                                        <div class="form-group">

                                            <label class="mb-3">

                                                <u><strong>GIFT BOX CUSTOMERS - PLEASE READ:</strong></u>
                                                <ul>
                                                    <li>*Custom gift boxes take 1-2 business days to process before
                                                        shipping.</li>
                                                    <br>
                                                    <li>*Your gift recipient will not see any pricing. We remove all
                                                        price tags and only include a gift receipt.</li>
                                                    <br>
                                                    <li>*You DO NOT need to select the "Gift Wrap" option to the right.
                                                        Your gift box will come neatly packaged with the sleeve, ribbon
                                                        and sticker you selected.</li>
                                                    <br>
                                                    <li>*If you didn't purchase a card but still want to include a note
                                                        with your gift, leave your message below and we will include it
                                                        on a B&amp;B notecard for you.</li>
                                                </ul>

                                            </label>

                                            <textarea class="form-control border-dark text-dark p-2" name="note" rows="3"></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        {{-- @else
                       

                        <div class="row m-auto">
                            <div class="col-md-12 mycard py-5 text-center">
                                <div class="mycards">
                                <img src="{{asset('img/emptycart.png')}}" alt="" width="100%">
                                    <h4>Your cart is currently empty.</h4>
                                              </div>
                            </div>
                        </div>
                        @endif --}}

                    </div>

                </div>


            </div>



        </div>

    </div>


</div>

<div class="modal fade" data-backdrop="static" id="card" >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <a href="#builder" data-dismiss="modal" style="font-size: 1.5rem;">×</a>
                <form action="/cart/add" name="message" method="post">
                    <div class="container px-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row no-gutters">
                                    <div class="col px-2 px-lg-4">
                                        <div class="title">
                                            <div class="mb-5">
                                                <h1>
                                                    Write your card message
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black-50 display-4" for="to">
                                                To
                                            </label>
                                            <input class="form-control bg-transparent  px-0" type="text" name="to"
                                                id="to">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black-50 display-4" for="from">
                                                From
                                            </label>
                                            <input class="form-control bg-transparent  px-0" type="text" name="from"
                                                id="from">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black-50 display-4" for="message">
                                                Card Message ( 350 characters max, please )
                                            </label>
                                            <textarea class="form-control bg-transparent  px-0" name="message" rows="8" maxlength="350" id="message"></textarea>
                                            <input type="hidden" id="boxid">
                                        </div>
                                        <style>
                                            .font-select {
                                                width: 100%;
                                            }

                                        </style>
                                        <div class="form-group">
                                            <label class="text-black-50 display-4 col-md-12" for="message">
                                                Font
                                            </label>
                                            <input id="font1" type="text"
                                                class="form-control bg-transparent  px-0 col-md-12">
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

                            <div class="col-md-6 m-auto"
                                style="font-size: 22px;background-size: contain;background-repeat: no-repeat"
                                id="cardprev">
                                <div class="no-gutters" style="margin: 123px 25px">
                                    <div class="resizeme" style="text-align: center;font-size: 19px">
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


                                                        <div class="" style="margin: 42px 0">

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
                                <div style="margin: -37px 0 0;">
                                    <button id="replace" type="button" style="float: right;border: 1px solid black"
                                        class="btn col-md-12 replace">Replace Card</button>
                                </div>
                                <style>
                                    .replace:hover {
                                        background-color: black;
                                        color: white
                                    }

                                </style>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn"
                        style="background-color: green;color: white;font-size: 15px;padding: 10px;margin-top: 6px;"
                        onclick="savemessage(1)">Update</button>
                </form>
            </div>

        </div>
    </div>

</div>

<div class="modal fade builder" data-backdrop="static" id="cardall">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <a href="#builder" data-dismiss="modal" style="font-size: 1.5rem;">×</a>
                <form action="/cart/add" name="message" method="post">
                    <div class="container px-2">
                        <div class="row">
                            <div class="row col-md-12">
                                @foreach ($card as $car)
                                    <div class="col-4 px-2 px-lg-4 m-auto" style=""
                                        onclick="cardview({{ $car }})">
                                        <input class="d-none" type="radio" name="id" value="{{ $car->id }}"
                                            id="card{{ $car->id }}">
                                        <label for="card{{ $car->id }}">
                                            <div class="product">
                                                <div class="m-0">
                                                    <div class="image image1 col-md-12">
                                                        <div class="mb-3">
                                                            <img class="w-100"
                                                                src="{{ asset('upload') }}/{{ $car->image }}"
                                                                alt="{{ $car->name }}">
                                                        </div>
                                                        <div class="middle">
                                                            <div class="text1">
                                                                SELECT</div>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <div class="pb-3 mb-3">
                                                            <div class="vendor">
                                                                <div class="text-center">
                                                                    <h6 class="m-0">
                                                                        {{ $car->name }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="title">
                                                                <div class="text-center">
                                                                    {{ $car->title }}
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <div class="text-center">

                                                                    LKR {{ $car->price }}


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

<div class="modl1 vi">
    <div class="modal-dialog alert">
        <div class="modal-dialog-header">You can type 350 characters. </div>
        <div class="modal-dialog-content">Chracters Limited</div>
        <div class="modal-dialog-actions">
            <button class="btn btn-dark okwarnbing" type="button" style="cursor: pointer;pointer-events: all;">
                Okay
            </button>
        </div>
    </div>
</div>
<style>
      .layer {
                        overflow-x: visible;
                    }

                    .middle {
                        transition: .5s ease;
                        opacity: 0;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        -ms-transform: translate(-50%, -50%);
                        text-align: center;
                        background-color: red;
                    }


                    .builder form label .image img {
                        border: 2px solid transparent;
                    }

                    .builder .image1:hover img {
                        border: 2px solid black;
                        opacity: 0.3;

                    }

                    .widget.filter-widget .vertical-list li a:hover::after,
                    .widget.filter-widget .vertical-list li a.active::after {
                        opacity: 1;
                        filter: alpha(opacity=100);
                    }



                    .builder .image1:hover .mb-3 {
                        background-color: black;
                    }

                    .builder .image1:hover .middle {

                        opacity: 1;

                    }

                    .text1 {
                        background-color: #010101;
                        color: white;
                        font-size: 16px;
                        padding: 16px 32px;
                    }

                    .builder form :checked+label .image img {
                        border: 5px solid black;

                    }

                    .builder .product .hover {
                        display: none;
                    }

                    .builder .product:hover .hover {
                        display: block;
                    }

                    .builder .gift[data-remove] {
                        cursor: pointer;
                    }

                    .modal input,
                    .modal textarea {
                        border: 1px solid #666 !important;
                        padding: 4px !important;
                    }

                    .modal input:focus,
                    .modal textarea:focus {
                        outline: 1px solid black;
                    }

                    /* .drop{
                        width : 300px;
  background: #d9d9d9;
  margin : 40px auto;
                    } */



                    .li {
                        border-bottom: 1px solid rgb(0, 0, 0);
                        padding: 0px 19px;


                    }

                    .li a {
                        width: 100%;
                        display: inline-block;
                    }
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

    .activeimg {
        display: block;
    }

    .show1 {
        display: flex !important;
    }

</style>
<script>
    var to = document.getElementById('to');
    var from = document.getElementById('from');
    var message = document.getElementById('message');
    var font = document.getElementById('font1');

    $(document).on('click', '#showcard', function(e) {
        console.log(this);
        var boxid = $(this).closest('.box').find('.boxid').val()
        console.log(boxid);
        let cart = JSON.parse(sessionStorage.getItem('cart'));
        let img = cart[boxid].card.item_image;
        to.value = cart[boxid].card.to;
        from.value = cart[boxid].card.from;
        message.value = cart[boxid].card.message;
        font.value = cart[boxid].card.font
        $('.previewto').text(cart[boxid].card.to)
        $('.previewfrom').text(cart[boxid].card.from)
        $('.previewmessage').text(cart[boxid].card.message)
        $('#boxid').val(boxid);
        console.log('cart', cart);
        console.log('img', img);
        $('#card').modal('show');
        var upload = 'pload'
        // document.getElementById('cardprev').style.backgroundImage="url({{ asset('upload') }}/"+img +")" 
        document.getElementById('cardprev').style.backgroundImage = 'url({{ asset('upload') }}/' + img + ')'
        // $('.pick-card-modal').modal('show');

    })

    to.addEventListener('keyup', function(event) {
        $('.previewto').text(event.target.value)
    })
    from.addEventListener('keyup', function(event) {
        $('.previewfrom').text(event.target.value)
    });
    message.addEventListener('keyup', function(event) {
        if (event.target.value.length >= 350) {
            $('.modl1').removeClass('vi')
            $('.modl1').addClass('boxfox-modal')
            $('.modl1').addClass('visible')

            return false;
        } else {
            $('.previewmessage').text(event.target.value)
        }
    })

    function savemessage(status) {
        let cart = JSON.parse(sessionStorage.getItem('cart'));
        const to = $('#to').val();
        const from = $('#from').val();
        const message = $('#message').val();
        const font1 = $('#font1').val();
        var id = $('#boxid').val();
        if (status == 1) {
            cart[id].card.to = to || '';
            cart[id].card.from = from || '';
            cart[id].card.message = message || '';
            cart[id].card.font = font1 || '';
        } else {
            cart[id].card.to = '';
            cart[id].card.from = '';
            cart[id].card.message = '';
        }
        sessionStorage.setItem('cart', JSON.stringify(cart));
        location.reload(); 
    }

    $(document).on('click', '#replace', function() {
        $('#card').modal('hide');
        $('#cardall').modal('show');
    })
function cardview(data) {
    console.log(data);
    var id = $('#boxid').val();
    let cart = JSON.parse(sessionStorage.getItem('cart'));
    cart[id].card.item_id = data.id;
    cart[id].card.item_image = data.image;
    cart[id].card.item_name = data.name;
    cart[id].card.item_price = data.price;
    sessionStorage.setItem('cart', JSON.stringify(cart));
    $('#card').modal('show');
    $('#cardall').modal('hide');
    document.getElementById('cardprev').style.backgroundImage = 'url({{ asset('upload') }}/' + data.image + ')'
}
</script>
