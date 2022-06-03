@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="container-full">
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