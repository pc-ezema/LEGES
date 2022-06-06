<header class="main-header">
    <div class="d-flex align-items-center logo-box justify-content-start">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- logo-->
            <!-- <div class="logo-mini w-50">
                <span class="light-logo"><img src="{{URL::asset('images/favicon.png')}}" alt="logo"></span>
            </div> -->
            <div class="logo-lg">
                <span class="light-logo"><img src="{{URL::asset('images/logo.png')}}" alt="logo" width="110px"></span>
            </div>
        </a>
    </div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="app-menu">
            <ul class="header-megamenu nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
                        <i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <li class="btn-group nav-item d-lg-inline-flex d-none">
                    <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-primary-light" title="Full Screen">
                        <i class="icon-Position"></i>
                    </a>
                </li>
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="waves-effect waves-light dropdown-toggle btn-primary-light" data-bs-toggle="dropdown" title="Notifications">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu animated bounceIn">
                        <li class="header">
                            <div class="p-20">
                                <div class="flexbox">
                                    <div>
                                        <h4 class="mb-0 mt-0">Notifications</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu sm-scrol">
                                @if($notifications->isEmpty()) 
                                <li>
                                    <a>
                                        <i class="fa fa-users text-info"></i>No Notification
                                    </a>
                                </li>
                                @else
                                <li>
                                    @foreach($notifications as $notification)
                                    <a href="#" style="background: #f2f2f2">
                                        <i class="fa fa-users text-info"></i>{{$notification->subject}}
                                    </a>
                                    @endforeach
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="footer">
                            @if(Auth::user()->account_type == 'Client')
                            <a href="{{route('client.notifications')}}">View all</a>
                            @elseif(Auth::user()->account_type == 'Lawyer')
                            <a href="{{route('lawyer.notifications')}}">View all</a>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>