@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
<main>
    <section class="welcome-screen">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-area">
                    <h1>Think LEGES!</h1>
                    <p>We are focused on providing affordable, quality and quick legal services to Africa.</p>
                    @auth
                        @if(Auth::user()->account_type == "Administrator")
                        <div class="btn-div"><a href="/admin/dashboard" class="btn-register">Dashboard<span></span>
                        <i class="fas fa-arrow-right"></i></a></div>
                        @else
                        <div class="btn-div"><a href="/home" class="btn-register">Dashboard<span></span>
                        <i class="fas fa-arrow-right"></i></a></div>
                        @endif
                    @else
                        <div class="btn-div"><a href="/app" class="btn-register">Register<span></span>
                        <i class="fas fa-arrow-right"></i></a></div>
                    @endauth
                </div>
                <div class="col-lg-6"><img src="{{URL::asset('front_assets/img/welcome-img.86bb42ba.png')}}"></div>
            </div>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>What is LEGES?</h1>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="note-box">
                        <img src="{{URL::asset('front_assets/img/leges_screen.png')}}" class="leges-screen">
                    </div>
                    <div class="sub-note-box"></div>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row bullet-box">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h1><i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Affordable Legal Service</h1>
                    <p>{{config('app.name')}} is determined to provide a affordable legal service to those who cannot afford to pay lawyers in the continent. This can be achieved by ensuring that our subscription fee annually is affordable to the middle and
                        low income earners in Africa.</p>
                    <h1><i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Reliable Legal Solution</h1>
                    <p>In as much as we are focused in offering affordable legal services
                        to our users, we are also concerned in the quality & reliability of such services and pride
                        ourselves ensuring that we organize a virtual screening option for the
                        recruitment process of lawyers working for us. In addition to this, we are
                        going to build a different application for the purpose of tracking the value,
                        affairs, progress and value of our lawyers.
                        </p>
                    <h1>
                        <i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Effective Legal Service</h1>
                    <p>We are also going to build an efficient response metrics to ensure
                        that all services are rendered within 24 hrs.
                        </p>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
    <section class="feature-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>What Can LEGES Help You Do?</h1>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 text-center">
                    <div class="box box1">
                        <h4>For Clients</h4>
                        <p>Provide a quick, efficient and effective means to solve your legal problem.</p>
                        <p>Gives you access to quality legal service and Affordable fees.</p><a href="#"><button>Sign up as
                                    Client <span></span><i class="fas fa-arrow-right"></i></button></a></div>
                </div>
                <div class="col-lg-5 text-center">
                    <div class="box box2">
                        <h4>For Lawyers</h4>
                        <p>A medium to make extra cash and build a second stream of income distinct from your salary.</p>
                            <p>Meet clients without stress or hustle.</p>
                            <a href="#"><button>Sign up as
                                    Lawyer <span></span><i class="fas fa-arrow-right"></i></button></a></div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>
    <section class="testimonial">
        <div id="carouselExampleControls" class="carousel slide
                pointer-event" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-4 boxes">
                            <div class="box-img box-img1"></div>
                            <div class="box-text">
                                <p class="test-text">I have been looking for a fast way to find a good (and affordable) lawyer... this is it! Great idea and excellent experience so far... 10 out of 10</p>
                                <p class="name">Faith Imabong</p>
                            </div>
                        </div>
                        <div class="col-xl-4 boxes">
                            <div class="box-img box-img2"></div>
                            <div class="box-text">
                                <p class="test-text">A brilliant aid to anyone wanting fast, cost-effective legal help without the hassle of a big law firm.</p>
                                <p class="name">Michael Job</p>
                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </div><button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"><span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"></span><span
                        class="visually-hidden">Previous</span></button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"><span
                        class="carousel-control-next-icon"
                        aria-hidden="true"></span><span
                        class="visually-hidden">Next</span></button>
        </div>
    </section>
    <section class="call-action">
        <div class="container">
            <div class="row">
                <div class="col-xl-1"></div>
                <div class="col-xl-10">
                    <div class="action-box">
                        <h1>SEEK <span>.</span> LEGAL <span>.</span> ADVICE
                            <a href="#"><img src="{{URL::asset('front_assets/img/play.e44a3db2.png')}}"></a>
                        </h1>
                    </div>
                </div>
                <div class="col-xl-1"></div>
            </div>
        </div>
    </section>
@endsection