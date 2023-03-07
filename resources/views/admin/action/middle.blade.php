@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Home-Middle-Image</li>
        </ol>
    </div>


<div class="card ">

<div class="card-body">
<h5>Home images</h5>
    <form action="/admin/add-home" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="content" value="1">
        <div class="form-group">
      </div>

      <div class="form-group">
        <label for="categoryname">Image 01</label>
        <input type="file" name="image" class="form-control">
      </div>

      <input type="hidden" name="type" value="middle">
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <form action="/admin/add-home" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="content" value="2">
        <div class="form-group">
      </div>

      <div class="form-group">
        <label for="categoryname">Image 02</label>
        <input type="file" name="image" class="form-control">
      </div>

      <input type="hidden" name="type" value="middle">
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <form action="/admin/add-home" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="content" value="3">
        <div class="form-group">
      </div>

      <div class="form-group">
        <label for="categoryname">Image 03</label>
        <input type="file" name="image" class="form-control">
      </div>

      <input type="hidden" name="type" value="middle">
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</div>
</div>
@endsection
