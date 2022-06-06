@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Settings</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                    <li class="nav-item"> <a class="nav-link show nav-bg" data-bs-toggle="tab" href="#addadmins" role="tab">Add Admins</a></li>
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
                                                        @if(Auth::user()->avatar)
                                                        <img src="/storage/users-avatar/{{Auth::user()->avatar}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                                        @else
                                                        <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                                                        @endif
                                                    </div>
                                                    <div class="info pt-15">
                                                        <a class="px-20 fs-18 fw-500" href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" Value="{{Auth::user()->email}}" Readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->user_name}}" readonly>
                                                </div>
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
                                            <form class="form" method="POST" action="{{ route('admin.password', Crypt::encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
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
                                            <form class="form" method="POST" action="{{ route('admin.profile.picture', Crypt::encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
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
                    <div class="tab-pane show" id="addadmins" role="tabpanel">
                        <div class="p-15">
                            <div class="row">		
                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Add Admin</h4>
                                            <hr class="my-15">
                                            <form class="form" method="POST" action="{{ route('add.admin', Crypt::encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input class="form-control" type="text" name="first_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control" type="email" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">User Name</label>
                                                    <input class="form-control" type="text" name="user_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control" type="password" name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">New Password</label>
                                                    <input class="form-control" type="password" name="password_confirmation">
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-save-alt"></i> Add
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                        <div class="box-header with-border">						
                                            <h4 class="box-title">View Admins</h4>
                                        </div>
                                        <div class="box-body p-15">						
                                            <div class="table-responsive">
                                                <table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    @if($admins->isEmpty())
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-enter text-dark font-13" colspan="4">No Admin Added.</td>
                                                            </tr>
                                                        </tbody>
                                                        @else
                                                    <tbody>
                                                        @foreach($admins as $admin)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>
                                                                <a href="javascript:void(0)">{{$admin->first_name}} {{$admin->last_name}}</a>
                                                            </td>
                                                            <td>{{$admin->email}}</td>
                                                            <td>
                                                                
                                                                <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat" data-bs-toggle="modal" data-bs-target="#delete-admin-{{$admin->id}}" data-bs-original-title="Delete"><i class="ti-trash" aria-hidden="true"></i></button>
                                                                <!-- Modal -->
                                                                <div class="modal center-modal fade" id="delete-admin-{{$admin->id}}" tabindex="-1">
                                                                    <form method="Get" action="{{ route('delete.admin', Crypt::encrypt($admin->id)) }}" enctype="multipart/form-data">
                                                                        @csrf 
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">{{$admin->first_name}} {{$admin->last_name}}</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this admin?</p>
                                                                            </div>
                                                                            <div class="modal-footer modal-footer-uniform">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary float-end">Delete</button>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal -->
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>			
                                </div> 
                            </div>
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