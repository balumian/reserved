@extends('layouts.customer')
@section('title','Reserved :: My Profile')

@section('content')
<div class="col-lg-9 col-12">
    <div class="content-box-bg">
        <div class="page-heading animated fadeIn">
            <h2>Reservations</h2>
        </div>

        <div class="content-box animated fadeIn">
            <div class="my-reservations">
                <div class="row">

                    <div class="col-lg-12 col-12">

                        <div class="reservation-tabs-bg">
                            <ul class="nav nav-tabs reservation-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" href="#tab_sec1" data-bs-toggle="tab"
                                        aria-selected="true" role="tab">Planned Reservations</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#tab_sec2" data-bs-toggle="tab" aria-selected="false"
                                        role="tab" tabindex="-1">Past Reservations</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content my-reserv-tabs-content-bg">

                            <!-- Tab 1 Starts -->
                            <div class="tab-pane fade in active show" id="tab_sec1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-6 pr-7">
                                        <div class="myreserv-item">
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
                                                <div class="myreserv-table">
                                                    <span><img class="img-fluid seat" src="assets/images/table.svg">
                                                        12</span>
                                                    <span><img class="img-fluid seat" src="assets/images/chair.svg">
                                                        03</span>
                                                </div>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="directions">Directions</a>
                                                <div class="btns">
                                                    <a href="#" class="modify">Modify</a>
                                                    <a href="#" class="cancel"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pl-7">
                                        <div class="myreserv-item">
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
                                                <div class="myreserv-table">
                                                    <span><img class="img-fluid seat" src="assets/images/table.svg">
                                                        12</span>
                                                    <span><img class="img-fluid seat" src="assets/images/chair.svg">
                                                        03</span>
                                                </div>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="directions">Directions</a>
                                                <div class="btns">
                                                    <a href="#" class="modify">Modify</a>
                                                    <a href="#" class="cancel"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pr-7">
                                        <div class="myreserv-item">
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
                                                    <i class="fa fa-calendar-o"></i> 15 / 02 / 2023
                                                </span>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="directions">Directions</a>
                                                <div class="btns">
                                                    <a href="#" class="modify">Modify</a>
                                                    <a href="#" class="cancel"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pl-7">
                                        <div class="myreserv-item">
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
                                                    <i class="fa fa-calendar-o"></i> 15 / 02 / 2023
                                                </span>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="directions">Directions</a>
                                                <div class="btns">
                                                    <a href="#" class="modify">Modify</a>
                                                    <a href="#" class="cancel"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Tab 1 Ends -->

                            <!-- Tab 2 Starts -->
                            <div class="tab-pane fade in" id="tab_sec2" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-6 pr-7">
                                        <div class="myreserv-item">
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
                                                <div class="myreserv-table">
                                                    <span><img class="img-fluid seat" src="assets/images/table.svg">
                                                        12</span>
                                                    <span><img class="img-fluid seat" src="assets/images/chair.svg">
                                                        03</span>
                                                </div>

                                            </div>

                                            <div class="myreserv-btns">
                                                <span class="canceled">Canceled</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pl-7">
                                        <div class="myreserv-item">
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
                                                <div class="myreserv-table">
                                                    <span><img class="img-fluid seat" src="assets/images/table.svg">
                                                        12</span>
                                                    <span><img class="img-fluid seat" src="assets/images/chair.svg">
                                                        03</span>
                                                </div>

                                            </div>

                                            <div class="myreserv-btns">
                                                <span class="canceled">Canceled</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pr-7">
                                        <div class="myreserv-item">
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
                                                    <i class="fa fa-calendar-o"></i> 15 / 02 / 2023
                                                </span>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="write-rev">Write Review</a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 pl-7">
                                        <div class="myreserv-item">
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
                                                    <i class="fa fa-calendar-o"></i> 15 / 02 / 2023
                                                </span>

                                            </div>

                                            <div class="myreserv-btns">
                                                <a href="#" class="write-rev">Write Review</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- Tab 2 Ends -->

                        </div>


                    </div>








                </div>
            </div>
        </div>
    </div>
</div>
@stop