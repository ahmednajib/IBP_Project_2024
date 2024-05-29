@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                                    <table class="table m-0" style="text-align: center" style = "color: black">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Picture</th>
                                            <th>first Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Type</th>
                                            <th>Birth Date</th>
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
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{url('admin/new-user')}}" class="btn btn-sm btn-info float-left">New User</a>
                                <a href="{{url('admin/show-users')}}" class="btn btn-sm btn-secondary float-right">View All
                                    Users</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- TABLE: Products -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Products</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Cover</th>
                                            <th>Title</th>
                                            <th>company</th>
                                            <th>Publication Date</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td style="text-align: center"><img src="{{$product->cover_image}}" alt="User Image" style="width: 2.8rem; border-radius: 10%;"></td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->company}}</td>
                                            <td>{{\Carbon\Carbon::parse($product->publication_date)->format('d M Y')}}</td>
                                            <td>{{'$ '.$product->price}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{url('admin/new-product')}}" class="btn btn-sm btn-info float-left">New Product</a>
                                <a href="{{url('admin/show-products')}}" class="btn btn-sm btn-secondary float-right">View All
                                    Products</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
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
