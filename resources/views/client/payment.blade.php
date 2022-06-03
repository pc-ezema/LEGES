
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Confirm Case</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Page</li>
								<li class="breadcrumb-item active" aria-current="page">Case Confirmation</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	

		<!-- Main content -->
        <section class="content">
            <div class="row">		
                <div class="col-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <h4 class="box-title text-info mb-0">Please Kindly go through your information before proceeding to payment</h4>
                            <hr class="my-15">
							<form class="form" method="GET" action="{{ route('client.case.payment', Crypt::encrypt($user_case->id)) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Type of Case</label>
                                        <input type="email" class="form-control" value="{{$user_case->type_of_case}}" readonly>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <select class="form-control" name="amount" readonly>
                                            <option value="{{$user_case->amount}}">₦{{ number_format($user_case->amount, 2) }}</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea rows="4" class="form-control" placeholder="Description" readonly>{{($user_case->description)}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Proceed To Payment
                                </button>

                                <a href="{{ route('client.case.details') }}"" type="submit" form="caseDetails" class="waves-effect waves-light btn btn-danger btn-flat">Cancel</a>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->			
                </div>
            </div>
        </section>
        <!-- /.content -->
	</div>
</div>
<!-- /.content-wrapper -->
@endsection