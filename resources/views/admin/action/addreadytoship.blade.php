

@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Ready-to-ship</li>
        </ol>
    </div>

@if($url == 'edit')
<div class="card ">
              <div class="card-body">
                  <form action="/admin/update-readytoship" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="hidden" name="id" value="{{$ready->id}}">
                    </div>
                    <div class="form-group">
                      <label for=""> Name</label>
                      <input type="text" class="form-control" value="{{$ready->name}}" name="name" id="boxname" placeholder="Enter  Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="price" class="form-control" value="{{$ready->price}}" name="price" id="boxname" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                      <label for="">afterpay</label>
                      <input type="text" class="form-control"value="{{$ready->afterpay}}" name="afterprice" id="boxprice" placeholder="Enter afterpay price" required>
                    </div>
                    <div class="form-group">
                      <label for="">Descrription</label>
                         <textarea name="descrription" class="form-control" id="" cols="30" rows="10">{{$ready->descrription}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Includes</label>
                         <textarea name="includes" class="form-control" id="" cols="30" rows="10">{{$ready->includes}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Details</label>
                         <textarea name="details" class="form-control" id="" cols="30" rows="10">{{$ready->details}}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Multiple Image</label>
                      <input type="file" class="form-control" id="file-input" name="image[]" multiple />
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <div id="thumb-output" class="row" >
                        <?php
                            $img =$ready->images;
                            $ex = explode('|',$img);
                            for($i=0;$i<count($ex);$i++){
                                ?>
                                <img src="{{asset('upload')}}/<?php echo $ex[$i] ?>" width="100" alt="">
                                <input type="hidden" name="getimg<?php echo $i ?>" value="<?php echo $ex[$i] ?>">
                           <?php }
                        ?>
                        <input type="hidden" name="length" value="<?php echo $i ?>">
                    </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
@else
    <div class="card ">
              <div class="card-body">
                  <form action="/admin/createreadyoship" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for=""> Name</label>
                      <input type="text" class="form-control" name="name" id="boxname" placeholder="Enter  Name" required>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="price" class="form-control" name="price" id="boxname" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                      <label for="">afterpay</label>
                      <input type="text" class="form-control" name="afterprice" id="boxprice" placeholder="Enter afterpay price" required>
                    </div>
                    <div class="form-group">
                      <label for="">Descrription</label>
                         <textarea name="descrription" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Includes</label>
                         <textarea name="includes" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Details</label>
                         <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Multiple Image</label>
                      <input type="file" class="form-control" id="file-input" name="image[]" multiple />
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <div id="thumb-output" class="row" ></div>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@endif
@endsection

