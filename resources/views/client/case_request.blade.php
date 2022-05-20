
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">{{$case->case_id}}</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Case Request</li>
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
                                        <th>Case ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
                                @if($caseRequests->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="5">No Request.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($caseRequests as $caseRequest)
									<tr class="hover-primary">
										<td>{{$loop->iteration}}</td>
                                        <td>{{$case->case_id}}</td>
										<td>{{$caseRequest->first_name}} {{$caseRequest->last_name}}</td>
										<td>{{$caseRequest->email}}</td>
                                        <td>
                                        <div class="clearfix">
                                            <button type="button" class="waves-effect waves-light btn btn-success-light btn-flat mb-5">View Lawyer</button>
                                            @if($caseRequest->status == 'Pending')
                                            <form class="form" method="post" action="{{ route('client.case.lawyer.accept', Crypt::encrypt($caseRequest->id)) }}">
												@csrf
                                                <button type="submit" class="waves-effect waves-light btn btn-danger-light btn-flat mb-5">Accept</button>
                                            </form>
                                            @else
                                            <button type="submit" class="waves-effect waves-light btn btn-primary-light btn-flat mb-5">Reject</button>
                                            @endif
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
    
    </div>
</div>
<!-- /.content-wrapper --> 
@endsection