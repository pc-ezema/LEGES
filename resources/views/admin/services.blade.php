@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Lawyers</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Lawyers</li>
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
										<th>Name</th>
										<th>Amount</th>
										<th>Date Added</th>
                                        <th>Action <button type="button" style="position: absolute; right: 5px; top: 5px;" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add-service"><i class="fa fa-plus" aria-hidden="true"></i> Add Service</button></th>
									</tr>
								</thead>
                                @if($services->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="8">No Service Added.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($services as $service)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
										<td>{{$service->name}}</td>
                                        <td>{{$service->amount}}</td>
										<td>{{$service->created_at}}</td>
										<td>
                                            <div class="clearfix">
                                                <div class="btn-group">
                                                    <button type="button" class="waves-effect waves-light btn btn-success-light btn-flat" data-bs-toggle="modal" data-bs-target="#view-service-{{$service->id}}">View</button>
                                                    <!-- Modal -->
                                                    <div class="modal modal-right fade" id="view-service-{{$service->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$service->name}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group text-center">
                                                                                <img src="{{$service->image}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Name</label>
                                                                                <input type="text" class="form-control" placeholder="Enter Service Name" value="{{$service->name}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Amount</label>
                                                                                <input type="text" class="form-control" placeholder="Enter Amount" value="₦{{number_format($service->amount, 2)}}" readonly>
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
                                                    <button type="button" class="waves-effect waves-light btn btn-info-light btn-flat" data-bs-toggle="modal" data-bs-target="#edit-service-{{$service->id}}">Edit</button>
                                                    <!-- Modal -->
                                                    <div class="modal modal-right fade" id="edit-service-{{$service->id}}" tabindex="-1">
                                                        <form method="Post" action="{{ route('admin.update.service', Crypt::encrypt($service->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">{{$service->name}}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group text-center">
                                                                                    <img src="{{$service->image}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
                                                                                    <input type="file" class="form-control mt-5" name="image">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Name</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Service Name" value="{{$service->name}}" name="name"required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Amount</label>
                                                                                    <input type="number" class="form-control" placeholder="Enter Amount" value="{{$service->amount}}" name="amount" required>
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
                                                    <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat" data-bs-toggle="modal" data-bs-target="#delete-service-{{$service->id}}">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal center-modal fade" id="delete-service-{{$service->id}}" tabindex="-1">
                                                        <form method="Get" action="{{ route('admin.delete.service', Crypt::encrypt($service->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$service->name}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this service?</p>
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

                    <!-- Modal -->
                    <div class="modal modal-right fade" id="add-service" tabindex="-1">
                       <form method="Post" action="{{ route('admin.add.service') }}" enctype="multipart/form-data">
							@csrf 
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Service</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Service Image</label>
                                                    <input type="file" class="form-control" name="image" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Service Name" name="name"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Amount</label>
                                                    <input type="number" class="form-control" placeholder="Enter Amount" name="amount" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer modal-footer-uniform">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary float-end">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal -->
				</div>
			</div>
		</div>			
	</section>
	<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper --> 
@endsection