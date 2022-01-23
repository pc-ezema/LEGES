@extends('layouts.frontend')

@section('header')
@includeIf('layouts.header')
@endsection

@section('breadcrumb')
@includeIf('layouts.breadcrumb', ['title' => 'Teams', 'subtitle' => "Teams"])
@endsection

@section('footer')
@includeIf('layouts.footer')
@endsection

@section('page-content')
    <section class="team-area team-area-two pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".3s">
                        <img src="assets/img/home-one/team/1.jpg" alt="Team">
                        <div class="team-inner">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3>
                                <a href="attorney-details.html">Attor. Jerry Hudson</a>
                            </h3>
                            <span>Family Consultant</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".4s">
                        <img src="assets/img/home-one/team/2.jpg" alt="Team">
                        <div class="team-inner">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3>
                                <a href="attorney-details.html">Attor. Juho Hudson</a>
                            </h3>
                            <span>Criminal Consultant</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/home-one/team/3.jpg" alt="Team">
                        <div class="team-inner">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3>
                                <a href="attorney-details.html">Attor. Sarah Se</a>
                            </h3>
                            <span>Divorce Consultant</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".6s">
                        <img src="assets/img/home-one/team/4.jpg" alt="Team">
                        <div class="team-inner">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3>
                                <a href="attorney-details.html">Attor. Aikin Ward</a>
                            </h3>
                            <span>Business Consultant</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection