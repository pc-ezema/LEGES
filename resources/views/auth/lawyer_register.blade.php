<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}} - Lawyer Registration</title>
    <link rel="shortcut icon" href="{{URL::asset('front_assets/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{URL::asset('front_assets/authStyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front_assets/bootstrap.min.css')}}">
</head>
<body class="register">
    <div class="container auth-box">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="/app">
                    <img src="{{URL::asset('front_assets/favicon.png')}}" alt="Leges logo">
                </a>
                <form method="POST" action="{{ route('register') }}" id="registerForm" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="account_type" value="Lawyer" hidden>
                    <div class="step active">
                        <h5>Hey there, Signup!</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <!--First Name-->
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" class="input @error('first_name') is-invalid @enderror" type="text" name="first_name" required value="{{ old('first_name') }}" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--Last Name-->
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" class="input @error('last_name') is-invalid @enderror" type="text" name="last_name" required value="{{ old('last_name') }}" autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Email Address -->
                                <div>
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" class="input @error('email') is-invalid @enderror" type="email" name="email" required value="{{ old('email') }}" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--User Name-->
                                <div>
                                    <label for="user_name">{{ __('User Name') }}</label>
                                    <input id="user_name" class="input @error('user_name') is-invalid @enderror" type="text" name="user_name" value="{{ old('user_name') }}" required autofocus>
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Gender -->
                                <div>
                                    <label for="gender">{{ __('Gender') }}</label>
                                    <select name="gender" id="gender" class="input @error('gender') is-invalid @enderror" value="{{ old('gender') }}" required autofocus>
                                        <option hidden>-- Choose Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Phone Number-->
                                <div>
                                    <label for="phone_number">{{ __('Phone Number') }}</label>
                                    <input id="phone_number" class="input @error('phone_number') is-invalid @enderror" type="tel" name="phone_number" required value="{{ old('phone_number') }}" autofocus>
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--Password-->
                                <div>
                                    <label for="password">{{ __('Enter Password') }}</label>
                                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required value="{{ old('password') }}" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div>
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!--Submit-->
                                <div>
                                    <button type="submit" style="width: 100%">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="option-below full-width">Have An Account? <a href="/login">Log In</a></p>
            </div>
        </div>
    </div>
    <script>
        const steps = Array.from(document.querySelectorAll("form .step"));
        const nextBtn = document.querySelectorAll("form .next-btn");
        const prevBtn = document.querySelectorAll("form .previous-btn");
        const form = document.querySelector("form");

        nextBtn.forEach((button) => {
        button.addEventListener("click", () => {
            changeStep("next");
        });
        });
        prevBtn.forEach((button) => {
        button.addEventListener("click", () => {
            changeStep("prev");
        });
        });

        form.addEventListener("submit", (e) => {
        e.preventDefault();
        const inputs = [];
        form.querySelectorAll("input").forEach((input) => {
            const { name, value } = input;
            inputs.push({ name, value });
        });
        console.log(inputs);
        form.reset();
        });

        function changeStep(btn) {
        let index = 0;
        const active = document.querySelector(".active");
        index = steps.indexOf(active);
        steps[index].classList.remove("active");
        if (btn === "next") {
            index++;
        } else if (btn === "prev") {
            index--;
        }
        steps[index].classList.add("active");
        }
    </script>
</body>
</html>