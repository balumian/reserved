@extends('layouts.frontend')
@section('title', 'Reserved')
@section('body-class', 'web')

@section('content')

<!-- Header -->

@include('partials.header')

<!--  Home Banner -->

@include('partials.home.banner')

<!-- Home Ad one -->

@include('partials.home.home-ad1-fullwidth')

<!-- Cuisine Experience List -->

@include('partials.home.browse-spec')

<!-- Trending Restaurant -->
@if(!$business->isEmpty())
@include('partials.home.trend-res')	
@endif
<!-- Attraction & Activities -->
@if(!$attractions->isEmpty())
@include('partials.home.attraction')
@endif
<!-- Outdoor Restaurants -->
@if(!$business->isEmpty())
@include('partials.home.outdoor')
@endif

<!-- AD + Register Now -->

<!-- @include('partials.home.home-ad3-banner') -->

<!-- Popular Restaurant -->
@if(!$business->isEmpty())
@include('partials.home.popular-res')	
@endif
<!--  Ad 4 full width -->

<!-- @include('partials.home.home-ad4-fullwidth') -->

<!-- Business Register -->

@include('partials.home.join-us')


<!-- Footer Section -->

@include('partials.footer')

<!-- End Page Content -->
@stop