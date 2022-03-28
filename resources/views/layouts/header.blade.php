<nav class="navbar navbar-expand-lg fixed-top" id="header-scroll">
    <div class="container g-0">
        <a class="navbar-brand" href="/">
            <img src="{{URL::asset('front_assets/img/logo.00f785f0.png')}}" alt="LEGES logo"></a>
        <div class="login-div mobile-login"><a class="btn-login" href="/login">Login <span></span>
                <i class="fas fa-arrow-right"></i></a></div>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fas fa-bars" style="color:#141A46;"></i></button>
        <div class="offcanvas offcanvas-end" tabindex="-100" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header"><button type="button" class="btn-close text-reset text-right" data-bs-dismiss="offcanvas" aria-label="Close"></button></div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center
                        flex-grow-1">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/teams">Teams</a></li>
                    <li class="nav-item"><a class="nav-link" href="/faqs">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
                @auth
                    @if(Auth::user()->account_type == "Administrator")
                    <div class="login-div desktop-login"><a class="btn-login" href="/admin/dashboard">Dashboard<span></span>
                    <i class="fas fa-arrow-right"></i></a></div>
                    @else
                    <div class="login-div desktop-login"><a class="btn-login" href="/home">Dashboard<span></span>
                    <i class="fas fa-arrow-right"></i></a></div>
                    @endif
                @else
                <div class="login-div desktop-login"><a class="btn-login" href="/login">Login <span></span>
                    <i class="fas fa-arrow-right"></i></a></div>
                @endauth
            </div>
        </div>
    </div>
</nav>