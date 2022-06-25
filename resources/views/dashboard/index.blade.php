@extends('layouts.dashboard_frontend')

@section('page-content')
@if(Auth::user()->account_type == 'Lawyer')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						@if(Auth::user()->notification == null)
						@if(Auth::user()->progress_value >= 100)
						<div class="card-header" style="background: green !important; color: #fff;">
							<h4 class="card-title">Registration Completed</h4>
						</div>
						@else
						<div class="card-header" style="background: #ED4B0C !important; color: #fff;">
							<h4 class="card-title">Complete your registration <a href="{{ route('lawyer.profile', 'settings') }}" class="font-weight-bolder status-complete" style="text-decoration: underline !important; color: #141A46 !important">Click here!</a></h4>
						</div>
						@endif
						@else
						<div class="card-header" style="background: #ED4B0C !important; color: #fff; justify-content: start !important;">
							<i class="fa fa-bell"></i><h4 class="card-title">{{Auth::user()->notification}}</h4>
						</div>
						@endif
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box overflow-h">
						<div class="box-body p-0 text-center">
							<div class="d-flex justify-content-around">
								<div class="bg-primary p-20 w-p100">
									<div class="fw-400">
										<h1 class="mb-2">{{$lawyerCompletedCases->count()}}</h1>
									</div>
									<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
									<div class="text-white fw-600 mb-2 mt-5">
										<h2>Completed Cases</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box overflow-h">
						<div class="box-body p-0 text-center">
							<div class="d-flex justify-content-around">
								<div class="p-20 w-p100" style="background: #ED4B0C !important;">
									<div class="fw-400">
										<h1 class="mb-2">{{$lawyerPendingCases->count()}}</h1>
									</div>
									<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
									<div class="text-white fw-600 mb-2 mt-5">
										<h2>Pending Cases</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box overflow-h">
						<div class="box-body p-0 text-center">
							<div class="d-flex justify-content-around">
								<div class="bg-primary p-20 w-p100">
									<div class="fw-400">
										<h1 class="mb-2">{{$lawyerAssignedCases->count()}}</h1>
									</div>
									<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
									<div class="text-white fw-600 mb-2 mt-5">
										<h2>Assigned Cases</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Total Cases ({{$totalcases->count()}})</h3>
						</div>
						<div class="box-body py-0 px-0">
							<div class="chart" id="totalcases"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Completed Cases ({{$lawyerCompletedCases->count()}})</h3>
						</div>
						<div class="box-body py-0 px-0">
							<div class="chart" id="settledcases"></div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title align-items-start flex-column">
								Cases
							</h3>
						</div>
						<div class="box-body py-0">
							<div class="table-responsive">
								<table class="table mb-0 no-border">
									<tbody>
										@foreach($cases as $case)
										<tr>
											<td class="ps-0 py-1">
												<div class="d-flex align-items-center">
													<!-- <div class="flex-shrink-0 me-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/avatar/1.jpg)"></div>
													</div> -->
													<div>
														<a href="#" class="text-dark hover-primary mb-1 fs-16">{{$case->first_name}} {{$case->last_name}}</a>
														<span class="text-fade d-block">{{$case->case_id}}</span>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade d-block">
													Case Type
												</span>
												<span class="fs-16">
													{{$case->type_of_case}}
												</span>
											</td>
											<td>
												<span class="text-fade d-block">
													Time limit
												</span>
												<span class="fs-16">
												{{$case->time_limit}} days
												</span>
											</td>
											<td>
												<span class="text-fade d-block">
													Amount
												</span>
												<span class="fs-16">
												₦{{number_format($case->amount, 2)}}
												</span>
											</td>
										</tr>
										@endforeach
									</tbody>
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
@elseif(Auth::user()->account_type == 'Client')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						@if(Auth::user()->notification)
						<div class="card-header" style="background: #ED4B0C !important; color: #fff; justify-content: start !important;">
							<i class="fa fa-bell"></i><h4 class="card-title">{{Auth::user()->notification}}</h4>
						</div>
						@endif
					</div>
				</div>
				<div class="col-12">
					<div class="box">
						<div class="box-body d-flex p-0">
							<div class="flex-grow-1 bg-danger p-30 flex-grow-1 bg-img" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 100%; background-image: url(https://lawfirm-admin-template.multipurposethemes.com/images/svg-icon/color-svg/custom-3.svg)">

								<h4 class="fw-500">Get Affordable & <br>
									Quality Legal Services</h4>

								<p class="my-10 fs-12">
									At vero eos et accusamus et iusto odio <br> dignissimos ducimus qui blanditiis praesentium voluptatum
								</p>

								<a href="#" class="btn btn-danger-light">Learn More</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="box">
						<div class="row g-0 py-2">
							<div class="col-12 col-lg-6">
								<a href="{{ route('client.case.details') }}" class="ajax">
									<div class="box-body be-1 border-light">
										<div class="flexbox mb-1">
											<span>
												<span class="icon-Hummer fs-40"><span class="path1"></span><span class="path2"></span></span><br>
												Completed Cases
											</span>
											<span class="text-primary fs-40">{{$completedCases->count()}}</span>
										</div>
										<div class="progress progress-xxs mt-10 mb-0">
											<div class="progress-bar w-35" role="progressbar" style="width: 35%; height: 4px;" aria-valuenow="{{$completedCases->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</a>
							</div>


							<div class="col-12 col-lg-6 hidden-down">
								<a href="{{ route('client.case.details') }}" class="ajax">
									<div class="box-body be-1 border-light">
										<div class="flexbox mb-1">
											<span>
												<span class="icon-Attachment1 fs-40"><span class="path1"></span><span class="path2"></span></span><br>
												Pending Cases
											</span>
											<span class="text-info fs-40">{{$pendingCases->count()}}</span>
										</div>
										<div class="progress progress-xxs mt-10 mb-0">
											<div class="progress-bar bg-info" role="progressbar" style="width: 55%; height: 4px;" aria-valuenow="{{$pendingCases->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</a>
							</div>


							<div class="col-12 col-lg-6 d-none d-lg-block">
								<a href="{{ route('client.case.details') }}" class="ajax">
									<div class="box-body be-1 border-light">
										<div class="flexbox mb-1">
											<span>
												<span class="icon-Library fs-40"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><br>
												Assigned Cases
											</span>
											<span class="text-warning fs-40">{{$assignedCases->count()}}</span>
										</div>
										<div class="progress progress-xxs mt-10 mb-0">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="{{$assignedCases->count()}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</a>
							</div>


							<div class="col-12 col-lg-6 d-none d-lg-block">
								<a href="{{ route('client.transactions') }}" class="ajax">
									<div class="box-body">
										<div class="flexbox mb-1">
											<span>
												<span class="icon-Money fs-40"><span class="path1"></span><span class="path2"></span></span><br>
												Transactions
											</span>
											<span class="text-danger fs-40">₦{{number_format($transactions, 2)}}</span>
										</div>
										<div class="progress progress-xxs mt-10 mb-0">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col -->
				<!-- /.row -->
				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h5 class="box-title">Progress</h5>

							<div class="box-tools pull-right">
								<ul class="card-controls">
									<li><a href="#" class="link card-btn-reload" data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh"><i class="fa fa-circle-thin"></i></a></li>
								</ul>
							</div>
						</div>

						<div class="box-body">
							<div class="flexbox mt-20">
								<div class="bar" data-peity='{ "fill": ["#666EE8", "#28D094", "#FF9149"], "height": 130, "width": 90, "padding":0.2 }'>{{$completedCases->count()}},{{$assignedCases->count()}},{{$pendingCases->count()}}</div>
								<ul class="list-inline align-self-end text-muted text-end mb-0">
									<li>Completed Cases <span class="badge badge-ring badge-primary ms-2"></span></li>
									<li>Assigned Casses <span class="badge badge-ring badge-success ms-2"></span></li>
									<li>Pending Cases <span class="badge badge-ring badge-warning ms-2"></span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Top Lawyers</h3>
						</div>
						<div class="box-body">
							@foreach($users as $user)
							<div class="d-flex align-items-center mb-30">
								<div class="me-15">
									@if($user->avatar)
									<img src="/storage/users-avatar/{{$user->avatar}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
									@else
									<img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="">
									@endif
								</div>
								<div class="d-flex flex-column flex-grow-1 fw-500">
									<a href="#" class="text-dark hover-primary mb-1 fs-16">{{$user->first_name}} {{$user->last_name}}</a>
									<span class="text-fade">{{$user->area_practice}}</span>
								</div>
								<div class="d-flex align-items-center">
									<a href="#" class="waves-effect waves-light btn btn-xs btn-warning-light btn-circle mx-5"><i class="mdi mdi-phone"></i></a>
									<a href="#" class="waves-effect waves-light btn btn-xs btn-success-light btn-circle mx-5"><i class="mdi mdi-comment"></i></a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper -->
@endif
@endsection