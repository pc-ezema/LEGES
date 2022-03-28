@extends('layouts.frontend')

@section('page-content')
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="/">
                    <img src="{{URL::asset('assets/img/logo.png')}}" alt="Leges logo" style="max-width: 300px;">
                </a>
            </div>
            <div class="col-lg-12 text-center py-4">
                <h1>A Step To An Awesome Experience</h1>
                <p>Choose your registration type below</p>
                <div class="line-hr"></div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <a href="/client/registration">
                    <div class="box" style="background-color: #ED4B0C">
                        <h4 class="text-white">Clients</h4>
                        <a class="btn-leges mt-4 mb-3" href="/client/registration" style="background-color: #fff; display: inline-block; color: #000;
                                border: 1px solid #ffffff; border-radius: .5rem; padding: 15px 50px; position: relative; text-align:left;">Sign Up As Client
                            <i class="icofont-arrow-right float-right"></i></a>
                    </div>
                </a>
                <div class="col-md-12 text-center">
                    <p class="already">I already have an account! <a href="/login" class="btn-login" style="color: #fff;">Login</a></p>
                </div>
            </div>
            <div class="col-lg-5">
                <a href="/lawyer/registration">
                    <div class="box">
                        <h4>Lawyer</h4>
                        <a class="btn-leges mt-4 mb-3" href="/lawyer/registration" style="background-color: #ED4B0C; display: inline-block; color: #fff;
                                border: 1px solid #ffffff; border-radius: .5rem; padding: 15px 50px; position: relative; text-align:left;">Sign Up As Lawyer
                            <i class="icofont-arrow-right float-right"></i></a>
                    </div>
                </a>
                <div class="col-md-12 text-center">
                    <p class="already">I already have an account! <a href="/login" class="btn-login" style="color: #fff;">Login</a></p>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>
@endsection