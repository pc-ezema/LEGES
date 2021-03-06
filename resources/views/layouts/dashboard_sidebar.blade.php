<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="user-profile bb-1 px-20 py-10" id="mobile-display">
            <div class="d-block text-center">
                <div class="image">
                    @if(Auth::user()->avatar)
                    <img src="/storage/users-avatar/{{Auth::user()->avatar}}" class="avatar avatar-l bg-primary-light rounded100" width="50px" alt="User Image">
                    @else
                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-l bg-primary-light rounded100" width="50px" alt="User Image">
                    @endif
                </div>
                <div class="info pt-15">
                    <a class="px-20 fs-14 fw-500" href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </div>
            </div>
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
                    <li>
                        <a href="{{ route('client.services') }}" class="ajax">
                            <i class="icon-Hummer"><span class="path1"></span><span class="path2"></span></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.case.details') }}" class="ajax">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Cases Details</span>
                        </a>
                    </li>	
                    <li>
                        <a href="/message" class="ajax">
                            <i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.transactions') }}" class="ajax">
                            <i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li class="header">Settings</li>
                    <li>
                        <a href="{{ route('client.profile') }}" class="ajax">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="ajax" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                        <a href="/home" class="ajax">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                            <span>Cases</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('lawyer.cases') }}" class="ajax"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cases</a></li>
                            <li><a href="{{ route('lawyer.case.details') }}" class="ajax"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Case Details</a></li>
                        </ul>
                    </li>	
                    <li>
                        <a href="/message" class="ajax">
                            <i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="header">Settings</li>
                    <li>
                        <a href="{{ route('lawyer.profile', 'settings') }}" class="ajax">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ajax">
                            <i class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></i>
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="ajax">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif

        <div class="user-profile bb-1 px-20 py-10" id="desktop-display">
            <div class="d-block text-center">
                <div class="image">
                    @if(Auth::user()->avatar)
                    <img src="/storage/users-avatar/{{Auth::user()->avatar}}" class="avatar avatar-l bg-primary-light rounded100" width="50px" alt="User Image">
                    @else
                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-l bg-primary-light rounded100" width="50px" alt="User Image">
                    @endif
                </div>
                <div class="info pt-15">
                    <a class="px-20 fs-14 fw-500" href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </div>
            </div>
        </div>
    </section>
</aside>