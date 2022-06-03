@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">{{$user->first_name}} {{$user->last_name}}</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Page</li>
                                <li class="breadcrumb-item active" aria-current="page">Lawyer</li>
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

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a class="active" href="#profile" data-bs-toggle="tab">Profile</a></li>
                            <li><a href="#documents" data-bs-toggle="tab">Documents</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="active tab-pane" id="profile">

                                <div class="box no-shadow">
                                    <div class="row">
                                        <div class="col-12 col-lg-5">
                                            <div class="box box-widget widget-user">
                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                <div class="widget-user-header bg-img bbsr-0 bber-0" style="background: url('/images/gallery/full/10.jpg') center center;" data-overlay="5">
                                                    <h3 class="widget-user-username text-white">{{$user->first_name}} {{$user->last_name}}</h3>
                                                    <h6 class="widget-user-desc text-white">{{$user->account_type}}</h6>
                                                </div>
                                                <div class="widget-user-image">
                                                    @if($user->avatar)
                                                    <img src="/storage/users-avatar/{{$user->avatar}}" class="rounded-circle" alt="{{$user->first_name}}">
                                                    @else
                                                    <img src="{{URL::asset('images/avatar.jpg')}}" class="rounded-circle" alt="User Avatar">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="box-body box-profile">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div>
                                                                <p>User Name :<span class="text-dark ps-10">{{$user->user_name}}</span> </p>
                                                                <p>Gender :<span class="text-dark ps-10">{{$user->gender}}</span></p>
                                                                <p>When were you called to bar? :<span class="text-dark ps-10">{{$user->bar}}</span></p>
                                                                <p>Location of Practice :<span class="text-dark ps-10">{{$user->location_practice}}</span></p>
                                                                <p>Bio :</p>
                                                                <p><span class="text-dark">{{$user->bio}}</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-7">
                                            <div class="box">
                                                <div class="box-body" style="background: #ed4b0c; color: #fff;">
                                                    <div class="flexbox">
                                                    <h5>Cases</h5>
                                                    </div>

                                                    <div class="text-center my-2">
                                                    <div class="fs-60 text-red">{{$lawyerCompletedCases->count()}}</div>
                                                    <h2 class="text-dark">Cases Won</h2>
                                                    </div>
                                                </div>

                                                <div class="box-body bg-lightest bar-0">
                                                    <span class="text-muted me-1">Completed Cases:</span>
                                                    <span class="text-dark">{{$lawyerCompletedCases->count()}}</span>
                                                </div>

                                                <div class="progress progress-sm mt-0 mb-0 btsr-0 bter-0">
                                                    <div class="progress-bar bg-danger btsr-0 bter-0" role="progressbar" style="width: {{$lawyerCompletedCases->count()}}%" aria-valuenow="{{$lawyerCompletedCases->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="documents">

                                <div class="box p-15"> 
                                    <div class="timeline timeline-single-column timeline-single-full-column">
                                        
                                        <span class="timeline-label">
                                            <span class="badge badge-info badge-pill">Images</span>
                                        </span>

                                        <div class="timeline-item">
                                            <div class="timeline-point timeline-point-success">
                                                <i class="fa fa-image"></i>
                                            </div>
                                            <div class="timeline-event">
                                                <div class="timeline-body">'
                                                    <!-- Default box -->
                                                    <div class="box">
                                                        <div class="box-header with-border">
                                                        <h4 class="box-title">Documents</h4>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="zoom-gallery m-t-30" class="row">
                                                                <div class="col-12 text-center">
                                                                @foreach(explode(',', $user->documents_attached) as $image)
                                                                    <a href="/storage/documents/{{$image}}" title="{{$user->first_name}} Documents">
                                                                        <img src="/storage/documents/{{$image}}" width="40%" alt="" class="mb-5"/>
                                                                    </a>
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection