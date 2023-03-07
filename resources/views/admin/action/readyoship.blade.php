@extends('admin.admin')
@section('main-panel')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Readytoship</li>
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
                            <th>Name</th>
                            <th>Afterpay</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Includes</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Afterpay</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Includes</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($ready as $c)
                        <tr>
                            <td class="id">{{$c->id}}</td>
                            <td class="name">
                            <?php
                                $img = $c->images;
                                $ex = explode('|',$img);
                                for($i=0;$i<1;$i++){
                                    ?>
                                     <img src="{{asset('upload')}}/<?php echo $ex[0] ?>" alt="" width="100">
                              <?php  }   ?>
                                </td>
                            <td class="name">{{$c->name}}</td>
                            <td class="name">{{$c->afterpay}}</td>
                            <td class="name">{{$c->price}}</td>
                            <td class="name">{{$c->descrription}}</td>
                            <td class="name">{{$c->includes}}</td>
                            <td class="name">{{$c->details}}</td>
                            <td> <form action="/admin/admin-remove" method="post" style="display: unset;">
                      @csrf

                    <input type="hidden" name="id" value="{{$c->id}}">
                    <input type="hidden" name="type" value="ship">
                    <?php
                                $img = $c->images;
                                $ex = explode('|',$img);
                                for($i=0;$i<count($ex);$i++){
                                    ?>
                                     <input type="hidden" name="pimage<?php echo $i ?>" value="<?php echo $ex[$i] ?>">
                              <?php  }   ?>
                              <input type="hidden" name="lenght" value="<?php echo $i ?>">
                      <button class="btn-danger btn" type="submit">Remove</button>
                      </form>
                                &nbsp;
                              <a class="btn btn-info" href="/admin/edit-readytoship/{{$c->id}}">Edit</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
