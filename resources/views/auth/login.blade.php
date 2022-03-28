<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}} - Login</title>
    <link rel="shortcut icon" href="{{URL::asset('front_assets/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{URL::asset('front_assets/authStyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front_assets/bootstrap.min.css')}}">
</head>
<body class="register">
<div class="container auth-box"">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="/app">
                <img src="{{URL::asset('front_assets/favicon.png')}}" alt="Leges logo">
            </a>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="step active">
                    <h5>Hey there, Welcome Back!</h5>
                    <div>
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-white">{{ __('Remember Me') }}</span>
                    </div>

                    <div>
                        <button type="submit" style="width: 100%">
                            {{ __('Login') }}
                        </button>
                        <div class="signUp">
                            <p>Don't have an account? <a href="/app">Get Started!</a></p>
                        <div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>