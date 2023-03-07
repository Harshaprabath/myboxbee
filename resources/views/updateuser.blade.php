<div class="main-body col-md-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if($user->profile_photo_path == '' || null)
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            @else
                            <img src="{{asset('upload/user')}}/{{$user->profile_photo_path}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            @endif
                            <div class="mt-3">
                                <h4>{{$user->name}}</h4>
                                <p class=" mb-1" style="color: black;">{{$user->email}}</p>
                                <form action="/admin/add-image" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" class="form-control">
                                    <input type="hidden" name="id" value="{{$user->id}}" class="form-control">
                                    <input type="hidden" name="pimage" value="{{$user->profile_photo_path}}" class="form-control">
                                    <br>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/updateprofile" method="post">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-sm-3">
                                    <h6 class="mb-0">User Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Change">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class="col-md-12">

                        <div class="card">


                            <div class="card-body">

                                <form method="POST" action="{{ route('change.password') }}">

                                    @csrf

                                    <div class="form-group row">

                                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>



                                        <div class="col-md-6">

                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">

                                        </div>

                                    </div>



                                    <div class="form-group row">

                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>



                                        <div class="col-md-6">

                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                                        </div>

                                    </div>



                                    <div class="form-group row">

                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>



                                        <div class="col-md-6">

                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

                                        </div>

                                    </div>



                                    <div class="form-group row mb-0">

                                        <div class="col-md-8 offset-md-4">

                                            <button type="submit" class="btn btn-primary">

                                                Update Password

                                            </button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
