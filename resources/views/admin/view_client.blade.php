@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">{{$client->first_name}} {{$client->last_name}}</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.clients')}}">Clients</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Lawyer Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="box">
                        <!-- /.box-header -->
                        
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                            <hr class="my-15">
                            <div class="user-profile bb-1 px-20 py-10">
                                <div class="d-block text-center">
                                    <div class="image">
                                        @if($client->avatar)
                                        <img src="/storage/users-avatar/{{$client->avatar}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                        @else
                                        <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                        @endif
                                    </div>
                                    <div class="info pt-15">
                                        <a class="px-20 fs-18 fw-500" href="#">{{$client->first_name}} {{$client->last_name}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" Value="{{$client->email}}" Readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" value="{{$client->gender}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">User Name</label>
                                        <input type="text" class="form-control" value="{{$client->user_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" value="{{$client->phone_number}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea rows="4" class="form-control" placeholder="Bio" name="bio" value="{{$client->bio}}" readonly>{{$client->bio}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        </div>
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-lg-6 col-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Change Password</h4>
                            <hr class="my-15">
                            <form class="form" method="POST" action="{{ route('admin.client.password', Crypt::encrypt($client->id)) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input class="form-control" type="password" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Comfirm New Password</label>
                                    <input class="form-control" type="password" name="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Update Password
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Profile Picture</h4>
                            <hr class="my-15">
                            <form class="form" method="POST" action="{{ route('admin.client.profile-picture', Crypt::encrypt($client->id)) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="file">
                                        <input type="file" class="form-control" name="avatar">
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Upload Profile Picture
                                </button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection