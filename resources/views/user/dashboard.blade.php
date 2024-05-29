@extends('user.layout.layout')
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
                    @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-4 gap-3 d-flex align-items-center justify-content-center">
                        <div class="card h-70 rounded-top" style="width: 300px;">
                            <img src="{{$product->cover_image}}" class="card-img-top rounded-top h-100" alt="..." style="width: 300px;max-height: 250px;" >
                            <div class="card-body " style="width: 300px;max-height: 250px;">
                                <h5 class="card-title"><b>{{$product->title}}</b></h5>
                                <p class="card-text">{{Str::words($product->description, 10) }}</p>
                                <a href="{{url('user/product-desc/'.$product->id)}}" class="btn btn-primary "  >More Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
