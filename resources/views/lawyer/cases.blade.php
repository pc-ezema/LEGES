
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Cases</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Cases</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>	

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-body">
						<div class="table-responsive">
							<table class="table mt-0 table-hover no-wrap" data-page-size="10" id="example2">
								<thead>
									<tr>
										<th>Cases ID</th>
										<th>Client Name</th>
										<th>Case Type</th>
										<th>Time Limit</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date Added</th>
									</tr>
								</thead>
								<tbody>
									<tr class="hover-primary" data-bs-toggle="modal" data-bs-target="#modal-right">
										<td>#p245879</td>
										<td>Aaliyah clark</td>
										<td>Contract Drafting</td>
										<td>3 Days</td>
										<td>$200</td>
										<td><pan class="badge badge-success-light">Pending</span></td>
										<td>14 April 2021</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section>

	<!-- Modal -->
	<div class="modal modal-right fade" id="modal-right" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Modal title</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<p>Your content comes here</p>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary float-end">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>
  	<!-- /.modal -->
	<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper --> 
@endsection