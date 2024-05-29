@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                    <table class="table m-0" style="text-align: center" >
                                        <thead>
                                        <tr>
                                            <th>product ID</th>
                                            <th>Cover</th>
                                            <th>Title</th>
                                            <th>Company</th>
                                            <th>Publication Date</th>
                                            <th>Price</th>
                                            <th colspan="2">Actions</th>
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
                                                <td>{{$product->price}}</td>
                                                <td><a href="{{url('admin/edit-product/'.$product->id)}}" class="btn btn-success">Edit</a></td>
                                                <td><a href="{{url('admin/delete-product/'.$product->id)}}" class="btn btn-danger">Delete</a></td>
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
