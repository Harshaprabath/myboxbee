
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Gift Voucher Price</li>
        </ol>
    </div>
@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-voucherprice" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <input type="hidden" name="id" value="{{$voucher->id}}">
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" class="form-control"  value="{{$voucher->price}}" name="price" id="boxname" required>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Image</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg"  value="{{$voucher->image}}">
                      <img src="{{asset('upload')}}/{{$voucher->image}}" alt="" width="100">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@else
    <div class="card ">
              <div class="card-body">
                  <form action="/admin/add-voucher-price" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" class="form-control" name="price" id="boxname" required>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endif
@endsection

