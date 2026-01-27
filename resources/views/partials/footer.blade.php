<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-12">
				<div class="footer-info">
					<img class="img-fluid" src="{{asset('assets/images/logo-light.png')}}">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an..</p>
				</div>
			</div>
			
			<div class="col-lg-2 col-md-2 col-6">
				<div class="quick-links">
					<h4>Quick Links</h4>
					<ul>
						<li>
							<a href="{{route('business.signup')}}">Add your Restaurant</a>
						</li>
						<li>
							<a href="#">Suggest a Restaurant</a>
						</li>
						<li>
							<a href="{{route('login')}}">Log in</a>
						</li>
						<li>
							<a href="{{ route('register') }}">Register</a>
						</li>
						
					</ul>
				</div>
			</div>
			
			<div class="col-lg-2 col-md-2 col-6">
				<div class="quick-links">
					<h4>Reserve</h4>
					<ul>
						<li>
							<a href="{{route('about-us')}}">About Us</a>
						</li>
						<li>
							<a href="{{route('contact-us')}}">Contact</a>
						</li>
						<li>
							<a href="{{route('faq')}}">Faq's</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-12">
				<div class="subscribe">
					<h4>Keep in Touch</h4>
					<form id="Subscription">
						<div class="subscribe-bg">
							<input class="sub-input" type="email" id="email" name="email" placeholder="You Email" required="">
							<button type="button"><i class="fa fa-angle-right"></i></button>
						</div>
					</form>
				</div>
				
				
				<div class="social-icons">
					<h4>Follow Us</h4>
					<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a>
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-12">
				<ul class="other-links">
					<li><a href="{{route('terms-conditions')}}">Terms &amp; Conditions</a></li>
					<li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
				</ul>
			</div>
			
			<div class="col-lg-6 col-md-6 col-12">
				<a href="#" class="lang-btn-footer">English<i class=" fa fa-globe"></i></a>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<div class="copyrigts-bg">
					<p class="copyright">© Copyrights 2023 <a href="#">Re-Served</a> - all rights reserved</p>
					<p class="innovated">Innovated by <a href="https://www.innovationbox.ae/" target="_blank">Innovation Box</a></p>
				</div>
			</div>
			
			
		</div>
	</div>	
</footer>