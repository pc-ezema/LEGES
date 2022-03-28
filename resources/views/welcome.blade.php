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
                    <h1>Looking For Affordable &amp; Easy Legal Service?
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum magni suscipit vitae praesentium ut similique laboriosam sit asperiores corporis, ab recusandae blanditiis possimus animi eos dolore accusantium. Ducimus praesentium
                        esse consequatur blanditiis, atque illo delectus voluptate numquam nobis temporibus.</p>
                    @auth
                        @if(Auth::user()->account_type == "Administrator")
                        <div class="btn-div"><a href="/admin/dashbboard" class="btn-register">Dashboard<span></span>
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
                    <div class="note-box"></div>
                    <div class="sub-note-box"></div>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row bullet-box">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h1><i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Affordable Legal Service</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit quibusdam totam atque itaque unde natus aliquid, quisquam quo sint iusto, necessitatibus facere.</p>
                    <h1><i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Reliable Legal Solution</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit quibusdam totam atque itaque unde natus aliquid, quisquam quo sint iusto, necessitatibus facere.</p>
                    <h1>
                        <i class="fas fa-check" style="color:#115A00;font-size:35px;"></i><span></span>Effective Legal Service</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit quibusdam totam atque itaque unde natus aliquid, quisquam quo sint iusto, necessitatibus facere.</p>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, esse ab repellat, blanditiis repudiandae quia itaque excepturi iste voluptatum rem quod minus natus vitae, id sint minima officia dolor delectus! Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit.
                        </p><a href="#"><button>Sign up as
                                    Client <span></span><i class="fas fa-arrow-right"></i></button></a></div>
                </div>
                <div class="col-lg-5 text-center">
                    <div class="box box2">
                        <h4>For Lawyers</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, esse ab repellat, blanditiis repudiandae quia itaque excepturi iste voluptatum rem quod minus natus vitae, id sint minima officia dolor delectus! Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit.
                        </p><a href="#"><button>Sign up as
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
                                <p class="test-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam iste dignissimos accusamus est repellat nemo cumque! Odio, dolore, id harum neque sunt, cum nesciunt nobis ipsam omnis blanditiis praesentium voluptas!</p>
                                <p class="name">Faith Imabong</p>
                            </div>
                        </div>
                        <div class="col-xl-4 boxes">
                            <div class="box-img box-img2"></div>
                            <div class="box-text">
                                <p class="test-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam iste dignissimos accusamus est repellat nemo cumque! Odio, dolore, id harum neque sunt, cum nesciunt nobis ipsam omnis blanditiis praesentium voluptas!</p>
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