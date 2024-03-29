
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Transactions</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
										<th>Cases ID</th>
										<th>Amount</th>
										<th>Transaction ID</th>
										<th>Ref ID</th>
										<th>Paid At</th>
                                        <th>Channel</th>
										<th>Status</th>
									</tr>
								</thead>
                                @if($transactions->isEmpty())
                                <tbody>
                                    <tr>
                                        <td class="align-enter text-dark font-13" colspan="8">No Transaction.</td>
                                    </tr>
                                </tbody>
                                @else
								<tbody>
                                @foreach($transactions as $transaction)
									<tr class="hover-primary">
										<td>{{ $loop->index + 1 }}</td>
										<td>{{$transaction->case_id}}</td>
										<td>₦{{number_format($transaction->amount, 2)}}</td>
										<td>{{$transaction->transaction_id}}</td>
										<td>{{$transaction->ref_id}}</td>
                                        <td>{{$transaction->paid_at}}</td>
										<td>{{$transaction->channel}}</td>
										<td>
                                            <span class="badge badge-success-light">{{$transaction->status}}</span>
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