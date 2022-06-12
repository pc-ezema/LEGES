
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Services</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Please select what service you would like us to provide for you?</h4>
                    </div>
                </div>
            </div>	

        <!--card deck!-->
        <div class="col-12 mb-20">
            <div class="row row-cols-1 row-cols-lg-3 g-4">
                @if($service->isEmpty())
                <!-- <div class="col-lg-6 p-50">
                    <a href="#">
                        <div class="card">
                            <img class="card-img-top" src="{{URL::asset('images/gallery/thumb/5.jpg')}}" alt="card image cap">
                            <div class="card-body">
                                <h4 class="card-title b-0 px-0 text-center">Contract Negotiation</h4>
                            </div>
                        </div>
                    </a>
                </div> -->
                @else
                    @foreach($services as $service)
                    <div class="col-lg-6 p-50">
                        <a href="{{ route('client.services.create.case', Crypt::encrypt($service->id)) }}">
                            <div class="card">
                                <img class="card-img-top" src="{{$service->image}}" alt="{{$service->name}}">
                                <div class="card-body">
                                    <h4 class="card-title b-0 px-0 text-center">{{$service->name}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    </div>
</div>
<!-- /.content-wrapper --> 
@endsection