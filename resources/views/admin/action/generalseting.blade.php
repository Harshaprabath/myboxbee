@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">General setting</li>
        </ol>
    </div>

    <div class="card ">

        <div class="card-body">
            <h6>Shiping Amount</h6>
            <form action="/admin/add-shiping" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" id="boxname" placeholder="" required>
                </div>

                @foreach($ship as $s)
                <input type="hidden" name="id" value="{{$s->id}}">
                @endforeach


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<br>
        <div class="card ">

            <div class="card-body">
                <h6>Logo</h6>
                @if($logo->isEmpty())
                  <form action="/admin/Logo" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>

                    <div class="form-group">
                      <label for="categoryname"> Image</label>
                      <input type="file" name="image" class="form-control">

                    </div>

                    <input type="hidden" name="type" value="logo">

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    @else
@foreach($logo as $s)
<form action="/admin/update-logo" method="POST" enctype="multipart/form-data">
@csrf
                    <div class="form-group">
                      <label for="categoryname"> Image</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg" value="{{$s->image}}">
                    </div>
                    <div class="form-group">

                   <img src="{{asset('upload/frontend')}}/{{$s->image}}" alt="" width="200'">
                    </div>
                    <input type="hidden" name="type" value="logo">
                    <input type="hidden" name="id" value="{{$s->id}}">

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  @endforeach
                  @endif
            </div>
            @endsection
