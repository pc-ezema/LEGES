@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="col-12">
                <div class="card">
                    @if(Auth::user()->notification)
                    <div class="card-header" style="background: #ED4B0C !important; color: #fff; justify-content: start !important;">
                        <i class="fa fa-bell"></i><h4 class="card-title">{{Auth::user()->notification}}</h4>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="box box-body bg-primary">
                        <div class="flexbox">
                            <span class="icon-User fs-50"><span class="path1"></span><span class="path2"></span></span>
                            <span class="fs-40 fw-200">{{$clients->count()}}</span>
                        </div>
                        @if($clients->count() <= 1)
                        <div class="text-end">Client</div>
                        @else
                        <div class="text-end">Clients</div>
                        @endif
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-lg-6 col-12">
                    <div class="box box-body bg-primary">
                        <div class="flexbox">
                            <span class="icon-User fs-50"><span class="path1"></span><span class="path2"></span></span>
                            <span class="fs-40 fw-200">{{$lawyers->count()}}</span>
                        </div>
                        @if($lawyers->count() <= 1)
                        <div class="text-end">Lawyer</div>
                        @else
                        <div class="text-end">Lawyers</div>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xl-4 col-12">
                    <div class="info-box">
                        <span class="info-box-icon rounded bg-danger"><span class="icon-Equalizer"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span></span>

                        <div class="info-box-content text-end">
                            <span class="info-box-number">{{$completedcases->count()}}</span>
                            @if($completedcases->count() <= 1)
                            <span class="info-box-text">Completed Case</span>
                            @else
                            <span class="info-box-text">Completed Cases</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-4 col-12">
                    <div class="info-box">
                        <span class="info-box-icon rounded bg-danger"><span class="icon-Hummer"><span class="path1"></span><span class="path2"></span></span></span>

                        <div class="info-box-content text-end">
                            <span class="info-box-number">{{$pendingcases->count()}}</span>
                            @if($pendingcases->count() <= 1)
                            <span class="info-box-text">Pending Case</span>
                            @else
                            <span class="info-box-text">Pending Cases</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-4 col-12">
                    <div class="info-box">
                        <span class="info-box-icon rounded-circle bg-danger"><span class="icon-Hummer"><span class="path1"></span><span class="path2"></span></span></span>

                        <div class="info-box-content text-end">
                            <span class="info-box-number">{{$assignedcases->count()}}</span>
                            @if($assignedcases->count() <= 1)
                            <span class="info-box-text">Assigned Case</span>
                            @else
                            <span class="info-box-text">Assigned Cases</span>
                            @endif
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="box bg-primary-light">
                        <div class="box-header with-border">
                            <h4 class="box-title text-primary">Clients Stats</h4>
                        </div>
                        <div class="box-body">
                            @foreach($recentclients as $recentclient)
                            <div class="d-flex align-items-center mb-30">
                                <div class="me-15">
                                    @if($recentclient->avatar)
                                    <img src="/storage/users-avatar/{{$recentclient->avatar}}" class="avatar avatar-lg rounded10" alt="User Image">
                                    @else
                                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-lg rounded10" alt="" />
                                    @endif
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="#" class="text-dark hover-primary mb-1 fs-16">{{$recentclient->first_name}} {{$recentclient->last_name}}</a>
                                    <span class="text-mute">{{$recentclient->email}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                Lawyers Stats
                            </h4>
                        </div>
                        <div class="box-body py-0">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <tbody>
                                        @foreach($recentlawyers as $recentlawyer)
                                        <tr>										
                                            <td>
                                                <div class="bg-lightest h-50 w-50 l-h-50 rounded text-center overflow-hidden">
                                                    @if($recentlawyer->avatar)
                                                    <img src="/storage/users-avatar/{{$recentlawyer->avatar}}" class="h-50 align-self-end" alt="User Image">
                                                    @else
                                                    <img src="{{URL::asset('images/avatar.jpg')}}" class="h-50 align-self-end" alt="" />
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark fw-600 hover-primary fs-16">{{$recentlawyer->first_name}} {{$recentlawyer->last_name}}</a>
                                                <span class="text-fade d-block">{{$recentlawyer->email}}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-p100">
                                                    @if($recentlawyer->progress_value < 100)
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-fade">
                                                            {{$recentlawyer->progress_value}}%
                                                        </span>
                                                        <span class="text-fade">
                                                            Progress
                                                        </span>
                                                    </div>
                                                    <div class="progress progress-xs w-p100">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$recentlawyer->progress_value}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    @elseif($recentlawyer->progress_value >= 100)
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-fade">
                                                            {{$recentlawyer->progress_value}}%
                                                        </span>
                                                        <span class="text-fade">
                                                            Progress
                                                        </span>
                                                    </div>
                                                    <div class="progress progress-xs w-p100">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$recentlawyer->progress_value}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-3 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Recent Notifications</h4>
                        </div>
                        <div class="box-body p-0">
                        <div class="media-list media-list-hover">
                            @foreach($notifications as $notification)
                            <a class="media media-single" href="#">
                            <h4 class="w-20 text-gray fw-400">{{$notification->created_at->format('H:i')}}</h4>
                            <div class="media-body ps-15 bs-5 rounded border-primary">
                                <p>{{$notification->subject}}</p>
                                <span class="text-fade">by {{$notification->from}}</span>
                            </div>
                            </a>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection