
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
						<div class="card-header" style="background: #ED4B0C !important; color: #fff;">
							<h4 class="card-title">Complete your registration <a href="{{route('lawyer.profile')}}" class="font-weight-bolder status-complete" style="text-decoration: underline !important; color: #141A46 !important">Click here!</a></h4>
						</div>
						</div>
					</div>						
					<div class="col-xl-4 col-12">
						<div class="box overflow-h">
							<div class="box-body p-0 text-center">
								<div class="d-flex justify-content-around">
									<div class="bg-primary p-20 w-p100">									
										<div class="fw-400"><h1 class="mb-2">40</h1></div>
										<span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span>
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
										<span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span>
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
										<span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span>
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
						<div class="card">
						<div class="card-header" style="background: #ED4B0C !important; color: #fff;">
							<h4 class="card-title">On progress</h4>
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