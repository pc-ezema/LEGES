<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} - Reset Password</title>

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
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <a href="/app">
                                <img src="{{URL::asset('front_assets/favicon.png')}}" alt="Leges logo" width="70px">
                            </a>
                            <h4 class="text-primary pt-3">{{ __('Reset Password') }}</h4>						
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group row">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                            <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                            <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn" style="background: #ED4B0C; color: #fff;">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                    </div>
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

</body>

</html>