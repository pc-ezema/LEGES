<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} - Lawyer Registration</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{URL::asset('css/vendors_css.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
								<h3 class="text-primary">Get started with Us</h3>	
                                <h3 class="text-primary">Lawyer</h3>						
							</div>
							<div class="p-40">
                                <form method="POST" action="{{ route('register') }}" id="registerForm" enctype="multipart/form-data">
                                    @csrf
                                    <input name="account_type" value="Lawyer" hidden>
                                    <div class="row">
										<div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                                    <input id="first_name" placeholder="First Name" class="form-control ps-15 bg-transparent @error('first_name') is-invalid @enderror" type="text" name="first_name" required value="{{ old('first_name') }}" autofocus>
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                                    <input id="last_name" placeholder="Last Name" class="form-control ps-15 bg-transparent @error('last_name') is-invalid @enderror" type="text" name="last_name" required value="{{ old('last_name') }}" autofocus>
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                                    <input id="email" placeholder="Email" class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror" type="email" name="email" required value="{{ old('email') }}" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                                    <input id="user_name" placeholder="User Name" class="form-control ps-15 bg-transparent @error('user_name') is-invalid @enderror" type="text" name="user_name" value="{{ old('user_name') }}" required autofocus>
                                                    @error('user_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                                    <input id="password" placeholder="Password" type="password" class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror" name="password" required value="{{ old('password') }}" autofocus>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
                                                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-comment-alt"></i></span>
                                                    <input id="bar" placeholder="When were you called to bar?" class="form-control ps-15 bg-transparent @error('bar') is-invalid @enderror" type="text" name="bar" required value="{{ old('bar') }}" autofocus>
                                                    @error('bar')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-location-pin"></i></span>
                                                    <input id="location_practice" placeholder="What is your location of practice?" class="form-control ps-15 bg-transparent @error('location_practice') is-invalid @enderror" type="text" name="location_practice" required value="{{ old('location_practice') }}" autofocus>
                                                    @error('location_practice')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-clipboard"></i></span>
                                                    <select id="area_practice" class="form-control ps-15 bg-transparent @error('area_practice') is-invalid @enderror" name="area_practice" required value="{{ old('area_practice') }}" autofocus>
                                                        <option>-- Select Area Practice --</option>
                                                        <option value="Advisory Services">Advisory Services</option>
                                                        <option value="Contract Negotiation">Contract Negotiation</option>
                                                        <option value="Contract Drafting">Contract Drafting</option>
                                                        <option value="Contract Review">Contract Review</option>
                                                    </select>
                                                    @error('area_practice')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-transparent"><i class="ti-file"></i></span>
                                                    <input id="documents" placeholder="Documents to submit" class="form-control ps-15 bg-transparent @error('documents') is-invalid @enderror" type="text" name="documents" required value="{{ old('documents') }}" autofocus>
                                                    @error('documents')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1" class="@error('agreement') is-invalid @enderror" name="agreement">
                                                <label for="basic_checkbox_1">I agree to the <a href="/terms_conditions" class="text-warning"><b>Terms &amp; Conditions</b></a></label>
                                                @error('agreement')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-12 text-center">
                                            <button type="submit" class="btn mt-20 ajax" style="background: #ED4B0C; color: #fff;">Register</button>
                                            </div>
                                            <div class="text-center">
                                                <p class="mt-10 mb-0">Already have an account?<a href="/login" class="text-danger ms-5 ajax"> Sign In</a></p>
                                            </div>
                                            <!-- /.col -->
                                        </div>
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

    <!-- Vendor JS -->
    <script src="{{URL::asset('js/vendors.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{URL::asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{URL::asset('js/pages/pace.js')}}"></script>
    <script src="{{URL::asset('assets/vendor_components/PACE/pace.min.js')}}"></script>
    <script src="https://use.fontawesome.com/633ef7b88d.js"></script>
</body>

</html>