
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
								<div class="card-header" style="background: #ED4B0C !important; color: #fff;">
									<h4 class="card-title">{{Auth::user()->notification}}</h4>
								</div>
                            @endif
						</div>
					</div>						
					<div class="col-xl-4 col-12">
						<div class="box overflow-h">
							<div class="box-body p-0 text-center">
								<div class="d-flex justify-content-around">
									<div class="bg-primary p-20 w-p100">									
										<div class="fw-400"><h1 class="mb-2">40</h1></div>
										<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
										<div class="text-white fw-600 mb-2 mt-5"><h2>Completed Cases</h2></div>
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
										<div class="fw-400"><h1 class="mb-2">23</h1></div>
										<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
										<div class="text-white fw-600 mb-2 mt-5"><h2>Pending Cases</h2></div>
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
										<div class="fw-400"><h1 class="mb-2">90</h1></div>
										<!-- <span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span> -->
										<div class="text-white fw-600 mb-2 mt-5"><h2>Performance Index</h2></div>
									</div>
								</div>
							</div>
						</div>					
					</div>
					<!-- <div class="col-xl-6 col-12">
						<div class="box">
							<div class="box-header no-border">
								<h3 class="box-title">Total Cases (850)</h3>
							</div>
							<div class="box-body py-0 px-0">
								<div class="chart" id="totalcases"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-12">
						<div class="box">
							<div class="box-header no-border">
								<h3 class="box-title">Completed Cases (745)</h3>
							</div>
							<div class="box-body py-0 px-0">
								<div class="chart" id="settledcases"></div>
							</div>
						</div>
					</div> -->
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
											<tr>										
												<td class="ps-0 py-1">
													<div class="d-flex align-items-center">
														<div class="flex-shrink-0 me-20">
															<div class="bg-img h-50 w-50" style="background-image: url(../images/avatar/1.jpg)"></div>
														</div>
														<div>
															<a href="#" class="text-dark hover-primary mb-1 fs-16">Johen Doe</a>
															<span class="text-fade d-block">johen@dummy.com</span>
														</div>
													</div>
												</td>
												<td>
													<span class="text-fade d-block">
														Case Type
													</span>
													<span class="fs-16">
														Contract Negotiation
													</span>
												</td>
												<td>
													<span class="text-fade d-block">
														Time limit
													</span>
													<span class="fs-16">
														3 days
													</span>
												</td>
												<td>
													<span class="text-fade d-block">
														Amount
													</span>
													<span class="fs-16">
														$200
													</span>
												</td>
												<td class="text-end">
													<a href="#" class="waves-effect waves-light btn btn-xs btn-primary btn-circle mx-5"><span class="icon-Edit"><span class="path1"></span><span class="path2"></span></span></a>
												</td>
											</tr>
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
					<div class="box box-inverse bg-img" style="background: #141A46;" data-overlay="2">
					<div class="flexbox px-20 pt-20">
						<div class="dropdown">
						<a data-bs-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
						</div>
						</div>
					</div>

					<div class="box-body text-center pb-50">
						<a href="#">
						<img class="avatar avatar-xxl avatar-bordered" src="../images/avatar/5.jpg" alt="">
						</a>
						<h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Roben Parkar</a></h4>
						<span><i class="fa fa-map-marker w-20"></i> Miami</span>
					</div>

					<ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						<span class="opacity-60">Followers</span><br>
						<span class="fs-20">8.6K</span>
						</li>
						<li>
						<span class="opacity-60">Following</span><br>
						<span class="fs-20">8457</span>
						</li>
						<li>
						<span class="opacity-60">Tweets</span><br>
						<span class="fs-20">2154</span>
						</li>
					</ul>
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