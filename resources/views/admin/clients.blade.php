@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Clients</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Clients</li>
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
										<th>Date Added</th>
                                        <th>Action</th>
									</tr>
								</thead>
                                @if($clients->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="8">No Client.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($clients as $client)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
										<td>{{$client->first_name}} {{$client->last_name}}</td>
										<td>{{$client->email}}</td>
										<td>{{$client->created_at}}</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="btn-group">
                                                    <a href="{{route('admin.view.client', Crypt::encrypt($client->id))}}" class="waves-effect waves-light btn btn-success-light btn-flat">View/Edit</a>
                                                    <button type="button" class="waves-effect waves-light btn btn-info-light btn-flat">Message</button>
                                                    <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat" data-bs-toggle="modal" data-bs-target="#delete-case-{{$client->id}}">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal center-modal fade" id="delete-case-{{$client->id}}" tabindex="-1">
                                                        <form method="Get" action="{{ route('admin.delete.client', Crypt::encrypt($client->id)) }}" enctype="multipart/form-data">
                                                            @csrf 
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$client->first_name}} {{$client->last_name}}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this client?</p>
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