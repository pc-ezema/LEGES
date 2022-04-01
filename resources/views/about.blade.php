@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'About Us', 'subtitle' => "About Us"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <div class="help-area help-area-two help-area-four pb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="help-item help-left">
                        <img src="assets/img/home-two/5.jpg" alt="Help">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="help-item">
                        <div class="help-right">
                            <h2>We Provide Professional Attorneys to Assist You</h2>
                            <p>We are qualified for the success of our client & as a professional law firm. So these professional attorneys are still here at your side with kindness, integrity, and loyalty to help with the worst moments of your life.</p>
                            <p>We are qualified for the success of our client & as a professional law firm. So these professional attorneys are still here at your side with kindness.</p>
                            <div class="help-inner-left">
                                <ul>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        Browse Our Website
                                    </li>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        Choose Services
                                    </li>
                                </ul>
                            </div>
                            <div class="help-inner-right">
                                <ul>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        Quick Reply
                                    </li>
                                    <li>
                                        <i class="flaticon-checkmark"></i>
                                        Best Performances
                                    </li>
                                </ul>
                            </div>
                            <div class="help-signature">
                                <img src="assets/img/home-one/4.png" alt="Signature">
                            </div>
                            <h3>Barrister Babatunde Smithi</h3>
                            <span>Founder and CEO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="expertise-area expertise-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>OUR EXPERTISE</span>
                <h2>Law Firm Devoted To Our Clients</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="expertise-item">
                        <ul>
                            <li class="wow fadeInUp" data-wow-delay=".3s">
                                <div class="expertise-icon">
                                    <i class="flaticon-experience"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Experience</h3>
                                <p>{{config('app.name')}} teams are exceptionally skilled, acknowledge their client’s condition & help them to achieve their target.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <div class="expertise-icon">
                                    <i class="flaticon-lawyer"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Skilled Attorney</h3>
                                <p>Our attorneys are innovative and knowledgeable and help clients pursue a vast number of solutions to succeed.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".5s">
                                <div class="expertise-icon">
                                    <i class="flaticon-balance"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Legal Proces</h3>
                                <p>We maintain all valid papers and paperwork and continue to meet our destination legally.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="expertise-item">
                        <ul>
                            <li class="wow fadeInUp" data-wow-delay=".3s">
                                <div class="expertise-icon">
                                    <i class="flaticon-money-bag"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Low Cost</h3>
                                <p>Team of {{config('app.name')}} are exceptionally skilled, realize their client’s condition, help them to achieve their motive.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                <div class="expertise-icon">
                                    <i class="flaticon-time"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Good Performance</h3>
                                <p>Our attorneys are creative and knowledgeable and support clients by finding numerous solutions to win.</p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".5s">
                                <div class="expertise-icon">
                                    <i class="flaticon-conversation"></i>
                                    <img src="assets/img/home-one/11.png" alt="Shape">
                                </div>
                                <h3>Quick Service</h3>
                                <p>We manage all valid papers and paperwork and continue to enter our path lawfully.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection