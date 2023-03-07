@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> subCategory</li>
        </ol>
    </div>






    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Name</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Sub Name</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($sub as $c)

                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name">{{$c->sname}}</td>

                            <td >{{$c->cname}}<input class="category" type="hidden" value="{{$c->category_id}}"></td>
                            <td>
                            <form action="/admin/admin-remove" method="post" style="display: unset;">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$c->id}}">
                                    <input type="hidden" name="type" value="sub">
                                    <button class="btn-danger btn" type="submit">Remove</button>
                                </form>
                                &nbsp;
                                <button type="button" class="btn-info btn edit1" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/update-to-subcategory" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                      @csrf
                      <div class="form-group">
                      <label for="categoryname">Category Name</label>
                      <input type="hidden" id="category1" name="cat_id">
                      <select class="select2-single form-control" name="category"  style="width: 100%;" >
                      <option value="" >select</option>
                      @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->cname}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Subcategory Name</label>
                      <input type="text" class="form-control" name="subname" id="subname" placeholder="Enter SubCategory Name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection
