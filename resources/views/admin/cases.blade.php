
@extends('layouts.admin_dashboard_frontend')

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
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
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
							<table class="table mt-0 table-hover no-wrap" data-page-size="10" id="example">
								<thead>
									<tr>
										<th>S/N</th>
                                        <th>User ID</th>
										<th>Name</th>
										<th>Cases ID</th>
										<th>Case Type</th>
										<th>Amount</th>
                                        <th>Lawyer</th>
										<th>Status</th>
										<th>Date Added</th>
                                        <th>Action</th>
									</tr>
								</thead>
								@if($cases->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="10">No Case Posted.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
								@foreach($cases as $case)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
										<td>{{$case->user_id}}</td>
										<td>{{$case->first_name}} {{$case->last_name}}</td>
                                        <td>{{$case->case_id}}</td>
										<td>{{$case->type_of_case}}</td>
										<td>₦{{number_format($case->amount, 2)}}</td>
                                        <td>{{$case->lawyer_id}}</td>
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
                                            <div class="clearfix">
                                                <div class="btn-group">
                                                    <button type="button" class="waves-effect waves-light btn btn-success-light btn-flat" data-bs-toggle="modal" data-bs-target="#view-case-{{$case->id}}">View</button>
                                                    <!-- Modal -->
                                                    <div class="modal modal-right fade" id="view-case-{{$case->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$case->case_id}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Case ID</label>
                                                                                <input type="text" class="form-control" placeholder="Enter Case Name" value="{{$case->case_id}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Description</label>
                                                                                <textarea rows="4" class="form-control" placeholder="Description" value="{{$case->description}}" readonly>{{$case->description}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer modal-footer-uniform">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal -->
                                                    <button type="button" class="waves-effect waves-light btn btn-info-light btn-flat" data-bs-toggle="modal" data-bs-target="#edit-case-{{$case->id}}">Edit</button>
                                                    <!-- Modal -->
                                                    <div class="modal modal-right fade" id="edit-case-{{$case->id}}" tabindex="-1">
                                                        <form method="Post" action="{{ route('admin.update.case', Crypt::encrypt($case->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Case ID</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Case Name" value="{{$case->case_id}}" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Status</label>
                                                                                    <select name="status" class="form-control">
                                                                                        <option value="{{$case->status}}">{{$case->status}}</option>
                                                                                        <optgroup>
                                                                                            <option value="Pending">Pending</option>
                                                                                            <option value="Assigned">Assigned</option>
                                                                                            <option value="Completed">Completed</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Description</label>
                                                                                    <textarea rows="4" class="form-control" placeholder="Description" value="{{$case->description}}" name="description">{{$case->description}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer modal-footer-uniform">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary float-end">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal -->
                                                    <a href="{{route('admin.view.lawyer', Crypt::encrypt($case->lawyer_id))}}" class="waves-effect waves-light btn btn-secondary-light btn-flat">View Lawyer</a>
                                                    <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat" data-bs-toggle="modal" data-bs-target="#delete-case-{{$case->id}}">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal center-modal fade" id="delete-case-{{$case->id}}" tabindex="-1">
                                                        <form method="Get" action="{{ route('admin.delete.case', Crypt::encrypt($case->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$case->case_id}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this case?</p>
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
                                                </div>
                                            </div>
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