@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header')

<section class="rest-detail-banner attrac-detail-banner">
	<div class="banner-img">
		<img class="img-fluid" src="{{asset('assets/images/alnoor-1.jpg')}}">
		<div class="banner-text">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-12">
						<div class="rest-title">	
							<div class="rest-title-text">
								<h1>Al Noor Island</h1>
								<h5>Subtitle will be here</h5>
							</div>
						</div>
					</div>

					<div class="col-lg-5 col-12">
						<div class="right-btns">
							<a href="#" class="btn-share"><i class="fa fa-share"></i></a>
							<span class="price">
								from <em>AED 79.00</em>
							</span>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
	
</section>	
	
<section class="rest-detail-content attrac-detail-content">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-4 col-12">
				<div class="home-ad-1">
					<a href="#">
						<img class="img-fluid" src="{{asset('assets/images/ad-1.jpg')}}">
					</a>
				</div>	
				<div class="side-bg contact-side">
					<h4>Contact</h4>
					<a onclick="displayNumber();">Show Number</a>
					<a href="tel:055 22 9090" class="number" style="display: none;">055 22 9090</a>
				</div>
				
				<div class="side-bg location">
					<h4>Location</h4>
					<div class="map"></div>
					<p>6th Street, Jumerah Lake Tower, Dubai <a href="#" target="_blank">Directions</a></p>
				</div>
				
				<div class="side-bg side-actis">
					<h4>You may also like</h4>
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
					
					<a href="{{route('activities-attraction')}}" class="explore-btn">Explore More</a>
					
				</div>
				
				<div class="side-ad home-ad-2">
					<a href="#">
						<img class="img-fluid" src="{{asset('assets/images/ad-2.jpg')}}">
					</a>
				</div>
				
				
			</div>
			<div class="col-lg-8 col-12">
				<div class="home-ad-1">
					<a href="#">
						<img class="img-fluid" src="{{asset('assets/images/ad-1.jpg')}}">
					</a>
				</div>	
				
				<div class="about-rest" id="overview">
					<h4>About Attraction</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
					<br><br>
					It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
					
					<img class="img-fluid" src="{{asset('assets/images/alnoor7.png')}}">
					<small>Feel adrenaline rush through your body as you take part in the dune bashing experience</small>
					</p>
					
					<h4>Things to note</h4>
					
					<h6>Insider Tips:</h6>
					<ul>
						<li>As the jeep for the tour can accommodate up to 6 people, booking in a group of 6 will allow your group to have the entire jeep to yourselves without having to share it with other guests.</li>
						<li>Bring your camera along to capture the breathtaking views of the desert</li>
						<li>While you are in Dubai, explore boat tour options such as the Jet Ski Experience or hop on a helicopter for an aerial adventure!</li>
						
					</ul>
					
					<h4>FAQ’s</h4>
					<h6>Can I cancel or amend the participation date?</h6>
					<p>This activity offers free cancellation for requests submitted more than 24 hours from your participation date. As such, you can simply cancel & refund your booking, and make another booking with the correct details, if your participation date is more than 24 hours from the time of cancellation.<br><br>
						For more information on how to request a refund, please refer to <a href="#">this article</a>!</p>
					
					<h6>How do I arrange my pick up location and time?</h6>
					<p>Your operator should get in touch with you a day prior or on the day of your trip and will confirm the details. Please be present at the hotel lobby 10 minutes before pick up time which is usually between 14:00pm - 15:00pm</p>
				
					
				</div>
				
				<div class="rest-gallery" id="rest-gallery">
					<h4>Gallery</h4>
					<div class="img-gallery">
						<a href="{{asset('assets/images/alnoor-2.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/alnoor-2.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/alnoor-3.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/alnoor-3.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/alnoor-4.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/alnoor-4.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/alnoor-5.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/alnoor-5.jpg')}}" alt=""></a>
						<a href="{{asset('assets/images/alnoor-6.jpg')}}" data-fancybox="gallery"><img src="{{asset('assets/images/alnoor-6.jpg')}}" alt=""></a>
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
<script>
    function displayNumber(){
        $('.number').toggle();
    }
</script>
@stop