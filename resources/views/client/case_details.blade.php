@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Your Cases</h4>
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
										<th>Case Type</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Date Added</th>
                                        <th>Action</th>
									</tr>
								</thead>
                                @if($cases->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="8">No Case Posted.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($cases as $case)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
										<td>{{$case->case_id}}</td>
										<td>{{$case->type_of_case}}</td>
										<td>₦{{number_format($case->amount, 2)}}</td>
										<td>
                                            @if($case->status == 'Pending')
                                            	<span class="badge badge-danger-light">{{$case->status}}</span>
                                            @elseif($case->status == 'Assigned')
                                                <span class="badge badge-primary-light">{{$case->status}}</span>
                                            @else
                                                <span class="badge badge-success-light">{{$case->status}}</span>
                                            @endif
                                        </td>
										<td>{{$case->created_at}}</td>
                                        <td>
										@if($case->payment == false)
                                        <div class="clearfix">
											<form class="form" method="GET" action="{{ route('client.case.delete', Crypt::encrypt($case->id)) }}">
												@csrf
                                                <button type="submit" class="waves-effect waves-light btn btn-danger-light btn-flat mb-5">Delete</button>
                                            </form>
                                        </div>
										@else
										<div class="clearfix">
											@if($case->status !== 'Completed')
                                            <button type="button" id="viewCase" data-bs-toggle="modal" data-bs-target="#modal-right-{{$case->id}}" data-bs-id=""class="waves-effect waves-light btn btn-primary-light btn-flat mb-5">View</button>
                                            <!-- Modal -->
											<div class="modal modal-right fade" id="modal-right-{{$case->id}}" tabindex="-1">
												<div class="modal-dialog">
													<!-- <form id="companydata"> -->
														<div class="modal-content">
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
																		<input type="text" class="form-control" placeholder="{{$case->amount}}" readonly>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="form-label">Description</label>
																<textarea rows="4" class="form-control" placeholder="Description" readonly>{{$case->description}}</textarea>
															</div>
														</div>
														<div class="modal-footer modal-footer-uniform">
															<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
														</div>
														</div>
													<!-- </form> -->
												</div>
											</div>
											<!-- /.modal -->
											@endif
											@if($case->status == 'Pending')
                                                <a href="{{ route('client.case.request', Crypt::encrypt($case->id)) }}" class="waves-effect waves-light btn btn-info-light btn-flat mb-5">Request</a>
											@elseif($case->status == 'Assigned')
                                                <a href="{{ route('client.case.lawyer.view', Crypt::encrypt($case->lawyer_id)) }}" class="waves-effect waves-light btn btn-secondary-light btn-flat mb-5">View Lawyer</a>
											@endif
											<button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat mb-5">Pay</button>
                                        </div>
										@endif
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
	</section>
	<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper --> 
@endsection