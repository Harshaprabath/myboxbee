@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </div>




        <div class="card ">
                <div class="card-body">
                  <form action="/admin/add-to-category" method="POST">
                      @csrf
                    <div class="form-group">
                      <label for="categoryname">Category Name</label>
                      <input type="text" class="form-control" name="categoryname" id="category" placeholder="Enter Category Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              <br>
              <div class="card ">
              <div class="card-body">
                  <form action="/admin/add-to-subcategory" method="POST">
                      @csrf
                      <div class="form-group">
                      <label for="categoryname">Category Name</label>
                      <select class="select2-single form-control" name="category" id="select2Single" required>
                      <option value="" disabled>select</option>
                      @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->cname}}</option>
                        @endforeach
                    </select>
                    <!-- <select name="" id="" disabled="disabled">
                        @foreach($category as $cat)
                        <option value="">{{$cat->name}}</option>
                        @endforeach
                    </select> -->
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Subcategory Name</label>
                      <input type="text" class="form-control" name="subname" id="subname" placeholder="Enter SubCategory Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
<br>
<div class="card ">
              <div class="card-body">
                  <form action="/admin/add-to-subtosubcategory" method="POST">
                      @csrf
                      <div class="form-group">
                      <label for="categoryname">Subcategory Name</label>
                      <select class="select2-single form-control" name="subcategory" id="select3Single" required>
                      <option value="" disabled>select</option>
                      @foreach($sub as $s)
                        <option value="{{$s->id}}">{{$s->sname}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Secondsub Name</label>
                      <input type="text" class="form-control" name="subtosub" id="category" placeholder="Enter SubCategory Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
<br>
              <div class="card ">
                <div class="card-body">
                  <form m action="/admin/add-to-brand" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="categoryname">Brand Name</label>
                    <select name="short" id="short"  class="select2-single form-control" >
                        <option value="A-C">A-C</option>
                        <option value="D-H">D-H</option>
                        <option value="I-L">I-L</option>
                        <option value="M-R">M-R</option>
                        <option value="SA-SU">SA-SU</option>
                        <option value="T-Z">T-Z</option>
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="categoryname">Brand Name</label>
                      <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand Name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              <br>
              <div class="card ">
                <div class="card-body">
                  <form action="/admin/add-to-color" method="POST">
                      @csrf
                    <div class="form-group">
                      <label for="categoryname">Colour</label>
                      <input type="text" class="form-control" name="color" id="category" placeholder="Enter colour" required>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Title</label>
                      <input type="text" class="form-control" name="title" id="category" placeholder="Enter tittle" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

              <div class="card ">
                <div class="card-body">
                  <form action="/admin/add-to-occasion" method="POST">
                      @csrf
                    <div class="form-group">
                      <label for="categoryname">Occasion</label>
                      <input type="text" class="form-control" name="occasion" id="category" placeholder="Enter occasion" required>
                    </div>
                    <div class="form-group">
                      <label for="categoryname">Title</label>
                      <input type="text" class="form-control" name="title" id="category" placeholder="Enter tittle" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
    </div>


    <!--Row-->



<!---Container Fluid-->


@endsection

