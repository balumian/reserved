@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->
@include('partials.header')

<section class="rest-detail-banner">
	<div class="banner-img">
		<img class="img-fluid" src="{{asset('assets/images/verdi-1.png')}}">
		<div class="banner-text">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-12">
						<div class="rest-title">
							<img class="img-fluid" src="{{asset('assets/images/rest-logo.jpg')}}">
							<div class="rest-title-text">
								<h1>Verde Beach Dubai</h1>
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>

									<em>4.5</em>
									<span class="reviews-count"><i class="fa fa-comments-o"></i> 50 Reviews</span>
									<span class="reviews-count"><i class="fa fa-money"></i> $$</span>
									<span class="reviews-count"><i class="fa fa-cutlery"></i> Italian</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-5 col-12">
						<div class="right-btns">
							<a href="#" class="btn-share"><i class="fa fa-share"></i></a>
							<a href="#" class="btn-fav"><i class="fa fa-heart-o"></i></a>
							<a id="open-make-reservation" class="reserve-btn">Reserve Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
	<div class="top-tabs">
		<a href="#overview">Overview</a>
		<a href="#rest-menu">Menu</a>
		<a href="#rest-gallery">Photos</a>
		<a href="#reviews">Reviews</a>		
	</div>
	
</section>	
	
<section class="rest-detail-content">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-4 col-12">
				
				<div class="side-bg perk-offer">
					<h4>Perks &amp; Offers</h4>
					<p>Free Coffee on first reservation.</p>
				</div>
				
				<div class="side-bg contact-side">
					<h4>Contact</h4>
					<a onclick="displayNumber();">Show Number</a>
					<a href="tel:055229090" class="number" style="display: none;">055 22 9090</a>
				</div>
				
				<div class="side-bg timings">
					<h4>Open Now <span>Time today: 12:00 pm - 2:00 am</span></h4>
					<ul>
						<li>Monday <span>4:00 pm - 12:00 am</span></li>
						<li>Tuesday <span>4:00 pm - 12:00 am</span></li>
						<li>Wednesday <span>12:00 pm - 2:00 am</span></li>
						<li>Thursday <span>4:00 pm - 12:00 am</span></li>
						<li>Friday <span>12:00 pm - 2:00 am</span></li>
						<li>Saturday <span>4:00 pm - 2:00 am</span></li>
						<li>Sunday <span>Closed</span></li>
					</ul>
				</div>
				
				<div class="side-bg location">
					<h4>Location</h4>
					<div class="map"></div>
					<p>6th Street, Jumerah Lake Tower, Dubai <a href="#" target="_blank">Directions</a></p>
				</div>
				
				<div class="side-bg side-actis">
					<h4>Near by Activities &amp; Attractions</h4>
					<div class="short-act-item">
						<a href="#">
							<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
							<div class="short-act-text">
								<p>Jumeirah Lake Towers</p>
								<span class="direc">
									<i class="fa fa-map-marker"></i> 6th Street, Jumerah Lake Tower, Dubai 
								</span>
								<span class="price"><i>FREE</i></span>
							</div>
						</a>
					</div>
					
					<div class="short-act-item">
						<a href="#">
							<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
							<div class="short-act-text">
								<p>Jumeirah Lake Towers</p>
								<span class="direc">
									<i class="fa fa-map-marker"></i> 6th Street, Jumerah Lake Tower, Dubai 
								</span>
								<span class="price"><i>AED 30</i></span>
							</div>
						</a>
					</div>
					
					<div class="short-act-item">
						<a href="#">
							<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
							<div class="short-act-text">
								<p>Jumeirah Lake Towers</p>
								<span class="direc">
									<i class="fa fa-map-marker"></i> 6th Street, Jumerah Lake Tower, Dubai 
								</span>
								<span class="price">from <i>AED 50</i></span>
							</div>
						</a>
					</div>
					
					<a href="#" class="explore-btn">Explore More</a>
					
				</div>
				
				<div class="side-ad home-ad-2">
					<a href="#">
						<img class="img-fluid" src="{{asset('assets/images/ad-2.jpg')}}">
					</a>
				</div>
				
				
			</div>
			<div class="col-lg-8 col-12">
				
				
				<div class="about-rest" id="overview">
					<h4>About Restaurant</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
					<br><br>
					It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				</div>
				
				<div class="rest-menu"  id="rest-menu">
					<h4>Menu</h4>
					
					<div class="menu-tabs-bg">
						<ul class="nav nav-tabs menu-tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" href="#tab_sec1" data-bs-toggle="tab" aria-selected="true" role="tab">Breakfast</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" href="#tab_sec2" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Lunch</a>
							</li>
							
							<li class="nav-item" role="presentation">
								<a class="nav-link" href="#tab_sec3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Dinner</a>
							</li>
							
							<li class="nav-item" role="presentation">
								<a class="nav-link" href="#tab_sec4" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Beverage</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" href="#tab_sec5" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">The Lunch Club</a>
							</li>
						</ul>
					</div>
					
					
					<div class="tab-content menu-tabs-content-bg">
							
						<!-- Tab 1 Starts -->
						<div class="tab-pane fade in active show" id="tab_sec1" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
							
						</div>
						<!-- Tab 1 Ends -->
						
						<!-- Tab 2 Starts -->
						<div class="tab-pane fade in" id="tab_sec2" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
						</div>
						<!-- Tab 2 Ends -->
						
							<!-- Tab 2 Starts -->
						<div class="tab-pane fade in" id="tab_sec2" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
						</div>
						<!-- Tab 2 Ends -->
						
						<!-- Tab 3 Starts -->
						<div class="tab-pane fade in" id="tab_sec3" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
						</div>
						<!-- Tab 3 Ends -->
						
						<!-- Tab 4 Starts -->
						<div class="tab-pane fade in" id="tab_sec4" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
						</div>
						<!-- Tab 4 Ends -->
						
						<!-- Tab 5 Starts -->
						<div class="tab-pane fade in" id="tab_sec5" role="tabpanel">
							<div class="rest-menu-item">
								<h5>Continental Buffet</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Continental Buffet <span class="price">AED 160.00</span></h6>
										<p>cold continental selection and bakeries including coffee, tea, juices.</p>
									</div>
								</div>
							</div>
							
							<div class="rest-menu-item">
								<h5>Classics</h5>
								<div class="row">
									<div class="col-lg-6 col-12">
										<h6>Belgian Waffle* <span class="price">AED 85.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Pancakes* <span class="price">AED 75.00</span></h6>
										<p>chantilly, strawberry, caramelized pistachio crumbs</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>French Toast* <span class="price">AED 80.00</span></h6>
										<p>vanilla soaked brioche, caramelized banana, peanuts.</p>
									</div>
									
									<div class="col-lg-6 col-12">
										<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
										<p>cheddar, scrambled egg, avocado, stewed peppers</p>
									</div>
									
									<div class="more-detail-menu" style="display: none;">
										<div class="row">
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										
											<div class="col-lg-6 col-12">
											<h6>Croissant Sandwich <span class="price">AED 85.00</span></h6>
												<p>cheddar, scrambled egg, avocado, stewed peppers</p>
											</div>
										</div>	
									</div>
									
								</div>
							</div>
							
							<a href="javascript:void(0)" class="view-full">View full menu</a>
							<a href="assets/images/login-bg.jpg" target="_blank" class="down-menu">Download PDF</a>
							<span class="last-updated">Last Updated: August 17,2022</span>
						</div>
						<!-- Tab 5 Ends -->
						
					</div>
					
				</div>
				
				<div class="rest-gallery" id="rest-gallery">
					<h4>Gallery</h4>
					<div class="img-gallery">
						<a href="{{asset('assets/images/verdi-2.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/verdi-2.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/verdi-3.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/verdi-3.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/verdi-4.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/verdi-4.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/verdi-5.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/verdi-5.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/verdi-6.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/verdi-6.jpg')}}" alt=""></a>
					</div>	
				</div>
				
				<div class="rest-reviews" id="reviews">
					<h4>Reviews</h4>
					
					<div class="review-ratings">
						<div class="total-ratings">
							<h4>4.5</h4>
							<span>Based on 10 reviews</span>
						</div>
						
						<div class="rating-type">
							<div class="rating-type-item">
								<h6>Food Quality</h6>
								<div class="progress">
									<div class="progressbar my-prog-bar progress-bar-animated" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="30" aria-valuemax="100">	
									</div>
								</div>
								<span>3.5</span>	
							</div>	
							
							<div class="rating-type-item">
								<h6>Service</h6>
								<div class="progress">
									<div class="progressbar my-prog-bar progress-bar-animated" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100">	
									</div>
								</div>
								<span>3.5</span>	
							</div>
							
							<div class="rating-type-item">
								<h6>Ambience</h6>
								<div class="progress">
									<div class="progressbar my-prog-bar progress-bar-animated" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="70" aria-valuemax="100">	
									</div>
								</div>
								<span>3.5</span>	
							</div>
							
							<div class="rating-type-item">
								<h6>Price</h6>
								<div class="progress">
									<div class="progressbar my-prog-bar progress-bar-animated" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100">	
									</div>
								</div>
								<span>3.5</span>	
							</div>
							
						</div>
					</div>
					
					<div class="reviews">
						
						<div class="review-item">
							<div class="review-img">
								<img class="img-fluid" src="{{asset('assets/images/profile-pic.jpg')}}">
								<div class="review-title">
									<h6>Customer Name</h6>
									<span class="all-reviews">3 reviews</span>
									<span class="date">Dined 3 days ago</span>
									<div class="stars">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
								</div>
							</div>
							<div class="review-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. took a galley of type and scrambled it to make a type specimen book..</p>
							</div>
						</div>
						
						<div class="review-item">
							<div class="review-img">
								<img class="img-fluid" src="{{asset('assets/images/profile-pic.jpg')}}">
								<div class="review-title">
									<h6>Customer Name</h6>
									<span class="all-reviews">3 reviews</span>
									<span class="date">Dined 3 days ago</span>
									<div class="stars">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
								</div>
							</div>
							<div class="review-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. took a galley of type and scrambled it to make a type specimen book..</p>
							</div>
						</div>
						
					</div>
					
					
				</div>
				
				<div class="home-ad-4">
					<a href="#">
						<img class="img-fluid" src="{{asset('assets/images/ad-1.jpg')}}">
					</a>
				</div>	
				
			</div>
		</div>
	</div>	
</section>		

	
<!-- Make a Reservation Start -->
	
<div id="body-overlay"></div>
	<div class="real-menu" role="navigation">            
		<div class="make-a-reserv">
			<h2>Make a Reservation</h2>
			
			<div class="rest-title-text">
				<h1>Verde Beach Dubai</h1>
				<p class="offer">Free Coffee on first reservation.</p>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>

					<em>4.5</em>
					<span class="reviews-count"><i class="fa fa-comments-o"></i> 50 Reviews</span>
					<span class="reviews-count"><i class="fa fa-money"></i> $$</span>
					<span class="reviews-count"><i class="fa fa-cutlery"></i> Italian</span>
				</div>
				
				<div class="row">
					
					<div class="col-12">
						<div class="input-bg">
							<label for="City" class="input-label">Party Size <span>*</span></label>
							<select name="City" id="City" class="input-item form-select" required="">
								  <option value="volvo">Option 01</option>
								  <option value="saab">Option 02</option>
								  <option value="mercedes">Option 03</option>
								  <option value="audi">Option 04</option>
							</select>
						</div>
					</div>
					
					<div class="col-12 col-lg-6">	
						<div class="input-bg">
							<label for="dob" class="input-label">Expiry Date <span>*</span></label>
							<input type="date" class="input-item my-date-picker" id="date" required="" value="1995-06-01" name="date">
						</div>
					</div>
					
					<div class="col-12 col-lg-6">
						<div class="input-bg">
							<label for="City" class="input-label">Time Slot <span>*</span></label>
							<select name="City" id="City" class="input-item form-select" required="">
								  <option value="volvo">Option 01</option>
								  <option value="saab">Option 02</option>
								  <option value="mercedes">Option 03</option>
								  <option value="audi">Option 04</option>
							</select>
						</div>
					</div>
					
					
					<div class="col-12 col-lg-12">
						<hr>
					</div>
					
					<div class="col-12 col-lg-12">
						<div class="pkg-bg">
					 	   <p>Select a Table</p>
							
  							<div class="row">
								<div class="col-6 col-lg-4">
									<div class="pkg-select">
										<input type="radio" id="table1" name="pkg-select" value="huey" checked="" class="pkg-radio">				  
										<label for="table1" class="pkg-lable">
											<div class="pkg-selection">
												<div class="select-table-img">
													<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
													<a href="assets/images/login-bg.jpg" data-fancybox="table-gallery" class="zoom"><i class="fa fa-plus"></i></a>
												</div>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/table.svg')}}"> 12</span>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/chair.svg')}}"> 03</span>
											</div>
										 </label>
									 </div>
								</div>
								
								<div class="col-6 col-lg-4">
									<div class="pkg-select">
										<input type="radio" id="table2" name="pkg-select" value="huey" class="pkg-radio">				  
										<label for="table2" class="pkg-lable">
											<div class="pkg-selection">
												<div class="select-table-img">
													<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
													<a href="{{asset('assets/images/login-bg.jpg')}}" data-fancybox="table-gallery" class="zoom"><i class="fa fa-plus"></i></a>
												</div>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/table.svg')}}"> 12</span>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/chair.svg')}}"> 03</span>
											</div>
										 </label>
									</div>
								</div>
								<div class="col-6 col-lg-4">
									<div class="pkg-select">
										<input type="radio" id="table3" name="pkg-select" value="huey" class="pkg-radio">				  
										<label for="table3" class="pkg-lable">
											<div class="pkg-selection">
												<div class="select-table-img">
													<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
													<a href="{{asset('assets/images/login-bg.jpg')}}" data-fancybox="table-gallery" class="zoom"><i class="fa fa-plus"></i></a>
												</div>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/table.svg')}}"> 12</span>
												<span class="table-seat"><img class="img-fluid seat" src="{{asset('assets/images/chair.svg')}}"> 03</span>
											</div>
										 </label>
									</div>
								</div>							
							</div>
					    </div>
					</div>
					
					<div class="col-12 col-lg-6">	
						<div class="input-bg">
							<label for="dob" class="input-label">Expiry Date <span>*</span></label>
							<input type="date" class="input-item my-date-picker" id="date" required="" value="1995-06-01" name="date">
						</div>
					</div>
					
					<div class="col-12 col-lg-6">
						<div class="input-bg">
							<label for="City" class="input-label">Time Slot <span>*</span></label>
							<select name="City" id="City" class="input-item form-select" required="">
								  <option value="volvo">Option 01</option>
								  <option value="saab">Option 02</option>
								  <option value="mercedes">Option 03</option>
								  <option value="audi">Option 04</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-lg-12">
						<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="reserve-btn">Confirm Reservation</a>	
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>

	
<!-- Make a Reservation Ends -->
	
	
<!--OPT Popup Starts-->
	
	

	<div class="my-pop otp-poup modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title" id="staticBackdropLabel">Verde Beach Dubai</h1>
						<p>6th Street, Jumerah Lake Tower, Dubai  -  <a href="#" target="_blank">Get Direction</a></p>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="opt-pop-text">
							<h5>OTP Verification</h5>
							<p>Please Enter Phone number for OTP Verification</p>
							
							<div class="input-bg group-input-bg">
								<div class="input-group">
									<select name="Phone" id="Phone" class="input-item form-select" required="">
										  <option value="volvo">+971</option>
										  <option value="saab">+971</option>
										  <option value="mercedes">+971</option>
										  <option value="audi">+971</option>
									</select>
									<input type="text" class="input-item" id="Phone" placeholder="" value="522 9090" name="Phone">
								</div>  
							</div>
							
							
							<a href="#" data-bs-toggle="modal" data-bs-target="#otpcodepopup" class="btn-red">Send OTP</a>
							
						</div>	
					</div>
					
				</div>
			</div>
	</div>
	
	
	<div class="my-pop otp-poup modal fade" id="otpcodepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="otpcodepopupLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title">Verde Beach Dubai</h1>
						<p>6th Street, Jumerah Lake Tower, Dubai  -  <a href="#" target="_blank">Get Direction</a></p>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="opt-pop-text">
							<h6>Please enter the One-Time Password to verify your Reservation request</h6>
							<p><span>A One-Time Password has been sent you 05******96</span></p>
							
							<form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
								<input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
								<input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
								<input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
								<input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
								<input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
							</form>
							
							<a href="#" data-bs-toggle="modal" data-bs-target="#otpconfirm-popup" class="btn-red">Validate</a>
							<div class="down-btns">
								<a href="#">Resend OTP</a> <a href="#">Change Number</a>
							</div>
							
							
						</div>	
					</div>
					
				</div>
			</div>
	</div>
	
	
	<div class="my-pop otp-poup modal fade" id="otpconfirm-popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="otpconfirm-popupLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title" id="otpconfirm-popupLabel">Verde Beach Dubai</h1>
						<p>6th Street, Jumerah Lake Tower, Dubai  -  <a href="#" target="_blank">Get Direction</a></p>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="opt-pop-text">
							
							<img class="img-fluid opt-confirm-img" src="{{asset('assets/images/verified-confirm.png')}}">
							<h5>Reservation Request Sent</h5>
							<p>Restaurant will confirm your reservation shortly</p>
						</div>	
					</div>
					
				</div>
			</div>
	</div>
	
	
<!--OTP Popup Ends-->

<!-- Footer Section -->
@include('partials.footer')
<!-- End Page Content -->

<script>
    function displayNumber(){
        $('.number').toggle();
    }
</script>

@stop