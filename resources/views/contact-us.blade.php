@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header')


<section class="main-banner join-banner">
	<div class="banner-img">
		<img class="img-fluid" src="assets/images/owner-cta.jpg">
	</div>
	<div class="home-search-bg">
		<div class="container">
			<div class="row">
				<div class="home-search">
					
					<h1>Contact Us</h1>

				</div>
			</div>
		</div>
	</div>	
</section>	
	
<section class="join-now-bg contact-form-bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Get in Touch</h2>
				<p>Fill below form or drop us an email at <a href="mailto:support@re-served.ae">support@re-served.ae</a></p>
				
				<div class="contact-form">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="input-bg">
								<label for="name" class="input-label">Full Name <span>*</span></label>
								<input type="text" class="input-item" id="name" placeholder="" required="" name="name">
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="input-bg">
								<label for="Email" class="input-label">Email <span>*</span></label>
								<input type="Email" class="input-item" id="email" placeholder="" required="" name="Email">
							</div>
						</div>
						
						<div class="col-12 col-lg-12">
							<div class="input-bg">
								<label for="subject" class="input-label">Subject <span>*</span></label>
								<input type="text" class="input-item" id="subject" placeholder="" required="" name="subject">
							</div>
						</div>
						
						<div class="col-12 col-lg-12">
							<div class="input-bg">
								<label for="message" class="input-label">Message</label>
								<textarea type="text" class="input-item" rows="4" id="message" required="" value="" placeholder="" name="message"></textarea>
							</div>
						</div>
						
						<div class="col-lg-12 col-12">
							<a href="" class="contact-btn">SUBMIT</a>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		
		

		

		
	</div>	
</section>	

<!-- Footer Section -->

@include('partials.footer')

<!-- End Page Content -->
@stop