<!DOCTYPE html>
<html>
<!-- Mirrored from leges.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 21:50:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="{{URL::asset('front_assets/favicon.png')}}" type="image/x-icon">
    <!-- <link href="js/about.2ca856e6.js" rel="prefetch"> -->
    <link href="{{URL::asset('front_assets/css/app.bedbab49.css')}}" rel="preload" as="style">
    <link href="{{URL::asset('front_assets/css/chunk-vendors.0601f48e.css')}}" rel="preload" as="style">
    <link rel="stylesheet" href="{{URL::asset('front_assets/fonts/flaticon.css')}}">
    <!-- <link href="js/app.c23c45b5.js" rel="preload" as="script">
    <link href="js/chunk-vendors.942ecffc.js" rel="preload" as="script"> -->
    <link href="{{URL::asset('front_assets/css/chunk-vendors.0601f48e.css')}}" rel="stylesheet">
    <link href="{{URL::asset('front_assets/css/app.bedbab49.css')}}" rel="stylesheet">
    <script src="{{URL::asset('front_assets/js/custom.js')}}"></script>
    <title>{{config('app.name')}}</title>
</head>

<body>

    <section class="register">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/">
                        <img src="{{URL::asset('assets/img/logo.png')}}" alt="Leges logo">
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
                                border: 1px solid #ffffff; border-radius: .5rem; padding: 15px 50px; position: relative; text-align:left;">Sign Up As Client
                                <i class="icofont-arrow-right float-right"></i></a>
                        </div>
                    </a>
                    <div class="col-md-12 text-center">
                        <p class="already">I already have an account! <a href="/school/login" class="btn-login" style="color: #fff;">Login</a></p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    <script src="{{URL::asset('front_assets/js/chunk-vendors.942ecffc.js')}}"></script>
    <script src="{{URL::asset('front_assets/js/app.c23c45b5.js')}}"></script>
    <script src="{{URL::asset('front_assets/js/custom.js')}}"></script>

</body>

</html>