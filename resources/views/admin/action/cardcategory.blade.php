
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Card Category</li>
        </ol>
    </div>
@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-card-category" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <input type="hidden" name="id" value="{{$card->id}}">
                    </div>
                    <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" value="{{$card->category}}" name="name" id="boxname" placeholder="Enter Category Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
@else
    <div class="card ">
              <div class="card-body">
                  <form action="/admin/add-ctegory-card" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" class="form-control" name="name" id="boxname" placeholder="Enter Category Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
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
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($cards as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name">{{$c->category}}</td>
                            <td> <form action="/admin/admin-remove-category" method="post" style="display: unset;">
                      @csrf

                    <input type="hidden" name="id" value="{{$c->id}}">

                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                                &nbsp;
                              <a class="btn btn-info" href="/admin/edit-card-category/{{$c->id}}">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

