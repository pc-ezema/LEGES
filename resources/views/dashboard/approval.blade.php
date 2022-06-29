@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Account Waiting for Approval</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
		<!-- Main content -->
		<section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fs-16">Waiting for Approval</div>

                        <div class="card-body fs-16">
                            Your account is waiting for our administrator approval.
                            <br />
                            Please check back later.
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- /.content -->
	</div>
</div>
@endsection