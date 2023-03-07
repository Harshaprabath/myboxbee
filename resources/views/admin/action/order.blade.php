@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Orders</li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Subtotal</th>
                            <th>Shiping</th>
                            <th>Total</th>
                            <th>Method</th>
                            <th>action</th>
                            <th>action2</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>User</th>
                            <th>Subtotal</th>
                            <th>Shiping</th>
                            <th>Total</th>
                            <th>Method</th>
                            <th>action</th>
                            <th>action2</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($order as $c)
                        <tr>
                          
                            <td class="id">{{$c->id}}</td>
                            <td class="name">{{$c->user_id}}({{$c->name}}) </td>
                            <td class="name">{{$c->subtotal}}</td>
                            <td class="name">{{$c->shiping}}</td>
                            <td class="name">{{$c->Total}}</td>
                            <td class="name">{{$c->method}}</td>
                            <td> 
                              <a class="btn btn-info" href="/admin/order-view/{{$c->id}}">view</a>
                            </td>
                            <td>
                                <form action="/admin/admin-order-action" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$c->id}}">
                                    <input type="hidden" name="status" value="all">
                                <select name="action" id="" class="form-control" onchange='this.form.submit()'>
                                    <option value="">select</option>
                                    <option value="1">pending</option>
                                    <option value="2">process</option>
                                    <option value="3">completed</option>
                                    <option value="0">cancel</option>
                                    <!-- <noscript><input type="submit" value="Submit"></noscript> -->
                                </select>
                                </form>
                            </td>
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

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
