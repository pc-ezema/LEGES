@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Notifications</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Page</li>
                                <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">All Notifications</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <a href="javascript:window.top.location.reload(true)" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
                            </div>
                            <div class="mailbox-messages inbox-bx">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            @foreach($allnotifications as $notification)
                                                @if($notification->status == 'Unread')
                                                <tr style="background: #f2f2f2;">
                                                    <td><input type="checkbox"></td>
                                                    <td>
                                                        <p class="mailbox-name mb-0 fs-16 fw-600">{{$notification->from}}</p>
                                                        <a class="mailbox-subject" href="{{route('lawyer.read.notification', Crypt::encrypt($notification->id))}}"><b>{{$notification->subject}}</b> - {{$notification->message}}</a>
                                                    </td>
                                                    <td class="mailbox-date">{{$notification->updated_at->toTimeString()}}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td><input type="checkbox" checked></td>
                                                    <td>
                                                        <p class="mailbox-name mb-0 fs-16 fw-600">{{$notification->from}}</p>
                                                        <a class="mailbox-subject" href="#"><b>{{$notification->subject}}</b> - {{$notification->message}}</a>
                                                    </td>
                                                    <td class="mailbox-date">{{$notification->updated_at->toTimeString()}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection