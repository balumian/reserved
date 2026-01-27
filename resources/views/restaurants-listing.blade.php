@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header')

<section class="main-banner listing-banner">
	<div class="banner-img">
		<img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
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
						<h4>145 restaurants in Downtown</h4>
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
					<a class="lg-hidden d-flex justify-content-between" data-bs-toggle="collapse" href="#my-filter" role="button" aria-expanded="false" aria-controls="my-filter">
						<h2>Filter <i class="fa fa-filter"></i></h2>
					</a>
				</div>

				<div class="listing-sidebar collapse" id="my-filter">

					<div class="sort-by">
						<select name="Nationality" id="Nationality" class="input-item form-select" required="">
							<option value="volvo">Sort by Polularity</option>
							<option value="saab">Sort by Price</option>
							<option value="mercedes">Sort by Reviews</option>
						</select>
					</div>

					<div class="filters">
						<div class="accordion" id="sidebar-filters">

							<!-- Emirates Filter -->
							@include('partials.filters.emirates')
							
							<!-- Experiences Filter -->
							@include('partials.filters.experiences')

							<!-- Special Feature Filter -->
							@include('partials.filters.features')

							<!-- Prices Filter -->
							@include('partials.filters.price')

							<!-- Business Types Filter -->
							@include('partials.filters.types')

							<!-- Cuisines Filter -->
							@include('partials.filters.cuisines')
							
							<!-- Amenities Filter -->
							@include('partials.filters.amenities')

						</div>
					</div>


					<div class="home-ad-2">
						<a href="#">
							<img class="img-fluid" src="{{asset('assets/images/ad-2.jpg')}}">
						</a>
					</div>

				</div>
			</div>
			<div class="col-lg-9 col-12">
				<div class="rest-listing">
					<div class="home-ad-4">
						<a href="#">
							<img class="img-fluid" src="{{asset('assets/images/ad-1.jpg')}}">
						</a>
					</div>
					<div class="row">

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-1.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Arabic</span>
										</div>
										<span class="offer-tag">Offer</span>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart-o"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-2.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Indian</span>
											<span class="c-tag">Pakistani</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-4.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Maxican</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart-o"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-3.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Turkish</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-4.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Arabic</span>
											<span class="c-tag">Pakistani</span>
										</div>
										<span class="offer-tag">Offer</span>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-5.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Arabic</span>
										</div>
										<span class="offer-tag">Offer</span>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart-o"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-6.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Indian</span>
											<span class="c-tag">Pakistani</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-7.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Maxican</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart-o"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-8.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Turkish</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-9.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Indian</span>
											<span class="c-tag">Pakistani</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-10.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Maxican</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart-o"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="rest-card">
								<div class="rest-card-img">
									<a href="{{route('restaurant-detail')}}">
										<img class="img-fluid" src="{{asset('assets/images/restu-12.jpg')}}">
									</a>
									<div class="rest-card-tags">
										<div class="tag-cusines">
											<span class="c-tag">Turkish</span>
										</div>
									</div>
									<a href="#" class="fav-tag"><i class="fa fa-heart"></i></a>
								</div>

								<div class="rest-card-text">
									<a href="{{route('restaurant-detail')}}">
										<h4>Mina Brasserie</h4>
										<span class="p-range"><i>$</i> <i>$</i> <i class="opacity-50">$</i> <i class="opacity-50">$</i> </span>
										<span class="rest-location">DIFC (Dubai Gate Village Building)</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>

											<em>4.5</em>
											<span>50 Reviews</span>
										</div>
									</a>
								</div>

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
							<img class="img-fluid" src="{{asset('assets/images/ad-1.jpg')}}">
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