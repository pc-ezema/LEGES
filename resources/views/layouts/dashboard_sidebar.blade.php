<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="user-profile bb-1 px-20 py-10">
            <div class="d-block text-center">
                <div class="image">
                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
                </div>
                <div class="info pt-15">
                    <a class="px-20 fs-18 fw-500" href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </div>
            </div>
            <ul class="list-inline profile-setting mt-20 mb-0 d-flex justify-content-center gap-3">
                <li><a href="" data-bs-toggle="tooltip" title="Profile"><i class="icon-User fs-24"><span class="path1"></span><span class="path2"></span></i></a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" title="Logout"><i class="icon-Lock-overturning fs-24"><span class="path1"></span><span class="path2"></span></i></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </ul>
        </div>
        @if(Auth::user()->account_type == 'Client')
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="/home">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Cases</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('client.case.create') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create Cases</a></li>
                            <li><a href="{{ route('client.case.details') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Case Details</a></li>
                        </ul>
                    </li>	
                    <li>
                        <a href="#">
                            <i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="header">Settings</li>
                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></i>
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @elseif(Auth::user()->account_type == 'Lawyer')
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="/home">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Cases</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('client.case.create') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create Cases</a></li>
                            <li><a href="{{ route('client.case.details') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Case Details</a></li>
                        </ul>
                    </li>	
                    <li>
                        <a href="#">
                            <i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="header">Settings</li>
                    <li>
                        <a href="{{ route('lawyer.profile') }}">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></i>
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </section>
</aside>