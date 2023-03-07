
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Home-top-slider</li>
        </ol>
    </div>

@if($url == 'edit')
<div class="card ">

              <div class="card-body">
              <h5>Home top slider</h5>
                  <form action="/admin/update-slider" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="hidden" name="id" value="{{$slide->id}}">
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Slider Image</label>
                      <input type="file" name="image"  value="{{$slide->image}}" class="form-control">
                      <input type="hidden" name="getimg"  value="{{$slide->image}}" class="form-control">
                      <img src="{{asset('upload/frontend')}}/{{$slide->image}}" alt="" width="100">
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Content</label>
                      <textarea  name="content" class="form-control"  required>{{$slide->content}} </textarea>
                    </div>
                    <input type="hidden" name="type" value="top">

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
</div>
@else
    <div class="card ">

              <div class="card-body">
              <h5>Home top slider</h5>
                  <form action="/admin/add-home" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Slider Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Content</label>
                      <textarea  name="content" class="form-control" required> </textarea>
                    </div>
                    <input type="hidden" name="type" value="top">

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              <br>

@endif
<br>
              <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($slider as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name"> <img src="{{asset('upload/frontend')}}/{{$c->image}}" alt="" width="100"></td>
                            <td class="name">{{$c->content}}</td>
                            <td> <form action="/admin/admin-remove" method="post" style="display: unset;">
                      @csrf

                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="type" value="slider">
                    <input type="hidden" name="pimage" value="{{$c->image}}">
                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                                &nbsp;
                              <a class="btn btn-info" href="/admin/edit-slider/{{$c->id}}">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection

