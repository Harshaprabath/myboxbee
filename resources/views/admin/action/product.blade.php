
@extends('admin.admin')
@section('main-panel')
<style>.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;

color: #f60505;
text-align: center;
cursor: pointer;
position: absolute;
top: 86px;


margin-left: 8px;
}
.remove:hover {
  /* background: white; */
  color: black;
}</style>
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Add Product</li>
        </ol>
    </div>



@if($link == 'edit')

<div class="card ">
              <div class="card-body">
                  <form action="/admin/product-edit" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
<input type="hidden" name="id" value="{{$products[0] ->id}}">
                    <div class="form-group col-md-6">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" value="{{$products[0]->name}}" name="name" id="boxname" placeholder="Enter  Name" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Product title</label>
                      <input type="text" value="{{$products[0]->title}}" class="form-control" name="title" id="boxname" placeholder="Enter  title" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">SKU</label>
                      <input type="text" value="{{$products[0]->SKU}}" class="form-control" name="sku" id="price" placeholder="Enter sku" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Occasion</label>
                    <select name="occasion" id="" class="form-control">
                    <option value="" disabled>select</option>

                        @foreach($occasion as $o)
                        @if($o->id == $products[0]->occasion)
                             <option value="{{$products[0]->occasion}}" selected>{{$products[0]->occasionn}}</option>
                        @else
                        <option value="{{$o->id}}">{{$o->occasionn}}</option>
                        @endif

                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($category as $cat)
                        @if($cat->id == $products[0]->category_id)
                             <option value="{{$products[0]->category_id}}" selected>{{$products[0]->cname}}</option>
                        @else
                        <option value="{{$cat->id}}">{{$cat->cname}}</option>
                        @endif


                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Sub Category</label>
                    <select name="subcategory" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($subcategory as $sub)
                        @if($sub->id == $products[0]->subcategory)
                             <option value="{{$products[0]->subcategory}}" selected>{{$products[0]->sname}}</option>
                        @else
                        <option value="{{$sub->id}}">{{$sub->sname}}</option>
                        @endif


                        @endforeach
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="secondsub">second Sub Category</label>
                    <select name="secondsub" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($secondsub as $second)
                        @if($second->id == $products[0]->secondsub)
                             <option value="{{$products[0]->secondsub}}" selected>{{$products[0]->subname}}</option>
                        @else
                        <option value="{{$second->id}}">{{$second->subname}}</option>
                        @endif


                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="secondsub">brand</label>
                    <select name="brand" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($brand as $br)
                        @if($br->id == $products[0]->brand_id)
                             <option value="{{$products[0]->brand_id}}" selected>{{$products[0]->bname}}</option>
                        @else
                        <option value="{{$br->id}}">{{$br->bname}}</option>
                        @endif

                        @endforeach
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Price</label>
                      <input type="number" value="{{ $products[0]->regular_price}}" class="form-control" name="price" id="price1" placeholder="Enter price" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Discount(%)</label>
                      <input type="number" class="form-control discoun" name="disco" id="disco" placeholder="Enter" value="{{ $products[0]->discount}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Discount Price(%)</label>
                      <input type="number" value="{{ $products[0]->discountprice}}" class="form-control" name="discount" id="discount" placeholder="Enter price" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" value="{{ $products[0]->quantity}}" class="form-control" name="qty" id="qty" placeholder="Enter your quantity" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="">stock status</label>
                    <select name="stock_status" id="" class="form-control">
                        @if( $products[0]->stock_status == 'instock')
                        <option value="{{ $products[0]->stock_status}}" selected>in stock</option>
                        <option value="outofstock">out of stock</option>
                        @else
                        <option value="outofstock">out of stock</option>
                        <option value="instock" selected>in stock</option>
                        @endif
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for=""  >Size</label>
                      <input type="text"value="{{ $products[0]->size}}" class="form-control" name="size" id="size" placeholder="Size" >
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">short Discripion</label>
                      <input type="text" value="{{ $products[0]->short_description}}" class="form-control" name="short" id="short" placeholder="Enter short Description" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="categoryname">Primary Image</label>
                      <input type="file"  value="{{$products[0]->pimage}}" name="pimage" class="form-control">
                      <input type="hidden" value="{{ $products[0]->pimage}}" name="gtimg">
                      <img src="{{asset('upload')}}/{{ $products[0]->pimage}}" alt="" width="100">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Multiple Image</label>
                      <input type="file" class="form-control" id="file-input" name="image[]" multiple />
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <div id="thumb-output" class="row" >
                    </div>
                    @foreach($images as $image)
                        <?php
                        $exp =  explode('|',$image->images);
                        for($i =0; $i<count($exp);$i++){
                            $img =$exp[$i]
                            ?>

                             <input type="hidden" name="img_id" value="{{$image->id}}">
                             <img src="{{asset('upload')}}/<?php echo $img ?>" width="100" alt="">
                    <?php    } ?>
                    @endforeach

                    </div>
                    <div class="form-group col-md-6">
                      <label for="secondsub">Primary colur</label>
                    <select name="pcolor" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($colors as $color)
                        @if($color->id == $products[0]->color_id)
                        <option value="{{$products[0]->color_id}}">{{$products[0]->color}}</option>
                        @else
                        <option value="{{$color->id}}">{{$color->color}}</option>
                        @endif


                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6 ">
                    <label for="">Colors</label>
                    <div class="colorpicker-container row  m-0">
                        @if($colorss->isEmpty())
                        <input type="hidden" name="color_id" value="0">
                        @else
                    @foreach($colorss as $cl)
                        <?php
                        $exps =  explode('|',$cl->color);
                        for($i =0; $i<count($exps);$i++){
                          $clo = $exps[$i];

                         ?>
                          <input type="hidden" name="lengthcolor" value="<?php echo $i ?>" id="length">

                     <input class="full form-control col-md-3" value="<?php echo  $clo ?>" name="colorget<?php echo $i ?>" >
                     <?php    } ?>
                     <input type="hidden" name="color_id" value="{{$cl->id}}">
                    @endforeach
                  @endif
                    <!-- <input class="full form-control col-md-3"  name="color0" placeholder="ex: red"> -->
                        <a class="add" href="#">+ Add</a>
                        <input type="hidden" name="length" value="0" id="length" class="length">
                        </div>
                  </div>
                      </div>
<hr>
                    <h5>(Optional)</h5>


                    <div class="row">
                    @if($optionals->isEmpty())
                        <input type="hidden" name="optionalid" value="0">
                        @else
                    @foreach($optionals as $opt)
                    <?php
                        $heading =  explode('|',$opt->heading);
                        $des =  explode('|',$opt->description);
                        for($i =0; $i<count($heading);$i++){
                            $h = $heading[$i];
                            $d = $des[$i];
                         ?>
                        <div class="form-group col-md-6">
                        <input type="hidden" name="optionallength" value="<?php echo $i ?>" >
                        <label for="Heading">Heading</label>
                           <input type="text" value="<?php echo $h ?>" class="form-control" name="headingget<?php echo $i ?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="heading">Description</label>
                            <textarea name="descriptionget<?php echo $i ?>" value="<?php echo $d ?>" id="" cols="10" rows="0" class="form-control"><?php echo $d ?></textarea>
                            <br>
                        </div>
                        <input type="hidden" name="optionalid" value="{{$opt->id}}">
<?php } ?>
                        @endforeach
                        @endif
                        <input type="hidden" value="0" name="length1" id="length1" class="length1">


                        <a class="add1" href="#">+ Add</a>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>


@else

    <div class="card ">
              <div class="card-body">
                  <form action="/admin/product-add" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                      @csrf
                      <div class="row">

                    <div class="form-group col-md-6">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" name="name" id="boxname" placeholder="Enter  Name" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Product title</label>
                      <input type="text" class="form-control" name="title" id="boxname" placeholder="Enter  title" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">SKU</label>
                      <input type="text" class="form-control" name="sku" id="price" placeholder="Enter sku" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Occasion</label>
                    <select name="occasion" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($occasion as $o)
                        <option value="{{$o->id}}">{{$o->occasionn}}</option>

                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->cname}}</option>

                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Sub Category</label>
                    <select name="subcategory" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($subcategory as $sub)
                        <option value="{{$sub->id}}">{{$sub->sname}}</option>

                        @endforeach
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="secondsub">second Sub Category</label>
                    <select name="secondsub" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($secondsub as $second)
                        <option value="{{$second->id}}">{{$second->subname}}</option>

                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="secondsub">brand</label>
                    <select name="brand" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($brand as $br)
                        <option value="{{$br->id}}">{{$br->bname}}</option>

                        @endforeach
                    </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">Price</label>
                      <input type="number" class="form-control" name="price" id="price1" placeholder="Enter price" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Discount(%)</label>
                      <input type="number" class="form-control discoun" name="disco" id="disco" placeholder="Enter "  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Discount Price</label>
                      <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter price"  required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter your quantity" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="">stock status</label>
                    <select name="stock_status" id="" class="form-control">
                        <option value="instock">in stock</option>
                        <option value="outofstock">out of stock</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Size</label>
                      <input type="text" class="form-control" name="size" id="size" placeholder="Size" >
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">short Discripion</label>
                      <input type="text" class="form-control" name="short" id="short" placeholder="Enter short Description" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="categoryname">Primary Image</label>
                      <input type="file" name="pimage" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Multiple Image</label>
                      <input type="file" class="form-control" id="file-input" name="image[]" multiple  />
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <div id="thumb-output" class="row" ></div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="secondsub">Primary colur</label>
                    <select name="pcolor" id="" class="form-control">
                    <option value="" disabled>select</option>
                        @foreach($colors as $color)
                        <option value="{{$color->id}}">{{$color->color}}</option>

                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6 ">
                    <label for="">Colors</label>
                    <div class="colorpicker-container row  m-0">
                     <input class="full form-control col-md-3"  name="color0" placeholder="ex: red">
                        <a class="add" href="#">+ Add</a>
                        <input type="hidden" name="length" value="0" id="length">
                        </div>
                  </div>
                      </div>
<hr>
                    <h5>(Optional)</h5>


                    <div class="row">
                    <div class="foem-group col-md-6">
                        <label for="Heading">Heading</label>
                           <input type="text" class="form-control" name="heading0">
                        </div>
                        <div class="foem-group col-md-6">
                        <label for="heading">Description</label>
                            <textarea name="description0" id="" cols="10" rows="10" class="form-control"></textarea>
                            <br>
                        </div>
                        <input type="hidden" class="length1" value="0" name="length1" id="length2">
                        <a class="add1" href="#">+ Add</a>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>

@endif
              </div>


@endsection

