<section class="cuisine-exp">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="browse-by-home">
					<h2>Browse by Cuisine <a href="{{route('restaurants-listing')}}">View all</a></h2>
					<div class="owl-carousel browse-by-cuisine owl-theme">
						@if($cuisines = cuisines())
						@foreach($cuisines as $cuisine)
						<div class="item browse-by-home-item">
							<a href="{{route('restaurants-listing')}}">
								@if($cuisine->feature)
								<img class="img-fluid" src="{{asset('storage/'.$cuisine->feature)}}">
								@else
								<img class="img-fluid" src="{{asset('assets/images/by-cuisines/arabic.jpg')}}">
								@endif
								<h5>{{$cuisine->title}}</h5>
							</a>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-12">
				<div class="browse-by-home brws-exp">
					<h2>Browse by Experience <a href="{{route('restaurants-listing')}}">View all</a></h2>

					<div class="owl-carousel browse-by-exp owl-theme">
						@if($experiences = experiences())
						@foreach($experiences as $experience)
						<div class="item browse-by-home-item">
							<a href="{{route('restaurants-listing')}}">
								@if($experience->feature)
								<img class="img-fluid" src="{{asset('storage/'.$experience->feature)}}">
								@else
								<img class="img-fluid" src="{{asset('assets/images/by-exp/mountains.jpg')}}">
								@endif
								<h5>{{$experience->title}}</h5>
							</a>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>