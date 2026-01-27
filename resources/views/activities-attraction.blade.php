@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header')

<section class="main-banner listing-banner">
	<div class="banner-img">
		<img class="img-fluid" src="assets/images/login-bg.jpg">
	</div>
	<div class="home-search-bg">
		<div class="container">
			<div class="row flex-row-reverse">
				<div class="col-12 col-lg-6">
					<div class="home-search">
						<div class="search-bg">
							<i class="fa fa-search"></i>
							<input type="search" class="home-search-input" placeholder="Restaurant, Cafe,  Cuisine or City">
							<button type="submit" class="search-btn">Search</button>
						</div>
					</div>
				</div>	
				
				<div class="col-12 col-lg-6 align-self-center">
					<div class="search-res">
						<h4>20 Activities &amp; Attractions in Downtown</h4>
					</div>
				</div>	
					
			</div>
		</div>
	</div>	
</section>	
	
<div class="rest-listing-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12">
				
				<div class="mob-heading-sidebar">
					<a class="lg-hidden d-flex justify-content-between" data-bs-toggle="collapse" href="#my-filter" role="button" aria-expanded="false" aria-controls="my-filter"><h2>Filter <i class="fa fa-filter"></i></h2>
					</a>	
				</div>
				
				<div class="listing-sidebar collapse" id="my-filter">
					<div class="sort-by">
						<select name="Nationality" id="Nationality" class="input-item form-select" required="">
							  <option value="volvo">Sort by Polularity</option>
							  <option value="saab">Sort by Price</option>
						</select>
					</div>
					
					<div class="filters">
						<div class="accordion" id="sidebar-filters">
							
						  <div class="accordion-item">
							<h2 class="accordion-header" id="filterhead1">
							  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterside1" aria-expanded="true" aria-controls="filterside1">
								Emirates
							  </button>
							</h2>
							<div id="filterside1" class="accordion-collapse collapse show" aria-labelledby="filterhead1">
							  <div class="accordion-body">
							  		<div class="custom-radio">
										<input type="checkbox" id="abudhabi" class="radio-custom checkbox-custom" name="emirates" value="Abu Dhabi">
										<label for="abudhabi" class="radio-custom-label"><em>Abu Dhabi</em></label>
									</div>
								  
								    <div class="custom-radio">
										<input type="checkbox" id="dubai" class="radio-custom checkbox-custom" name="emirates" value="Dubai">
										<label for="dubai" class="radio-custom-label"><em>Dubai</em></label>
								    </div>
								  
								   <div class="custom-radio">
										<input type="checkbox" id="sharjah" class="radio-custom checkbox-custom" name="emirates" value="Sharjah">
										<label for="sharjah" class="radio-custom-label"><em>Sharjah</em></label>
								   </div>
								  
								   <div class="custom-radio">
										<input type="checkbox" id="ajman" class="radio-custom checkbox-custom" name="emirates" value="Ajman">
										<label for="ajman" class="radio-custom-label"><em>Ajman</em></label>
								   </div>
								  
								  <div class="custom-radio">
										<input type="checkbox" id="umquwain" class="radio-custom checkbox-custom" name="emirates" value="Umm Al Quwain">
										<label for="umquwain" class="radio-custom-label"><em>Umm Al Quwain</em></label>
								   </div>
								  
								   <div class="custom-radio">
										<input type="checkbox" id="raskhaima" class="radio-custom checkbox-custom" name="emirates" value="Ras Al Khaimah">
										<label for="raskhaima" class="radio-custom-label"><em>Ras Al Khaimah</em></label>
								   </div>
								  
								  
								  
							  </div>
							</div>
						  </div>
							
						</div>
					</div>
					
					
					<div class="home-ad-2">
						<a href="#">
							<img class="img-fluid" src="assets/images/ad-2.jpg">
						</a>
					</div>
					
				</div>
			</div>
			<div class="col-lg-9 col-12">
				<div class="rest-listing">
					<div class="home-ad-4">
						<a href="#">
							<img class="img-fluid" src="assets/images/ad-1.jpg">
						</a>
					</div>
					<div class="row">
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-1.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-2.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-3.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>		
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-1.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-2.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-3.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-1.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-2.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-3.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>		
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-1.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-2.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						<div class="col-lg-4 col-6">
							<div class="item attrac-card">
								<a href="{{route('activities-detail')}}">
									<div class="attrac-card-img">
										<img class="img-fluid" src="assets/images/acti-3.jpg">
									</div>
									<div class="attrac-card-text">
										<h4>Burj Khalifa At the Top Observation Deck Ticket..</h4>
										<span class="rest-location"><i class="fa fa-map-marker"></i> DIFC (Dubai Gate Village Building)</span>
										<span class="price"><em>AED 142</em></span>
									</div>
								</a>		
							</div>
						</div>	
						
						
					</div>	
					
					<nav aria-label="Page navigation">
					  <ul class="pagination">
						<li class="page-item">
						  <a class="page-link" href="#" aria-label="Previous">
							<i class="fa fa-angle-double-left"></i>
						  </a>
						</li>
						<li class="page-item"><a class="page-link active" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
						  <a class="page-link" href="#" aria-label="Next">
							<i class="fa fa-angle-double-right"></i>
						  </a>
						</li>
					  </ul>
					</nav>

					<div class="home-ad-4">
						<a href="#">
							<img class="img-fluid" src="assets/images/ad-1.jpg">
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>	
</div>	

<!-- Footer Section -->

@include('partials.footer')

<!-- End Page Content -->
@stop