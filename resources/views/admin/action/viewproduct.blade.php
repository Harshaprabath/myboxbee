
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
                  <table class="table align-items-center table-flush" id="dataTable2">
                    <thead class="thead-light">
                      <tr>
                      <th>Action</th>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Short_Description</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>category</th>
                        <th>Brand</th>
                        <th>stock_status</th>
                        <th>Quantity</th>

                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Action</th>
                      <th>Id</th>
                      <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Short_Description</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>category</th>
                        <th>Brand</th>
                        <th>stock_status</th>
                        <th>Quantity</th>

                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($product as $c)

                      <tr>
                      <td>
                      <form action="/admin/admin-remove" method="post">
                      @csrf
                    <input type="hidden" name="pimage" value="{{$c->pimage}}">
                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="type" value="product">
                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                        &nbsp;
                        <a class="btn-info btn" href="{{ route('admin.editproduct',['id'=> $c->id])}}">Edit</a></td>


                        <td>{{$c->id}}</td>
                        <td><img src="{{asset('upload')}}/{{$c->pimage}}" alt="" srcset="" width="100"> </td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->title}}</td>
                        <td>{{$c->short_description}}</td>
                        <td>{{$c->regular_price}}</td>
                        <td>{{$c->discount}}</td>
                        <td>{{$c->cname}}</td>
                        <td>{{$c->bname}}</td>
                        <td>{{$c->stock_status}}</td>
                        <td>{{$c->quantity}}</td>


                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>





@endsection

