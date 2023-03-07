@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Gift Voucher</li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Image</th>
                            <th>price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($voucher as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name"> <img src="{{asset('upload')}}/{{$c->image}}" alt="" width="100"></td>
                            <td class="name">{{$c->price}}</td>
                            <td> <form action="/admin/admin-remove" method="post" style="display: unset;">
                      @csrf

                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="type" value="price">
                    <input type="hidden" name="pimage" value="{{$c->image}}">
                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                                &nbsp;
                              <a class="btn btn-info" href="/admin/gift-voucherprice-edit/{{$c->id}}">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
