
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Profile</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>	  

    <!-- Main content -->
    @if(Auth::user()->account_type == 'Client')
    <section class="content">
        <div class="row">			  
            <div class="col-lg-6 col-12">
                <div class="box">
                <!-- /.box-header -->
                <form class="form">
                    <div class="box-body">
                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                        <hr class="my-15">
                        <div class="user-profile bb-1 px-20 py-10">
                            <div class="d-block text-center">
                                <div class="image">
                                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
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
                            <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" value="{{Auth::user()->gender}}" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->user_name}}" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone_number}}" readonly>
                            </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Profile Picture</h4>
                        <hr class="my-15">
                        <div class="form-group">
                            <label class="file">
                            <input type="file" class="form-control">
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> Upload Profile Picture
                        </button>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    </div>  
                </form>
                </div>
                <!-- /.box -->			
            </div>  

            <div class="col-lg-6 col-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About User</h4>
                        <hr class="my-15">
                        <form class="form">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->first_name}}" name="first_name">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->last_name}}" name="last_name">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" value="{{Auth::user()->phone_number}}" name="phone_number">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->user_name}}" name="user_name">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select">
                                    <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                    <option>-- Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bio</label>
                            <textarea rows="4" class="form-control" placeholder="Bio"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> Update Profile
                        </button>
                        </form>
                        <br>
                        <h4 class="box-title text-info mb-0 mt-50"><i class="ti-envelope me-15"></i>Password</h4>
                        <hr class="my-15">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Enter New Password</label>
                                <input class="form-control" type="password" value="{{Auth::user()->password}}" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Update Password
                            </button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </form>
                </div>
                <!-- /.box -->			
            </div>
        </div>
    </section>
    @elseif(Auth::user()->account_type == 'Lawyer')
    <section class="content">
        <!-- tabs -->
        <div class="col-12">
            <div class="box">
            <div class="progress">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{Auth::user()->progress_value}}" aria-valuemin="0" aria-valuemax="100" style="width: {{Auth::user()->progress_value}}%">
                </div>
            </div>  
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active nav-bg" data-bs-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    <li class="nav-item"> <a class="nav-link nav-bg" data-bs-toggle="tab" href="#personalData" role="tab">Personal Data</a> </li>
                    <li class="nav-item"> <a class="nav-link nav-bg" data-bs-toggle="tab" href="#documents" role="tab">Documents</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="p-15">
                            <div class="row">			  
                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                    <!-- /.box-header -->
                                    <form class="form">
                                        <div class="box-body">
                                            <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info</h4>
                                            <hr class="my-15">
                                            <div class="user-profile bb-1 px-20 py-10">
                                                <div class="d-block text-center">
                                                    <div class="image">
                                                        <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
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
                                                <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->gender}}" readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->user_name}}" readonly>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->phone_number}}" readonly>
                                                </div>
                                                </div>
                                            </div>
                                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Profile Picture</h4>
                                            <hr class="my-15">
                                            <div class="form-group">
                                                <label class="file">
                                                <input type="file" class="form-control">
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti-save-alt"></i> Upload Profile Picture
                                            </button>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                        </div>  
                                    </form>
                                    </div>
                                    <!-- /.box -->			
                                </div>  

                                <div class="col-lg-6 col-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <h4 class="box-title text-info mb-0"><i class="ti-envelope me-15"></i>Password</h4>
                                            <hr class="my-15">
                                            <form>
                                                <div class="form-group">
                                                    <label class="form-label">Enter New Password</label>
                                                    <input class="form-control" type="password" value="{{Auth::user()->password}}" name="password">
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ti-save-alt"></i> Update Password
                                                </button>
                                            </form>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->			
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="personalData" role="tabpanel">
                        <div class="p-15">
                            <div class="col-12">
                                <!-- Basic Forms -->
                                <div class="box">
                                    <div class="box-header with-border">
                                    <h4 class="box-title">Personal Data</h4>
                                    </div>
                                    <!-- /.box-header -->
                                    <form>
                                        <div class="box-body">
                                            <h4 class="box-title mb-0">About</h4>
                                            <hr class="my-15">
                                            <form class="form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->first_name}}" name="first_name">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control"  value="{{Auth::user()->last_name}}" name="last_name">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail</label>
                                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="tel" class="form-control" value="{{Auth::user()->phone_number}}" name="phone_number">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control" value="{{Auth::user()->user_name}}" name="user_name">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-select">
                                                        <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                                        <option>-- Gender --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Bio</label>
                                                <textarea rows="4" class="form-control" placeholder="Bio"></textarea>
                                            </div>

                                            <hr>

                                            <h4 class="mt-0 mb-20">Others</h4>
                                            <div class="form-group">
                                                <label class="form-label">When were you called to bar?</label>
                                                <input type="text" class="form-control" name="bar" value="{{Auth::user()->bar}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">What is your location of practice?</label>
                                                <input type="text" class="form-control" name="location_practice" value="{{Auth::user()->location_practice}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Area of practice</label>
                                                <input type="text" class="form-control" name="area_practice" value="{{Auth::user()->area_practice}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Documents to submit</label>
                                                <input type="text" class="form-control" name="documents" value="{{Auth::user()->documents}}">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary pull-left">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->			
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="documents" role="tabpanel">
                        <div class="p-15">
                            <!-- Main content -->
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-header">					
                                        <h4 class="box-title">Dropzone</h4>
                                        <h6 class="box-subtitle">The following documents should be submit for evaluation:</h6>
                                        <h6 class="box-subtitle">- A copy of the qualifying certificate from the council of legal education.</h6>
                                        <h6 class="box-subtitle">- A copy of the call to bar certificate.</h6>
                                        <h6 class="box-subtitle">- A copy of the receipt of payment of practice fee for the year.</h6>
                                        <h6 class="box-subtitle">- A copy of curriculum vitae</h6>
                                    </div>
                                    <div class="box-body">
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                            <!-- /.box-body -->
                                            
                                        </form>
                                        <p class="text-danger">Note: Documents must be rename according to the requirement listed above.</p>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary pull-left">Save</button>
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
    @endif
    <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper --> 
@endsection