@extends('layouts.customer')
@section('title','Reserved :: My Profile')

@section('content')
<div class="col-lg-9 col-12">
    <div class="content-box-bg">
        <div class="page-heading animated fadeIn">
            <h2>Favorites</h2>
        </div>
        <div class="content-box animated fadeIn">
            <div class="my-reservations">
                <div class="row">
                    <div class="col-lg-6 col-6 pr-7">
                        <div class="myreserv-item fav-item">
                            <div class="myreserv-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="myreserv-rest-detail">
                                <a href="#" class="rest-name">
                                    Restaurant Name
                                    <span class="location">Dubai</span>
                                </a>
                                <span class="myreserv-date">
                                    <i class="fa fa-calendar"></i> 15 / 02 / 2023
                                </span>
                            </div>

                            <div class="myreserv-btns">
                                <a href="#" class="reserv-btn">Reserve Now</a>
                                <a href="#" class="remove-btn">Remove</a>


                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-6 pl-7">
                        <div class="myreserv-item fav-item">
                            <div class="myreserv-img">
                                <a href="#">
                                    <img class="img-fluid" src="assets/images/login-bg.jpg">
                                </a>
                            </div>

                            <div class="myreserv-rest-detail">
                                <a href="#" class="rest-name">
                                    Restaurant Name
                                    <span class="location">Dubai</span>
                                </a>
                                <span class="myreserv-date">
                                    <i class="fa fa-calendar"></i> 15 / 02 / 2023
                                </span>
                            </div>

                            <div class="myreserv-btns">
                                <a href="#" class="reserv-btn">Reserve Now</a>
                                <a href="#" class="remove-btn">Remove</a>


                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-6 pr-7">
                        <div class="myreserv-item fav-item">
                            <div class="myreserv-img">
                                <a href="#">
                                    <img class="img-fluid" src="assets/images/login-bg.jpg">
                                </a>
                            </div>

                            <div class="myreserv-rest-detail">
                                <a href="#" class="rest-name">
                                    Restaurant Name
                                    <span class="location">Dubai</span>
                                </a>
                                <span class="myreserv-date">
                                    <i class="fa fa-calendar"></i> 15 / 02 / 2023
                                </span>
                            </div>

                            <div class="myreserv-btns">
                                <a href="#" class="reserv-btn">Reserve Now</a>
                                <a href="#" class="remove-btn">Remove</a>


                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-6 pl-7">
                        <div class="myreserv-item fav-item">
                            <div class="myreserv-img">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('assets/images/login-bg.jpg')}}">
                                </a>
                            </div>

                            <div class="myreserv-rest-detail">
                                <a href="#" class="rest-name">
                                    Restaurant Name
                                    <span class="location">Dubai</span>
                                </a>
                                <span class="myreserv-date">
                                    <i class="fa fa-calendar"></i> 15 / 02 / 2023
                                </span>
                            </div>

                            <div class="myreserv-btns">
                                <a href="#" class="reserv-btn">Reserve Now</a>
                                <a href="#" class="remove-btn">Remove</a>


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop