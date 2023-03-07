
@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Users</li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Image</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name"> <img src="{{asset('upload')}}/no-image.png" alt="" width="80"></td>
                            <td class="name" style="vertical-align: middle;">{{$c->name}}</td>
                            <td class="name" style="vertical-align: middle;">{{$c->email}}</td>
                            <td style="vertical-align: middle;"> <form action="/admin/admin-active" method="post" style="display: unset;">
                      @csrf
                      <input type="hidden" name="status" value="{{$c->status}}">
                    <input type="hidden" name="id" value="{{$c->id}}">
                    @if($c->status == '0')
                      <button  class="btn-success btn" type="submit">
                        Active
                      </button>
                      @else
                      <button  class="btn-danger btn" type="submit">
                        Banned
                      </button>
                      @endif
                      </form>
                                &nbsp;
                              <!-- <a class="btn btn-info" href="/admin/edit-slider/{{$c->id}}">Edit</a> -->
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

