
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Card</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Card</li>
        </ol>
    </div>

@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-card" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$cards->id}}">
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Card Category</label>

                      <select name="category" id="" class="form-control" required>

                      @foreach($category as $o)
                        @if($o->id == $cat->id)
                             <option value="{{$cards->cat_id}}" selected>{{$cat->category}}</option>
                        @else
                        <option value="{{$o->id}}">{{$o->category}}</option>
                        @endif
                        @endforeach

                      </select>
                      </div>
                    <div class="form-group">
                      <label for="">Card Name</label>
                      <input type="text"value="{{$cards->name}}" class="form-control" name="name" id="boxname" placeholder="Enter Card Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Card title</label>
                      <input type="text"value="{{$cards->title}}" class="form-control" name="title" id="boxname" placeholder="Enter Card title" required>
                    </div>

                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" value="{{$cards->price}}" class="form-control" name="price" id="boxprice" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea type="text"value="" class="form-control" name="description" id="description" placeholder="Enter Description" >{{$cards->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Card Image Front</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg"  value="{{$cards->image}}">
                      <img src="{{asset('upload')}}/{{$cards->image}}" alt="" width="100">
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Card Image Back</label>
                      <input type="file" name="image1" class="form-control">
                      <input type="hidden" name="getimg1"  value="{{$cards->image1}}">
                      <img src="{{asset('upload')}}/{{$cards->image1}}" alt="" width="100">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@else
    <div class="card ">
              <div class="card-body">
                  <form action="/admin/createcard" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Card Category</label>
                      <select name="category" id="" class="form-control" required>
                          <option value="">select</option>
                          @foreach($category as $cat)
                          <option value="{{$cat->id}}">{{$cat->category}}</option>
                          @endforeach
                      </select>
                      </div>
                    <div class="form-group">
                      <label for="">Card Name</label>
                      <input type="text" class="form-control" name="name" id="boxname" placeholder="Enter Card Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Card title</label>
                      <input type="text" class="form-control" name="title" id="boxname" placeholder="Enter Card title" required>
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
                      <label for="categoryname">Card Image Front</label>
                      <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Card Image Back</label>
                      <input type="file" name="image1" class="form-control" required>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endif
@endsection

