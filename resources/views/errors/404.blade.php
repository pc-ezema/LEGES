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
                        <div class="rounded10 p-50">
                            <img src="{{URL::asset('images/auth-bg/404.jpg')}}" class="max-w-200" alt="" />
                            <h1>Page Not Found !</h1>
                            <h3>looks like, page doesn't exist</h3>
                            <div class="my-30"><a href="/" class="btn btn-danger">Back to dashboard</a></div>				  

                            <form class="search-form mx-auto mt-30 w-p75">
                            <div class="input-group rounded5 overflow-h">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>
                            </div>
                            <!-- /.input-group -->
                            </form>
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