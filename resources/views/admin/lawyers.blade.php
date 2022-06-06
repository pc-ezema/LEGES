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
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a></li>
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
										<th>Full Name</th>
										<th>Email</th>
                                        <th>Progress</th>
                                        <th>Status</th>
										<th>Date Added</th>
                                        <th>Action</th>
									</tr>
								</thead>
                                @if($lawyers->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="8">No Lawyer.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($lawyers as $lawyer)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
										<td>{{$lawyer->first_name}} {{$lawyer->last_name}}</td>
										<td>{{$lawyer->email}}</td>
                                        <td>
                                            <div class="d-flex flex-column w-p100">
                                                @if($lawyer->progress_value < 100)
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-fade text-center">
                                                        {{$lawyer->progress_value}}%
                                                    </span>
                                                </div>
                                                <div class="progress progress-xs w-p100">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$lawyer->progress_value}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @elseif($lawyer->progress_value >= 100)
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-fade text-center">
                                                        {{$lawyer->progress_value}}%
                                                    </span>
                                                </div>
                                                <div class="progress progress-xs w-p100">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$lawyer->progress_value}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($lawyer->status == 'Disapprove')
                                                <span class="badge badge-danger-light">{{$lawyer->status}}</span>
                                            @else
                                                <span class="badge badge-success-light">{{$lawyer->status}}</span>
                                            @endif
                                        </td>
										<td>{{$lawyer->created_at}}</td>
										<td>
                                            <div class="clearfix">
                                                <div class="btn-group">
                                                    @if($lawyer->status == 'Disapprove')
                                                    <form method="GET" action="{{ route('admin.users.approve', Crypt::encrypt($lawyer->id)) }}">
												       @csrf
                                                       <button type="submit" class="waves-effect waves-light btn btn-success-light btn-flat">Approve</button>
                                                    </form>
                                                    @else
                                                    <form method="GET" action="{{ route('admin.users.disapprove', Crypt::encrypt($lawyer->id)) }}">
												       @csrf
                                                       <button type="submit" class="waves-effect waves-light btn btn-danger-light btn-flat">Disapprove</button>
                                                    </form>    
                                                    @endif
                                                    <a href="{{route('admin.view.lawyer', Crypt::encrypt($lawyer->id))}}" class="waves-effect waves-light btn btn-success-light btn-flat">View/Edit</a>
                                                    <a href="{{route('admin.users.message', Crypt::encrypt($lawyer->id))}}" class="waves-effect waves-light btn btn-info-light btn-flat">Send Message</a>
                                                    <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat" data-bs-toggle="modal" data-bs-target="#delete-case-{{$lawyer->id}}">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal center-modal fade" id="delete-case-{{$lawyer->id}}" tabindex="-1">
                                                        <form method="Get" action="{{ route('admin.delete.lawyer', Crypt::encrypt($lawyer->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$lawyer->first_name}} {{$lawyer->last_name}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this lawyer?</p>
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
	<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper --> 
@endsection