@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Registration</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">User Registration</li>
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
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('admin/register-user')}}" method="post">
            @csrf
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
                    <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
                    <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
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
                        <label>Permission</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permission" value="1">
                            <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="permission" value="0">
                            <label class="form-check-label">User</label>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" placeholder="Enter the link..." name="image">
                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Register</button>
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
