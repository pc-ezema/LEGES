@extends('layouts.admin_dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title">Messages</h4>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                                @if($user->account_type == "Client")
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.clients')}}">Clients</a></li>
                                @elseif($user->account_type == "Lawyer")
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.lawyers')}}">Lawyers</a></li>
                                @endif
                                <li class="breadcrumb-item active" aria-current="page">Send Message</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title text-info mb-0">Compose New Message</h4>
                        <hr class="my-15">
                        <form class="form" method="POST" action="{{ route('admin.users.send.message', Crypt::encrypt($user->id)) }}" role="form">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" placeholder="To:" name="to" value="{{$user->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:" name="subject">
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" style="height: 300px">Message:
                                </textarea>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    </div>
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection