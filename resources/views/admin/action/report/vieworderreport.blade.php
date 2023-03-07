


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
                  <table class="table align-items-center table-flush" id="dataTable1">
                    <thead class="thead-light">
                      <tr>
                      <th>Status</th>
                      <th>Id</th>
                      <th>Image</th>
                        <th>Content</th>
                        <th>Quantity</th>
                        <th>Price</th>

                      </tr>
                    </thead>
                    <tfoot>

                      <th>Status</th>
                      <th>Id</th>
                      <th>Image</th>
                        <th>Content</th>
                        <th>Quantity</th>


                        <th><div class="row">
                                    <div>
                                        <p>Subtotal:&nbsp; </p>
                                    </div>
                                    <div>
                                        <p>${{$ord[0]->subtotal}}</p>
                                    </div>

                                </div>
</th>
                      </tr>

                    </tfoot>
                    <tbody>
                    @foreach($order as $c)

                      <tr>

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
                            Font: {{$c->font}}
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

