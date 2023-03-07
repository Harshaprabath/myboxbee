
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
     
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Sticker</li>
        </ol>
    </div>

@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-sticker" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="hidden" name="id" value="{{$boxes->id}}">
                    </div>
                    <div class="form-group">
                      <label for="">Sticker Name</label>
                      <input type="text" value="{{$boxes->name}}" class="form-control" name="stickername" id="name" placeholder="Enter Sticker Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Sticker title</label>
                      <input type="text" value="{{$boxes->title}}" class="form-control" name="title" id="boxname" placeholder="Enter Sticker title" required>
                    </div>

                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" value="{{$boxes->price}}" class="form-control" name="price" id="boxprice" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea type="text" class="form-control" value="" name="description" id="description" placeholder="Enter Description" >{{$boxes->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Sticker Image</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg"  value="{{$boxes->image}}">
                      <img src="{{asset('upload')}}/{{$boxes->image}}" alt="" width="100">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

@else
    <div class="card ">
              <div class="card-body">
                  <form action="/admin/createsticker" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Sticker Name</label>
                      <input type="text" class="form-control" name="stickername" id="name" placeholder="Enter Sticker Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Sticker title</label>
                      <input type="text" class="form-control" name="title" id="boxname" placeholder="Enter Sticker title" required>
                    </div>

                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" class="form-control" name="price" id="boxprice" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter Description" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Sticker Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endif
@endsection

