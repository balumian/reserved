@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header-dump')

<section class="main-banner join-banner">
	<div class="banner-img">
		<img class="img-fluid" src="assets/images/owner-cta.jpg">
	</div>
	<div class="home-search-bg">
		<div class="container">
			<div class="row">
				<div class="home-search">
					<h1>Attract New Customers</h1>
					<p>More bookings from diners around the corner</p>
					<a href="{{route('business.signup')}}" class="btn-red">Join Now</a>
				</div>
			</div>
		</div>
	</div>	
</section>	

<section class="join-now-bg">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Benefits of Join with Us</h2>
				<h5>Look no further than Re-Served, the leading platform for restaurant table bookings. With our innovative features and user-friendly interface, we're here to help you boost your bookings, manage your operations easily, and reach new customers. Join us today and experience the benefits of Re-Served for your restaurant!</h5>
			</div>
		</div>
		
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-6 align-self-center">
				<div class="join-img">
					<img class="img-fluid" src="assets/images/join-img-2.png">
				</div>
			</div>
			
			<div class="col-12 col-lg-6">
				<div class="join-text arrow-right">
					<h4>Boost your Bookings</h4>
					<h6>Re-Served: Your Gateway to Fully Booked Tables and Thriving Business!</h6>
					<p>With Re-Served, you can significantly increase your restaurant's bookings and reservations. Our platform is designed to attract more customers to your establishment, ensuring that your tables are always filled. By leveraging our extensive network and marketing tools, we drive more visibility and exposure to your restaurant, making it easier for customers to discover and book a table at your venue. Say goodbye to empty tables and hello to a thriving dining experience!</p>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-12 col-lg-6 align-self-center">
				<div class="join-img">
					<img class="img-fluid" src="assets/images/join-img-1.png">
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="join-text arrow-left">
					<h4>Manage Easily</h4>
					<h6>Simplify Your Restaurant Operations: Re-Served Makes Management Effortless!</h6>
					<p>We understand the importance of streamlined operations for your restaurant. Re-Served provides a comprehensive and intuitive management system, allowing you to handle your bookings and reservations with ease. Our user-friendly interface enables you to efficiently organize your reservations, allocate tables, and track availability in real-time. You'll have complete control over your bookings, ensuring a seamless and hassle-free experience for both your staff and customers. Save time, reduce errors, and enhance your operational efficiency with Re-Served.</p>
				</div>
			</div>
		</div>
		
		<div class="row flex-row-reverse">
			<div class="col-12 col-lg-6 align-self-center">
				<div class="join-img">
					<img class="img-fluid" src="assets/images/join-img-3.png">
				</div>
			</div>
			
			<div class="col-12 col-lg-6">
				<div class="join-text">
					<h4>Reach New Customers</h4>
					<h6>Re-Served: Captivate New Tastes, Delight New Guests!</h6>
					<p>Expanding your customer base is essential for the growth of your restaurant. Re-Served opens doors to a vast community of food enthusiasts and potential diners. By joining our platform, you'll gain access to a wide range of customers actively seeking new dining experiences. We employ targeted marketing strategies to promote your restaurant to the right audience, maximizing your chances of attracting new and loyal patrons. Whether they're locals or tourists, Re-Served helps you connect with customers who are eager to explore the culinary delights your restaurant has to offer.</p>
				</div>
			</div>
			
		</div>
		
		<div class="row ">
			<div class="col-12 col-lg-12">
				<a href="{{route('business.signup')}}" class="join-now-btn">Join Now</a>
			</div>
		</div>

	</div>	
</section>	

<!-- Footer Section -->

<!-- @include('partials.footer') -->

<!-- End Page Content -->
@stop