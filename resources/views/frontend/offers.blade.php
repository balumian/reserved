@extends('layouts.customer')
@section('title','Reserved :: My Profile')

@section('content')

<div class="col-lg-9 col-12">
    <div class="content-box-bg">
        <div class="page-heading animated fadeIn">
            <h2>Offers &amp; Perks</h2>
        </div>

        <div class="content-box animated fadeIn">
            <div class="my-offers">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>20% OFF on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeem">Reserve to Redeem</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>FREE Coffee on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeem">Reserve to Redeem</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>20% OFF on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeemed">Claimed</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>FREE Coffee on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeem">Reserve to Redeem</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>20% OFF on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeemed">Claimed</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="offer-item">

                            <div class="offer-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="offer-detail">
                                <h5>FREE Coffee on first reservation</h5>
                                <span>Restaurant Name</span>
                                <i class="location">Dubai</i>
                                <a href="#" class="redeem">Reserve to Redeem</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@stop