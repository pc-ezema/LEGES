<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jan 2022 06:11:20 GMT -->

<head>
    <title>{{ config('chatify.name') }}</title>

    {{-- Meta tags --}}
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="id" content="{{ $id }}">
    <meta name="type" content="{{ $type }}">
    <meta name="messenger-color" content="{{ $messengerColor }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}" type="image/x-icon">
    <meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
    <script src="{{ asset('js/chatify/autosize.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

    {{-- styles --}}
    <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />
    <link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skin_color.css')}}">
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <!-- Alerts  Start-->
    <div style="position: fixed; top: 20px; right: 20px; z-index: 100000; width: auto;">
        @include('layouts.alert')
    </div>
    <!-- Alerts End -->
    <div class="wrapper">
        {{-- Messenger Color Style--}}
        @include('Chatify::layouts.messengerColor')
        <!-- Dashboard Header -->
        @includeIf('layouts.dashboard_header')
        <!-- End Dashboard Header -->

        <!-- Dashboard Sidebar -->
        @includeIf('layouts.dashboard_sidebar')
        <!-- End Deashboard Sidebar -->

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
                        <div class="col-12">
                            <div class="box">
                                <!-- <div class="box-body"> -->
                                    <div class="messenger">
                                        {{-- ----------------------Users/Groups lists side---------------------- --}}
                                        <div class="messenger-listView">
                                            {{-- Header and search bar --}}
                                            <div class="m-header">
                                                <nav>
                                                    <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">Messages</span> </a>
                                                    {{-- header buttons --}}
                                                    <nav class="m-header-right">
                                                        <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                                        <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                                    </nav>
                                                </nav>
                                                {{-- Search input --}}
                                                <input type="text" class="messenger-search" placeholder="Search" />
                                                {{-- Tabs --}}
                                                <div class="messenger-listView-tabs">
                                                    <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                                                        @if(Auth::user()->account_type == 'Client')
                                                            <span class="far fa-user"></span> Lawyers
                                                        @elseif(Auth::user()->account_type == 'Lawyer')
                                                            <span class="far fa-user"></span> Clients
                                                        @endif
                                                    </a>
                                                    <!-- <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                                                        <span class="fas fa-users"></span> Groups</a> -->
                                                </div>
                                            </div>
                                            {{-- tabs and lists --}}
                                            <div class="m-body contacts-container">
                                            {{-- Lists [Users/Group] --}}
                                            {{-- ---------------- [ User Tab ] ---------------- --}}
                                            <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">

                                                {{-- Favorites --}}
                                                <div class="favorites-section">
                                                    <p class="messenger-title">Favorites</p>
                                                    <div class="messenger-favorites app-scroll-thin"></div>
                                                </div>

                                                {{-- Saved Messages --}}
                                                {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}

                                                {{-- Contact --}}
                                                <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

                                            </div>

                                            {{-- ---------------- [ Group Tab ] ---------------- --}}
                                            <!-- <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
                                                    {{-- items --}}
                                                    <p style="text-align: center;color:grey;margin-top:30px">
                                                        <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                                                    </p>
                                                </div> -->

                                                {{-- ---------------- [ Search Tab ] ---------------- --}}
                                            <div class="messenger-tab search-tab app-scroll" data-view="search">
                                                    {{-- items --}}
                                                    <p class="messenger-title">Search</p>
                                                    <div class="search-records">
                                                        <p class="message-hint center-el"><span>Type to search..</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- ----------------------Messaging side---------------------- --}}
                                        <div class="messenger-messagingView">
                                            {{-- header title [conversation name] amd buttons --}}
                                            <div class="m-header m-header-messaging">
                                                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                                    {{-- header back button, avatar and user name --}}
                                                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                                        <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                                        </div>
                                                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                                    </div>
                                                    {{-- header buttons --}}
                                                    <nav class="m-header-right">
                                                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                                        <!-- <a href="/home"><i class="fas fa-home"></i></a>
                                                        <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a> -->
                                                    </nav>
                                                </nav>
                                            </div>
                                            {{-- Internet connection --}}
                                            <div class="internet-connection">
                                                <span class="ic-connected">Connected</span>
                                                <span class="ic-connecting">Connecting...</span>
                                                <span class="ic-noInternet">No internet access</span>
                                            </div>
                                            {{-- Messaging area --}}
                                            <div class="m-body messages-container app-scroll">
                                                <div class="messages">
                                                    <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                                                </div>
                                                {{-- Typing indicator --}}
                                                <div class="typing-indicator">
                                                    <div class="message-card typing">
                                                        <p>
                                                            <span class="typing-dots">
                                                                <span class="dot dot-1"></span>
                                                                <span class="dot dot-2"></span>
                                                                <span class="dot dot-3"></span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- Send Message Form --}}
                                                @include('Chatify::layouts.sendForm')
                                            </div>
                                        </div>
                                        {{-- ---------------------- Info side ---------------------- --}}
                                        <!-- <div class="messenger-infoView app-scroll">
                                            {{-- nav actions --}}
                                            <nav>
                                                <a href="#"><i class="fas fa-times"></i></a>
                                            </nav>
                                            {!! view('Chatify::layouts.info')->render() !!}
                                        </div> -->
                                    </div>

                                    @include('Chatify::layouts.modals')
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
    @include('Chatify::layouts.footerLinks')
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="/faqs">FAQ</a>
                </li>
            </ul>
        </div>
        &copy; <script>
            document.write(new Date().getFullYear())
        </script> {{config('app.name')}}. All Rights Reserved.
    </footer>
    <script src="{{URL::asset('js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="https://use.fontawesome.com/633ef7b88d.js"></script>
    <script src="{{URL::asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>

    <script src="{{URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/dropzone/dropzone.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/PACE/pace.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/jquery.peity/jquery.peity.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/d3/d3.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/d3/d3_tooltip.js')}}"></script>

    <!-- Law Firm App -->
    <script src="{{URL::asset('js/template.js')}}"></script>
    <script src="{{URL::asset('js/pages/dashboard.js')}}"></script>
    <script src="{{URL::asset('js/pages/pace.js')}}"></script>
    <script src="{{URL::asset('js/pages/patients.js')}}"></script>
    <script src="{{URL::asset('js/pages/toastr.js')}}"></script>
    <script src="{{URL::asset('js/pages/notification.js')}}"></script>
    <script src="{{URL::asset('js/pages/data-table.js')}}"></script>
    <script src="{{URL::asset('js/pages/app-ticket.js')}}"></script>
    <script src="{{URL::asset('js/pages/chart-widgets.js')}}"></script>
    <script src="{{URL::asset('js/pages/chartjs-int.js')}}"></script>

</body>

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jan 2022 06:12:17 GMT -->

</html>