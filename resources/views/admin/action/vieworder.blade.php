


@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Product</li>
        </ol>
    </div>

<div class="col-lg-12">
              <div class="card mb-4">

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      {{-- <th>Action</th> --}}
                      <th>Status</th>
                      <th>Id</th>
                      <th>Image</th>
                        <th>Content</th>
                        <th>Quantity</th>
                        <th>Price</th>

                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      {{-- <th>Action</th> --}}
                      <th>Status</th>
                      <th>Id</th>
                      <th>Image</th>
                        <th>Content</th>
                        <th>Quantity</th>
                        <th>Price</th>


                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($order as $c)

                      <tr>
                      {{-- <td>
                      <form action="/admin/admin-order-action" method="post">
                      @csrf
                      <input type="hidden" name="status" value="{{$c->status}}">
                      <input type="hidden" name="status2" value="{{$c->status2}}">
                    <input type="hidden" name="box_id" value="{{$c->box_id}}">
                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="order_id" value="{{$c->order_id}}">
                    <input type="hidden" name="item_id" value="{{$c->item_id}}">
                    <input type="hidden" name="quantity" value="{{$c->quantity}}"> --}}
                {{-- <select name="action" id="" class="form-control" onchange='this.form.submit()'>
                    <option value="">select</option>
                    <option value="1">pending</option>
                    <option value="2">process</option>
                    <option value="3">completed</option>
                    <option value="0">cancel</option>
                    <!-- <noscript><input type="submit" value="Submit"></noscript> -->
                </select> --}}


                      {{-- </form>
                       </td> --}}
                        <td class="name">
                            @if($c->action == '0')
                            <span style="border: 3px solid red;border-radius: 25px;padding: 5px 15px;">Cancel</span>
                            @elseif($c->action == '1')
                            <span style="border: 3px solid blue;border-radius: 25px;padding: 5px 15px;">Pending..</span>
                            @elseif($c->action == '2')
                            <span style="border: 3px solid orange;border-radius: 25px;padding: 5px 15px;">Process</span>
                            @elseif($c->action == '3')
                            <span style="border: 3px solid green;border-radius: 25px;padding: 5px 15px;">Completed</span>
                            @endif
                        </td>

                        <td class="name">{{$c->id}}</td>

                            <td class="name" style="display: flex;">
                            <img src="{{asset('upload')}}/{{$c->item_image}}" alt="" width="100">

                        </td>

                            <td class="name"><span style="background-color: #00000087;color: white;padding: 5px 21px;border-radius: 25px;">{{$c->status}}</span>  <br><br>
                            {{$c->status2}}<br>
                            {{$c->item_name}}<br>
                            {{$c->box_id}}<br>
                            @if($c->status2 == 'RTS' || $c->status2 == 'card')
                            To: {{$c->to}} <br>
                            From: {{$c->from}}<br>
                            Message: {{$c->message}}<br>
                            Font: {{$c->font}} <br>
                             @foreach($download as $d)
                            @if($c->status2 == 'card' && $d != null && $c->imageid == $d[0]['id'] )
                            <a href="{{asset($d[0]['image'])}}" target="_blank" class="btn btn-dark" download>Download</button>
                                @endif
                            @endforeach
                            @else
                            @endif
                        </td>
                            <td class="name">{{$c->quantity}}</td>
                            <td class="name">{{$c->item_price}}</td>




                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



            <div class="card">
                        <div class="card-body">
                            <form action="#" method="post">
                                @csrf
                                <h4>Delivery Method </h4>
                                <span id="method" style="background-color: #090909bf;color: white;font-weight: bold;padding: 4px 14px;border-radius: 25px;">{{$ord[0]->method}}</span>
                                <hr>
                                <h4>Shipping address </h4>
                                <br>

                                <div class="mb-3">

                                    <h6 class="mb-1">First name</h6>

                                    <div class="text-secondary">
                                        <input type="text" class="form-control" name="firstname" id="fname" value="{{$ord[0]->firstname}}"  required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Last name</h6>
                                    <div class="text-secondary">
                                        <input type="text" class="form-control" name="lastname" id="lname" value="{{$ord[0]->lastname}}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Country</h6>
                                    <div class="col-sm- text-secondary">
                                        <input type="text" class="form-control" id="address" value="{{$ord[0]->country}}" name="address" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Address</h6>
                                    <div class="col-sm- text-secondary">
                                        <input type="text" class="form-control" id="address" value="{{$ord[0]->address}}" name="address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">City</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="city" value="{{$ord[0]->city}}" name="address" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">Province</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="province"value="{{$ord[0]->province}}" name="address"  required>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <h6 class="mb-1">Postal code</h6>
                                        <div class="col-sm- text-secondary">
                                            <input type="text" class="form-control" id="code" value="{{$ord[0]->postalcode}}" name="address"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Phone</h6>
                                    <div class="text-secondary">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$ord[0]->phone}}" required>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>





@endsection

