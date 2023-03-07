
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coparate Gifting</li>
        </ol>
    </div>

    <div class="card ">

              <div class="card-body">
              @if($slider->isEmpty())
                  <form action="/admin/add-coparate" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>

                    <div class="form-group">
                      <label for="categoryname"> Image</label>
                      <input type="file" name="image" class="form-control">

                    </div>

                    <input type="hidden" name="type" value="coparate">

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    @else
@foreach($slider as $s)
<form action="/admin/update-coparate" method="POST" enctype="multipart/form-data">
@csrf
                    <div class="form-group">
                      <label for="categoryname"> Image</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg" value="{{$s->image}}">
                    </div>
                    <div class="form-group">

                   <img src="{{asset('upload/frontend')}}/{{$s->image}}" alt="" width="200'">
                    </div>
                    <input type="hidden" name="type" value="coparate">
                    <input type="hidden" name="id" value="{{$s->id}}">

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  @endforeach
                  @endif
                </div>
              </div>
              <br>




@endsection

