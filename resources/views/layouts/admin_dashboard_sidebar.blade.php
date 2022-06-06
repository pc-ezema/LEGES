<aside class="main-sidebar" style="background: #f8eedd;">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="user-profile bb-1 px-20 py-10">
            <div class="d-block text-center">
                <div class="image">
                    @if(Auth::user()->avatar)
                    <img src="/storage/users-avatar/{{Auth::user()->avatar}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                    @else
                    <img src="{{URL::asset('images/avatar.jpg')}}" class="avatar avatar-xl bg-primary-light rounded100" alt="User Image">
                    @endif
                </div>
                <div class="info pt-15">
                    <a class="px-20 fs-14 fw-500" href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                </div>
            </div>
            <ul class="list-inline profile-setting mt-10 mb-0 d-flex justify-content-center gap-3">
                <li><a href="{{ route('admin.profile') }}" data-bs-toggle="tooltip" title="Profile"><i class="icon-User fs-24"><span class="path1"></span><span class="path2"></span></i></a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" title="Logout"><i class="icon-Lock-overturning fs-24"><span class="path1"></span><span class="path2"></span></i></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </ul>
        </div>
        
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="/admin/dashboard">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            <span>Users</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.clients') }}" class="ajax"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Clients</a></li>
                            <li><a href="{{ route('admin.lawyers') }}" class="ajax"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lawyers</a></li>
                        </ul>
                    </li>	
                    <li>
                        <a href="{{route('admin.cases')}}" class="ajax">
                            <i class="icon-Hummer"><span class="path1"></span><span class="path2"></span></i>
                            <span>Cases</span>
                        </a>
                    </li>	
                    <li>
                        <a href="{{route('admin.services')}}" class="ajax">
                            <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="/message" class="ajax">
                            <i class="icon-Incoming-mail"><span class="path1"></span><span class="path2"></span></i>
                            <span>Messages</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{route('admin.notifications')}}" class="ajax">
                            <i class="fa fa-bell" style="font-size: 1.3rem"><span class="path1"></span><span class="path2"></span></i>
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transactions') }}" class="ajax">
                            <i class="icon-Money"><span class="path1"></span><span class="path2"></span></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <!-- <li class="header">Settings</li>
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
                    </li> -->
                </ul>
            </div>
        </div>
    </section>
</aside>