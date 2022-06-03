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
										<th>Full Name</th>
										<th>Email</th>
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
                                                    <button type="button" class="waves-effect waves-light btn btn-success-light btn-flat">View</button>
                                                    <button type="button" class="waves-effect waves-light btn btn-info-light btn-flat">Message</button>
                                                    <button type="button" class="waves-effect waves-light btn btn-danger-light btn-flat">Delete</button>
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