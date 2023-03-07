@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coparate Orders</li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>

                            <th>email</th>
                            <th>compny</th>
                            <th>Box quantity</th>
                            <th>industry</th>

                            <th>usecase</th>
                            <th>Desired Ship Date</th>
                            <th>Lead Source</th>
                            <th>Internal Gifting</th>
                            <th>External Gifting</th>
                            <th>nternational Shipping</th>
                            <th>Have you worked with us before</th>
                            <th>Tell us a little about the project</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Name</th>

                            <th>email</th>
                            <th>compny</th>
                            <th>Box quantity</th>
                            <th>industry</th>

                            <th>usecase</th>
                            <th>Desired Ship Date</th>
                            <th>Lead Source</th>
                            <th>Internal Gifting</th>
                            <th>External Gifting</th>
                            <th>nternational Shipping</th>
                            <th>Have you worked with us before</th>
                            <th>Tell us a little about the project</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($order as $c)
                        <tr>

                            <td class="id">{{$c->id}}</td>
                            <td class="name">{{$c->fname}} {{$c->lname}}</td>
                            <td class="name">{{$c->email}}</td>
                            <td class="name">{{$c->compny}}</td>
                            <td class="name">{{$c->Bquantity}}</td>
                            <td class="name">{{$c->industry}}</td>
                            <td class="name">{{$c->usecase}}</td>
                            <td class="name">{{$c->desiredSdate}}</td>
                            <td class="name">{{$c->LeadSource}}</td>
                            <td class="name">{{$c->Igift}}</td>
                            <td class="name">{{$c->Egift}}</td>
                            <td class="name">{{$c->Ishiping}}</td>
                            <td class="name">{{$c->haveyouworkeedwithus}}</td>
                            <td class="name">{{$c->about}}</td>
                            <!-- <td>
                              <a class="btn btn-info" href="/admin/order-view/{{$c->id}}">view</a>
                            </td> -->

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
