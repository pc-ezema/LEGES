@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">{{$lawyer->first_name}} {{$lawyer->last_name}}</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.lawyers')}}">Lawyers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Lawyer Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>	  

    <section class="content">
        <!-- tabs -->
        <div class="col-12">
            <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show nav-bg" data-bs-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link show nav-bg" data-bs-toggle="tab" href="#viewdocuments" role="tab">View Documents</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active show" id="profile" role="tabpanel">
                        <div class="p-15">
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
                                                        @if($lawyer->avatar)
                                                        <img src="/storage/users-avatar/{{$lawyer->avatar}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                                        @else
                                                        <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                                        @endif
                                                    </div>
                                                    <div class="info pt-15">
                                                        <a class="px-20 fs-18 fw-500" href="#">{{$lawyer->first_name}} {{$lawyer->last_name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" Value="{{$lawyer->email}}" Readonly>
                                                </div>
                                                </div>
                                                <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" value="{{$lawyer->gender}}" readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control" value="{{$lawyer->user_name}}" readonly>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" value="{{$lawyer->phone_number}}" readonly>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Bio</label>
                                                    <textarea rows="4" class="form-control" placeholder="Bio" name="bio" value="{{$lawyer->bio}}" readonly>{{$lawyer->bio}}</textarea>
                                                </div>

                                                <hr>

                                                <h4 class="mt-0 mb-20">Others</h4>
                                                <div class="form-group">
                                                    <label class="form-label">When were you called to bar?</label>
                                                    <input type="text" class="form-control" name="bar" value="{{$lawyer->bar}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">What is your location of practice?</label>
                                                    <input type="text" class="form-control" name="location_practice" value="{{$lawyer->location_practice}}" readonly>
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
                                            <form class="form" method="POST" action="{{ route('admin.lawyer.password', Crypt::encrypt($lawyer->id)) }}" enctype="multipart/form-data">
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
                                            <form class="form" method="POST" action="{{ route('admin.lawyer.profile-picture', Crypt::encrypt($lawyer->id)) }}" enctype="multipart/form-data">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show" id="viewdocuments" role="tabpanel">
                        
                        <div class="p-15">
                            <!-- Main content -->
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Documents Uploaded</h4>
                                    </div>
                                    <div class="box-body">

                                    @if($lawyer->documents_attached)
                                        <div id="image-popups" class="row">
                                            @foreach(explode(',', $lawyer->documents_attached) as $image) 
                                            <div class="col-sm-2 mb-5">
                                                <a href="/storage/documents/{{$image}}" data-effect="mfp-zoom-in"><img src="/storage/documents/{{$image}}" class="img-fluid" alt="" />
                                                    <br/>{{$loop->iteration}}</a>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        </div>
        <!-- /.row -->
        <!-- END tabs -->

    </section>
    <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper --> 
@endsection