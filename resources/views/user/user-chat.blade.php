@extends('user.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Messages</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
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
                    <div class="col-md-8 col-lg-12">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Chat</h3>
                            </div>
                            <div class="card-body">
                                <div class="direct-chat-messages">

                                    @foreach($allMessages as $message)
                                        @if($message->from === $user->id)
                                            <div class="direct-chat-msg mw-75" style="margin-right: 25%">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-right">{{$user->first_name.' '.$user->last_name}}</span>
                                                    <span class="direct-chat-timestamp float-left">{{\Carbon\Carbon::parse($message->created_at)->format('D, d M H:i')}}</span>
                                                </div>
                                                <img class="direct-chat-img" src="{{$user->image}}" alt="message user image">
                                                <div class="direct-chat-text">{{$message->message}}</div>
                                            </div>
                                        @else
                                            <div class="direct-chat-msg mw-75 right" style="margin-left: min(25%);">
                                                <div class="direct-chat-infos clearfix">
                                                    <span class="direct-chat-name float-left">{{$data->first_name.' '.$data->last_name}}</span>
                                                    <span class="direct-chat-timestamp float-right">{{\Carbon\Carbon::parse($message->created_at)->format('D, d M H:i')}}</span>
                                                </div>
                                                <img class="direct-chat-img" src="{{$data->image}}" alt="message user image">
                                                <div class="direct-chat-text">{{$message->message}}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <form action="{{url('user/send-msg/'.$user->id)}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
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
