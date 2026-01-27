@extends('layouts.frontend')
@section('title','Reserved::Forgot Password')

@section('content')
<div class="login-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 p-0">
				<div class="login-img">
					<img class="img-fluid" src="{{'assets/images/login-bg.jpg'}}" alt="Reserved">
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
					<h1>Forgot Password
						<em class="subtitle">Having trouble Signing in?</em>
					</h1>
					<form method="POST" action="{{ route('password.email') }}" id="forget-password">
                    @csrf

						<div class="input-bg">
							<label for="uname" class="input-label">Email Address <span>*</span></label>
							<input type="email" class="input-item" id="email" placeholder="" name="email">
                            <p class="text-danger">{{$errors->first('email')}}</p>
                            <p class="text-success">{{session('status')}}</p>
						</div>
						
						<div class="lgn-btn-bg">
							<div class="row">
								<div class="col-lg-4 col-12">
									<button type="submit" class="login-submit">Submit</button>
								</div>
<!--
								<div class="col-lg-8 col-12">
									<div class="dont-pass">
										<a class="forgetPass" href="#">Forgot Password?</a>
										<p>Don’t have an Account? <a class="dont-account" href="register.html"> Sign Up</a></p>
									</div>	
								</div>
-->
							</div>
						</div>
						
						<div class="or">
							<span>If you are not a Member register below</span>
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