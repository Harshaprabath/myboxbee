
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Fetures</li>
        </ol>
    </div>


@if($url == 'edit')

    <div class="card ">
              <div class="card-body">
                  <form action="/admin/update-fetuers" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <input type="hidden" name="id" value="{{$slide->id}}">
                    <div class="form-group">
                      <label for=""> Title</label>
                      <input type="text" class="form-control" value="{{$slide->title}}" name="title" id="boxname" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                      <label for=""> description</label>
                    <textarea name="description" class="form-control" id="" cols="10" rows="2">{{$slide->discription}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Image</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="getimg" value="{{$slide->image}}">
        <img src="{{asset('upload/frontend')}}/{{$slide->image}}" alt="" width="100">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
</div>
@else
<div class="card ">
              <div class="card-body">
                  <form action="/admin/add-fetuers" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for=""> Title</label>
                      <input type="text" class="form-control" name="title" id="boxname" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                      <label for=""> description</label>
                    <textarea name="description" class="form-control" id="" cols="10" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
</div>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($feuter as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="id">{{$c->title}}</td>
                            <td class="id">{{$c->discription }}</td>
                            <td class="name"> <img src="{{asset('upload/frontend')}}/{{$c->image}}" alt="" width="100"></td>
                            <td> <form action="/admin/admin-remove" method="post" style="display: unset;">
                      @csrf

                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="type" value="fetuers">
                    <input type="hidden" name="pimage" value="{{$c->image}}">
                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                                &nbsp;
                              <a class="btn btn-info" href="/admin/edit-fetuers/{{$c->id}}">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

