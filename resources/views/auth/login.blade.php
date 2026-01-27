@extends('layouts.frontend')
@section('title', 'Reserved')

@section('content')
<div class="login-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 p-0">
				<div class="login-img">
					<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}" alt="Reserved">
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-12 align-self-center">
				<div class="login-form">
					<div class="logo-login">
						<img class="img-fluid logo" src="{{asset('assets/images/logo-login-dark.png')}}" alt="Reserved">
						
						<div class="lang-switch">
							<a href="#">العربية</a>
				
						</div>
					</div>
					
					<h1>Welcome Back, <span>Login</span></h1>
					<form method="POST" action="{{ route('login') }}" id="cutomer-login">
        			@csrf
						<div class="input-bg">
							<label for="uname" class="input-label">Email <span>*</span></label>
							<input type="email" class="input-item" id="email" placeholder="" name="email">
							<p class="text-danger">{{$errors->first('email')}}</p>
						</div>
						
						<div class="input-bg">
							<label for="uname" class="input-label">Password <span>*</span></label>
							<input type="password" class="input-item" id="password" placeholder="" name="password">
							<p class="text-danger">{{$errors->first('password')}}</p>
						</div>
						
						<div class="lgn-btn-bg">
							<div class="row">
								<div class="col-lg-4 col-12">
									<!-- <a href="my-profile.html" class="login-submit">{{ __('LOGIN') }}</a> -->
									<button type="submit" class="login-submit">{{ __('LOGIN') }}</button>
								</div>
								<div class="col-lg-8 col-12">
									<div class="dont-pass">
									@if (Route::has('password.request'))
										<a class="forgetPass" href="{{ route('password.request') }}">
											{{ __('Forgot Password?') }}
										</a>
									@endif
										<p>Don’t have an Account? <a class="dont-account" href="{{ route('business.signup') }}"> Sign Up</a></p>
									</div>	
								</div>
							</div>
						</div>
						
						<div class="or">
							<span>or</span>
						</div>
						
						<ul class="social-login">
							<li class="fb">
								<a href="#">
									<i class="fa fa-facebook"></i>
									<span><small>Login with</small> Facebook</span>
								</a>
							</li>
							
							<li class="google">
								<a href="#">
									<i class="fa fa-google"></i>
									<span><small>Login with</small> Google</span>
								</a>
							</li>
							
							
						</ul>
						
						
						
					</form>
					
					
					
				</div>
			</div>
			
		</div>
	</div>	
</div>	

@stop
	
	
	

