@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Page Not Found</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Page</li>
                                <li class="breadcrumb-item active" aria-current="page">404 Error</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
            </div>
        </div>	
        <section class="error-page h-p100">
            <div class="container h-p100">
                <div class="row h-p100 align-items-center justify-content-center text-center">
                    <div class="col-lg-7 col-md-10 col-12">
                        <div class="rounded30 p-50">
                            <img src="{{URL::asset('images/auth-bg/500.jpg')}}" class="max-w-200" alt="" />
                            <h1>Uh-Ah</h1>
                            <h3>Internal Server Error !</h3>
                            <div class="my-30"><a href="/" class="btn btn-info">Back to dashboard</a></div>
                            <h5 class="mb-15">-- OR --</h5>
                            <h4>Please try after some time</h4>			  			  
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