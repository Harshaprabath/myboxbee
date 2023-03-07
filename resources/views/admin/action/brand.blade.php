
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Brand</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Brand</li>
        </ol>
    </div>
<div class="col-lg-12">
              <div class="card mb-4">

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Short</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Short</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    @foreach($brand as $c)
                      <tr>
                        <td class="id">{{$c->id}}</td>
                        <td class="short">{{$c->shortcut}}</td>
                        <td class="name">{{$c->bname}}</td>
                        <td>
                        <form action="/admin/admin-remove" method="post" style="display: unset;">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$c->id}}">
                                    <input type="hidden" name="type" value="brand">
                                    <button class="btn-danger btn" type="submit">Remove</button>
                                </form>
                        &nbsp;
                        <button type="button" class="btn-info btn brandedit"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>

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
                <form action="/admin/update-to-brand" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                      @csrf
                      <div class="form-group">
                      <label for="categoryname">Shortcut</label>
                      <input type="hidden" id="shortcut" name="shortcut">
                      <select class="select2-single form-control" name="shortcut1"  style="width: 100%;" >
                      <option value="" >select</option>

                        <option value="A-C">A-C</option>
                        <option value="D-H">D-H</option>
                        <option value="I-L">I-L</option>
                        <option value="M-R">M-R</option>
                        <option value="SA-SU">SA-SU</option>
                        <option value="T-Z">T-Z</option>

                    </select>
                    </div>
                    <div class="form-group">
                      <label for="categoryname"> Name</label>
                      <input type="text" class="form-control" name="bname" id="bname" placeholder="Enter Name" required>
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

