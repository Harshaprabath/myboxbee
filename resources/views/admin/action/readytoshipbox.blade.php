
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">ready to ship Box create</li>
        </ol>
    </div>

@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-radybox" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="hidden" name="id" value="{{$boxes->id}}">
                    </div>
                    <div class="form-group">
                      <label for="">Box Name</label>
                      <input type="text" class="form-control" name="name" value="{{$boxes->name}}" id="boxname" placeholder="Enter Box Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Box title</label>
                      <input type="text" class="form-control" name="title" id="boxname"value="{{$boxes->title}}" placeholder="Enter Box title" required>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" class="form-control" value="{{$boxes->price}}" name="price" id="boxprice" placeholder="Enter price" required>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Box Image</label>
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
                  <form action="/admin/createreadytoshipbox" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Box Name</label>
                      <input type="text" class="form-control" name="name" id="boxname" placeholder="Enter Box Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Box title</label>
                      <input type="text" class="form-control" name="title" id="boxname" placeholder="Enter Box title" required>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" class="form-control" name="price" id="boxprice" placeholder="Enter price" required>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Box Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endif
@endsection

