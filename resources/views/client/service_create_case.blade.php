
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Profile</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Page</li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                            <h4 class="box-title text-info mb-0">Kindly complete</h4>
                            <hr class="my-15">
							<form class="form" method="POST" action="{{ route('client.pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
										<input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
										<input type="hidden" name="orderID" value="{{Auth::user()->id}}">
										<input type="hidden" name="quantity" value="1">
										<input type="hidden" name="currency" value="NGN">
										<input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
										<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
										
										{{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

										<input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->first_name}}" name="first_name" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control"  value="{{Auth::user()->last_name}}" name="last_name" readonly>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Type of Case</label>
                                        <input type="email" class="form-control" value="Advisory Service" name="type_of_case" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Time Limit</label>
                                        <input type="tel" class="form-control" pleaseholder="Enter Time Limit" name="time_limit">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount">
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea rows="4" class="form-control" placeholder="Description" name="description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Proceed To Payment
                                </button>
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