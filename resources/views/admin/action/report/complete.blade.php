@extends('admin.admin')
@section('main-panel')
<style>
    @media print {
        .header-print {
            display: table-header-group;
        }
    }
</style>
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Product</li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">

                <br>
                <form action="/admin/search-report-cancel" method="post">
                @csrf
                <div class="row m-0">
                    <div class="mb-3 col-md-4">
                        <h6 class="mb-1">To:</h6>
                        <div class="col-sm- text-secondary">
                            <input type="date" class="form-control" id="city" name="start" required>
                        </div>
                    </div>

                    <div class="mb-3 col-md-4">
                        <h6 class="mb-1">From</h6>
                        <div class="col-sm- text-secondary">
                            <input type="date" class="form-control" id="province" name="end" required>
                        </div>
                    </div>


                    <input type="hidden" class="form-control" id="code" name="action" value="3" required>


                    <div class="col-sm-2 text-secondary" style="margin: auto 0;">
                        <button class="btn btn-info" type="submit"> Filter</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable1">
                    <thead class="thead-light">

                        <tr>
                            <th>status</th>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total: &nbsp; ${!! number_format((float)($order->sum('item_price')), 2) !!} <br>
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
                            <td class="name"><span style="background-color: #00000087;color: white;padding: 5px 21px;border-radius: 25px;">{{$c->status}}</span> <br><br>
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
    @endsection
