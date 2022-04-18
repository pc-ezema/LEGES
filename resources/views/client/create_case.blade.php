
@extends('layouts.dashboard_frontend')

@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">								
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Total Cases (850)</h3>
						</div>
						<div class="box-body py-0 px-0">
							<div class="chart" id="totalcases"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h3 class="box-title">Completed Cases (745)</h3>
						</div>
						<div class="box-body py-0 px-0">
							<div class="chart" id="settledcases"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-12">
					<div class="box overflow-h">
						<div class="box-body p-0 text-center">
							<div class="d-flex justify-content-around">
								<div class="bg-primary p-20 w-p100">									
									<div class="fw-400"><h1 class="mb-2">Won</h1></div>
									<span class="text-white fs-60 icon-Like"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white fw-600 mb-2 mt-5"><h2>170</h2></div>
									<div class="text-white-50"><h4 class="mb-0">56.7%</h4></div>
								</div>
								<div class="bg-danger p-20 w-p100">									
									<div class="fw-400"><h1 class="mb-2">Lost</h1></div>
									<span class="text-white fs-60 icon-Dislike rotate-180"><span class="path1"></span><span class="path2"></span></span>
									<div class="text-white fw-600 mb-2 mt-5"><h2>79</h2></div>
									<div class="text-white-50"><h4 class="mb-0">26.3%</h4></div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-xl-12 col-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Opportunity Outcome</h3>
						</div>
						<div class="box-body py-xl-0">
							<div class="chart" id="opportunityoutcome"></div>
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
@endsection