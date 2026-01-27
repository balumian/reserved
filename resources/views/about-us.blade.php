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
					
					<h1>About Reserved</h1>

				</div>
			</div>
		</div>
	</div>	
</section>	
	
<section class="join-now-bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>About Us</h2>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
			</div>
		</div>
		
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-6 align-self-center">
				<div class="join-img">
					<img class="img-fluid" src="assets/images/join-img-2.png">
				</div>
			</div>
			
			<div class="col-12 col-lg-6">
				<div class="join-text">
					<h4>Why Us</h4>
					<h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
				</div>
			</div>
			
		</div>

		<div class="row ">
			<div class="col-12 col-lg-12">
				<a href="#" class="join-now-btn">Join Now</a>
			</div>
		</div>

		
	</div>	
</section>

<!-- Footer Section -->

@include('partials.footer')

<!-- End Page Content -->
@stop