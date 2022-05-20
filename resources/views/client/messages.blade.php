
@extends('layouts.dashboard_frontend')

@section('page-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Message</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Page</li>
                            <li class="breadcrumb-item active" aria-current="page">Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>	  

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs customtab nav-justified" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#messages" role="tab">Chat </a> </li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="messages" role="tabpanel">
                                <div class="chat-box-one-side3">
                                    <div class="media-list media-list-hover">
                                        @if($users->isEmpty())
                                            <div class="media"><div class="media-body">
                                                <p>
                                                    No Lawyer assigned
                                                </p>
                                            </div>
                                        @else
                                            @foreach($users as $user)
                                                <div class="media" style="cursor: pointer;">
                                                    <a class="align-self-center me-0" href="{{ route('client.get.messages', Crypt::encrypt($user->id)) }}">
                                                        @if($user->avatar)
                                                        <img class="avatar avatar-lg" src="/storage/avatars/{{$user->avatar}}" alt="..."/>
                                                        @else
                                                        <img class="avatar avatar-lg" src="{{URL::asset('images/avatar.jpg')}}" alt="..."/>
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                    <p>
                                                        <a class="hover-primary" href="{{ route('client.get.messages', Crypt::encrypt($user->id)) }}"><strong>{{$user->first_name}} {{$user->last_name}}</strong></a>
                                                        <span class="float-end fs-10">{{$user->created_at->format('H:i:s')}}</span>
                                                    </p>
                                                    <p>{{$user->area_practice}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal modal-right fade" id="modal-right" tabindex="-1">
                <div class="modal-dialog"> -->
					<!-- <div class="modal-content">
                        <div class="row"> -->
                            <div class="col-lg-8 col-12 d-{{$display}}">
                                <div class="box">
                                    <div class="box-header">
                                    <div class="media align-items-top p-0">
                                        <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                                            <div class="media-body mb-lg-0 mb-20">
                                                <p class="fs-16">
                                                    <a class="hover-primary" href="#"><strong>Chat With Lawyers</strong></a>
                                                </p>
                                            </div>
                                        </div>				  
                                    </div>             
                                    </div>
                                    <div class="box-body">
                                        <div class="chat-box-one2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div>
                    </div> -->
                <!-- </div>
            </div> -->
            <div class="col-lg-8 col-12 d-{{$chat}}">
                <div class="box">
                    @if($messages->isEmpty())
                        <div class="box-header">
                        <div class="media align-items-top p-0">
                            <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                                <div class="media-body mb-lg-0 mb-20">
                                    <p class="fs-16">
                                        <a class="hover-primary" href="#"><strong>Chat</strong></a>
                                    </p>
                                </div>
                            </div>				  
                        </div>             
                        </div>
                        <div class="box-body">
                            <div class="chat-box-one2">
                            </div>
                        </div>
                    @else
                        <div class="box-header">
                            <div class="media align-items-top p-0">
                                <div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
                                    <div class="media-body mb-lg-0 mb-20">
                                        <p class="fs-16">
                                            <a class="hover-primary" href="#"><strong>Chat</strong></a>
                                        </p>
                                    </div>
                                </div>				  
                            </div>             
                        </div>
                        <div class="box-body">
                            <div class="chat-box-one2">
                                <div class="card d-inline-block mb-3 float-start me-2 no-shadow bg-lighter max-w-p80">
                                @foreach($messages as $message)
                                <div class="card-body">
                                    <div class="d-flex flex-row pb-2">
                                        <a class="d-flex" href="#">
                                            <img alt="Profile" src="{{URL::asset('images/avatar.jpg')}}" class="avatar me-10">
                                        </a>
                                        <div class="d-flex flex-grow-1 min-width-zero">
                                            <div class="m-2 ps-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                                                <div class="min-width-zero">
                                                    <p class="mb-0 fs-16 text-dark">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-text-start ps-55">
                                        <p class="mb-0 text-semi-muted">{{$message->body}}</p>
                                    </div>
                                </div>
                                @endforeach
                                </div>							  
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="box-footer no-border">
                            <div class="d-md-flex d-block justify-content-between align-items-center bg-white p-5 rounded10 b-1 overflow-hidden">
                                <input class="form-control b-0 py-10" type="text" placeholder="Say something...">
                                <div class="d-flex justify-content-between align-items-center mt-md-0 mt-30">
                                    <button type="button" class="waves-effect waves-circle btn btn-circle me-10 btn-outline-secondary">
                                    <span class="publisher-btn file-group">
                                        <i class="fa fa-paperclip file-browser"></i>
                                        <input type="file">
                                    </span>
                                    </button>
                                    <button type="button" class="waves-effect waves-circle btn btn-circle btn-primary">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper --> 

<script>
    function showChat() 
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ route("client.get.messages", "i") }}',
            type: 'POST',
            data: {
                token: token
            },
            dataType: 'JSON',
            success: function (response) {
                console.log('Token saved successfully.');
            },
            error: function (err) {
                console.log('User Chat Token Error'+ err);
            },
        });
     }  
</script>
@endsection