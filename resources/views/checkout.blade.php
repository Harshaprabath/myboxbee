<!DOCTYPE html>
<html lang="en">
<?php

    use App\Models\slider;
    
    $logo = slider::where('type','=','logo')->get();
    ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <title>Checkout</title>
    @if($logo->isEmpty())
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    @else

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('upload/frontend')}}/{{$logo[0]->image }}">
    @endif

</head>
<!-- Modal -->

<body>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warnning Massege</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    The service is suspended
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>
    </div>
    <style>
        p {
            margin: 0;
        }
    </style>
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem !important;
        }

        /* HIDE RADIO */
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio]+img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked+img {
            outline: 2px solid #f00;
        }
    </style>
    <br>
    <div class="container">
        <div class="main-body m-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="post">
                                @csrf
                                <h4>Delivery Method </h4>
                                <div class="row" style="display:flex">

                                    <div class="col-md-6"
                                        style="justify-content:center;display:flex;background-color: #eff0f1;padding: 8px;">
                                        <label onclick="ptype(1)">
                                            <h6>Cash On Delivery</h6>
                                            <input type="radio" name="test" value="" checked>
                                            <img src="{{asset('img/cash.png')}}" alt="" width="100%"
                                                style="height:100px">
                                        </label>
                                    </div>
                                    <div class="col-md-6"
                                        style="justify-content:center;display:flex;background-color: #eff0f1;padding: 8px;">
                                        <label onclick="ptype(0)">
                                            <h6>Online Pyament</h6>
                                            <input type="radio" name="test" value="" checked>
                                            <img src="{{asset('img/cash.png')}}" alt="" width="100%"
                                                style="height:100px">
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <span id="method"
                                    style="background-color: #090909bf;color: white;font-weight: bold;padding: 4px 14px;border-radius: 25px;"></span>
                                <hr>
                                <h4>Shipping address </h4>
                                <br>

                                <div class="mb-3">

                                    <h6 class="mb-1">First name</h6>

                                    <div class="text-secondary">
                                        <input type="text" class="form-control" name="firstname" id="fname" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Last name</h6>
                                    <div class="text-secondary">
                                        <input type="text" class="form-control" name="lastname" id="lname" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Country</h6>
                                    <div class="text-secondary">
                                        <select name="" id="contry" class="form-control">
                                            {{-- <option value="">select</option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote DIvoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option> --}}
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            {{-- <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Address</h6>
                                    <div class="col-sm- text-secondary">
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">City</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="city" name="address" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">District</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="province" name="address"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">Postal code</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="code" name="address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Phone</h6>
                                    <div class="text-secondary">
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @php $total="0";$total1="0" @endphp
                            <div class="col px-2 px-lg-4" style="max-height: 565px;overflow-y: auto; width: 100%;">
                                <div class="items" id="lcheckut">
                                    @foreach ($cartItems as $cartItem)
                                    <div class="item">
                                        <div class="row flex-nowrap items-center py-2">
                                            <div class="col-6 col-lg-3">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="image">
                                                            <p
                                                                style="background-color: black;color: white;border-radius: 38px;width: 23px;text-align: center;position: absolute;margin: 0 41px;z-index: 999;font-size: 15px;">
                                                                {{$cartItem->qty}}</p>
                                                            <div class="embed-responsive embed-responsive-1by1"
                                                                style="width:50px">
                                                                <div class="embed-responsive-item text-center"><img
                                                                        src="{{asset('upload') }}/{{$cartItem->options->image}}" class="w-100"
                                                                        alt=""></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row justify-content-between">
                                                    <div>
                                                        <p>{{$cartItem->name}}</p>
                                                        <div class="text-muted">
                                                            <p>{{$cartItem->options->status2}} </p>
                                                            {{-- <p>Belle &amp; Blush </p> --}}
                                                            {{-- <p>box: 000zx</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col-lg-3 grand">
                                                <p class="text-right grandtotal ">LKR {{ number_format($cartItem->price, 2)}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class=" mb-4">
                                <div class="row subtotal" style="font-size: 20px;">
                                    <div class="col ">
                                        <p>Subtotal</p>
                                    </div>
                                    <div class="col-auto ">
                                        <p id="sub">
                                            LKR {{ number_format(ShoppingCart::subtotal(), 2) }}
                                        </p>
                                        <input type="hidden" id="subtotal" value="{{ShoppingCart::subtotal()}}">
                                    </div>
                                </div>
                                <div class="row subtotal" style="font-size: 20px;">

                                    <div class="col ">
                                        <p>Shipping</p>
                                    </div>
                                    <div class="col-auto ">
                                        <p>
                                            @foreach($ship as $s)
                                            LKR {{ number_format($s->price, 2) }}
                                            <input type="hidden" id="ship" value="{{$s->price}}">
                                            @php $total = (float)ShoppingCart::subtotal() + (float)$s->price @endphp
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row subtotal" style="font-size: 20px;">
                                    <div class="col ">
                                        <p>Total</p>
                                    </div>
                                    <div class="col-auto ">
                                        <p id="total">
                                            LKR {{number_format($total??0, 2)}}
                                        </p>
                                        <input type="hidden" name="userid" id="userid" value="{{$user}}">
                                        <input type="hidden" id="total1" value="{{$total??0}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn col-md-12" style="background-color: black;color: white;" id="placeorder">PLACE
                        ORDER</button>
                </div>
            </div>
            <br>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // var cart = JSON.parse(sessionStorage.getItem('cart'));
    // //  console.log(cart);
    // var data = [];
    // var gift = [];
    // var result = Object.values(cart).reduce((a, c) => {
    //     if (Array.isArray(c)) return a.concat(Array.from(c, (r) => [r]));
    //     return a.concat([c]);
    // }, []);
    // for (var i = 0; i < result.length; i++) {
    //     var result1 = Object.values(result[i]).reduce((a, c) => {
    //         if (Array.isArray(c)) return a.concat(Array.from(c, (r) => [r]));
    //         return a.concat([c]);
    //     }, []);

    //     for (var b = 0; b < result1.length; b++) {
    //         if (result1[b] != '') {
    //             data.push(result1[b]);
    //         }


    //     }


    // }
    $('#method').text('Cash on delivery');
    $(document).ready(function () {
        $('#exampleModalCenter').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#exampleModalCenter').modal('show')
    })

    function ptype(t) {
        if (t == 0) {
            $deliver = {
                type: 'Online Payment',
                status: 0
            }
        } else {
            $('#exampleModalCenter').modal('hide');
            $deliver = {
                type: 'Cash on delivery',
                status: 1
            }

        }
        localStorage.setItem('delivery', JSON.stringify($deliver));
        var json = localStorage.getItem('delivery');
        var state = JSON.parse(json);
        $('#method').text(state.type)

    }


    $('#placeorder').click(function () {
        var json = localStorage.getItem('delivery');
        var state = JSON.parse(json);
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        var lname = $('#lname').val();
        var contry = $('#contry').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var province = $('#province').val();
        var code = $('#code').val();
        var phone = $('#phone').val();
        var fname = $('#fname').val();
        var subtotal = $('#subtotal').val();
        var total = $('#total1').val();
        var ship = $('#ship').val();
        var user_id = $('#userid').val();
        for (var i = 0; i < data.length; i++) {
            console.log(i);
            if (Array.isArray(data[i])) {
                console.log(i);
                gift.push(data[i]);
            }
        }
        console.log('gift', gift);
        console.log('dta', data);
        if (fname == '' || null) {

            iziToast.error({
                message: 'first name required',
                position: "topRight"
            });


        }
        else if (lname == '' || null) {
            iziToast.error({
                message: 'Last name required',
                position: "topRight"
            });


        }
        else if (contry == '' || null) {
            iziToast.error({
                message: 'Country required',
                position: "topRight"
            });


        }
        else if (address == '' || null) {
            iziToast.error({
                message: 'Address  required',
                position: "topRight"
            });


        }
        else if (city == '' || null) {
            iziToast.error({
                message: 'City required',
                position: "topRight"
            });


        }

        else if (province == '' || null) {
            iziToast.error({
                message: 'Province required',
                position: "topRight"
            });


        }
        else if (code == '' || null) {
            iziToast.error({
                message: 'Postalcode name required',
                position: "topRight"
            });


        }
        else if (phone == '' || null) {
            iziToast.error({
                message: 'phone required',
                position: "topRight"
            });


        }
        else {
            if (state.status == 0) {
                var val = Math.floor(1000 + Math.random() * 9000);
                var utc = new Date().toJSON().slice(0, 10).replace(/-/g, '/');
                const data = JSON.stringify({
                    "merchantRID": "CT/" + utc + "/" + "MR" + val,
                    "amount": 5.00,
                    "validTimeLimit": 5,
                    "returnUrl": "https://www.abc.com",
                    "customerMail": "spresad33@gmail.com",
                    "customerMobile": "0763333333",
                    "mode": "WEB",
                    "orderSummary": "Order Description",
                    "customerReference": "CT/" + utc + "/" + "CUS" + user_id
                })

                const xhr = new XMLHttpRequest()


                xhr.addEventListener('readystatechange', function () {
                    if (this.readyState === this.DONE) {
                        var stste = JSON.parse(this.responseText);
                        if (stste.status == 0) {
                            window.open(stste.data.payUrl, 'popUpWindow', 'height=900,width=600,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
                        }
                        console.log(JSON.parse(this.responseText));
                    }
                })

                xhr.open('POST', 'https://dev.app.marx.lk/api/v2/ipg/orders')
                xhr.setRequestHeader('content-type', 'application/json')
                xhr.setRequestHeader('user_secret', '$2a$10$x1CAe9YuEz9G1X1ZQrTrLOJXFu2PSvrwLuBcWpgT2ecRAx5sxfOhW')
                xhr.send(data)
                console.log('online');

            }
            else {
                console.log('cash');
                $.ajax({
                    url: '/admin/add-checkout',
                    method: 'POST',
                    data: {
                        'method': state.type,
                        'fname': fname,
                        'lname': lname,
                        'country': contry,
                        'address': address,
                        'city': city,
                        'province': province,
                        'pcode': code,
                        'phone': phone,
                        'sub': subtotal,
                        'total': total,
                        'ship': ship,
                        'cart': data,
                        'gift': gift,
                    },
                    headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' },
                    success: function (result) {
                        console.log(result);
                        if (result.status == '1') {
                            iziToast.success({
                                message: 'Place order successfully',
                                position: "topRight"
                            })
                            Swal.fire({
                                title: 'Place order successfull',
                                text: "Your Order Id:" + result.id,
                                icon: 'success',

                                confirmButtonColor: 'green',

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    sessionStorage.removeItem('cart');
                                    sessionStorage.removeItem('total')
                                    window.location = '/cart'
                                }
                            })

                        }
                        else {
                            iziToast.error({
                                message: 'Place order fail.',
                                position: "topRight"
                            })


                        }
                    }

                })
            }


        }
    })
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
@include('layout.notify')

</html>