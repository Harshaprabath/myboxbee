@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="row mb-3">        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Complete orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$compete}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Cancel Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cancel}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Process Orders</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$process}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Invoice Example -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Today Orders</h6>
                    <p>{{$today}}</p>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="/admin/orders">View More <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
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

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

    </div>
    <!--Row-->



</div>
<!---Container Fluid-->


@endsection
