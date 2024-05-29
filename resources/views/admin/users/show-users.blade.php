@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <!-- TABLE: Users -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Users</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Picture</th>
                                            <th>first Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Type</th>
                                            <th>Birth Date</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td><img src="{{$user->image}}" class="img-circle elevation-2" alt="User Image" style="width: 3rem; height: 3rem"></td>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->username}}</td>
                                                @if($user->permission === 1)
                                                    <td class="text-success">Admin</td>
                                                @else
                                                    <td class="text-primary">User</td>
                                                @endif
                                                <td>{{\Carbon\Carbon::parse($user->birth_date)->format('d M Y')}}</td>
                                                <td><a href="{{url('admin/edit-user/'.$user->id)}}" class="btn btn-success">Edit</a></td>
                                                <td><a href="{{url('admin/delete-user/'.$user->id)}}" class="btn btn-danger">Delete</a></td>
                                                <td><a href="{{url('admin/chat-box/'.$user->id)}}" class="btn btn-primary">Chat</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
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
