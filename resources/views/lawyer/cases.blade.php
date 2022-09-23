
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
										<th>S/N</th>
										<th>Cases ID</th>
										<th>Client Name</th>
										<th>Case Type</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date Added</th>
									</tr>
								</thead>
								@if($cases->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="7">No Case Posted.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
								@foreach($cases as $case)
									<tr class="hover-primary" data-bs-toggle="modal" data-bs-target="#modal-right-{{$case->id}}">
										<td>{{$loop->iteration}}</td>
										<td>{{$case->case_id}}</td>
										<td>{{$case->first_name}} {{$case->last_name}}</td>
										<td>{{$case->type_of_case}}</td>
										<td>₦{{number_format($case->amount_payout, 2)}}</td>
										<td>
                                            @if($case->status == 'Pending')
                                            <span class="badge badge-danger-light">{{$case->status}}</span>
                                            @elseif($case->status == 'Accepted')
                                                <span class="badge badge-primary-light">{{$case->status}}</span>
                                            @else
                                                <span class="badge badge-success-light">{{$case->status}}</span>
                                            @endif
                                        </td>
										<td>{{$case->created_at}}</td>
										<div class="clearfix">
											<div class="modal modal-right fade" id="modal-right-{{$case->id}}" tabindex="-1">
												<div class="modal-dialog">
													<div class="modal-content">
													<form class="form" method="POST" action="{{ route('lawyer.case.request', Crypt::encrypt($case->id)) }}">
													@csrf
														<div class="modal-header">
															<h5 class="modal-title">{{$case->case_id}}</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label class="form-label">Type of Case</label>
																	<input type="text" class="form-control" value="{{$case->type_of_case}}" readonly>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12">
																<div class="form-group">
																	<label class="form-label">Amount</label>
																	<input type="text" class="form-control" placeholder="{{$case->amount_payout}}" readonly>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="form-label">Description</label>
															<textarea rows="4" class="form-control" placeholder="Description" readonly>{{$case->description}}</textarea>
														</div>
														</div>
														<div class="modal-footer modal-footer-uniform">
															<button type="submit" class="btn btn-primary">Accept</button>
															<button type="button" class="btn btn-danger float-end" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
													</form>
												</div>
											</div>
											<!-- /.modal -->
										</div>
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
			<input type="text" class="form-control" id="first_name" name="first_name">
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