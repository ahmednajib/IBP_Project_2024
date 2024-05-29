@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('admin/update-user')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                    @endif
                                    <input type="hidden" name="id" value="{{$user_data->id}}">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" value="{{$user_data->first_name}}" name="firstname">
                                        <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" value="{{$user_data->last_name}}" name="lastname">
                                        <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" value="{{$user_data->username}}" name="username">
                                        <span class="text-danger">@error('username'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate">Birth Date</label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                                        <span class="text-danger">@error('birthdate'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="text" class="form-control" id="image" value="{{$user_data->image}}" name="image">
                                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"> Edit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

