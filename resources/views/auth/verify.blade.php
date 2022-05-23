<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} - Verification</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{URL::asset('css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skin_color.css')}}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{URL::asset('../front_assets/img/register_bg.png')}})">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <a href="/app">
                                    <img src="{{URL::asset('front_assets/favicon.png')}}" alt="Leges logo" width="70px">
                                </a>
                                <h3 class="text-primary">{{ __('Verify Your Email Address') }}</h3>	
                                <hr>
                                <div style="padding-bottom: 3rem;">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                                    <p>{{ __('If you did not receive the email') }}</p>
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-2 m-0 align-baseline mb-5 ajax" style="background: #ED4B0C; color: #fff;">{{ __('Click Here to Request Another') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Vendor JS -->
<script src="{{URL::asset('js/vendors.min.js')}}"></script>
<script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
<script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{URL::asset('js/pages/pace.js')}}"></script>
<script src="{{URL::asset('assets/vendor_components/PACE/pace.min.js')}}"></script>
<script src="https://use.fontawesome.com/633ef7b88d.js"></script>
</body>

</html>