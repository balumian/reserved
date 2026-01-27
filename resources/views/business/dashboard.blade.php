@extends('business.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->



<div class="row mb-3 g-3">
    <div class="col-lg-12 col-xxl-12">
        <div class="row g-3 mb-3">
            <div class="col-sm-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Total Customers<span class="badge badge-soft-warning rounded-pill ms-2"></span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(asset('assets/img/icons/spot-illustrations/corner-2.png'));">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Total Visits<span class="badge badge-soft-info rounded-pill ms-2"></span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Total Favourites<span class="badge badge-soft-info rounded-pill ms-2"></span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-lg-2 mb-3">
                <div class="card h-lg-100">
                    <div class="card-header">
                        <div class="row flex-between-center">
                            <div class="col-auto">
                                <h6 class="mb-0">Total Reservations</h6>
                            </div>
                            <div class="col-auto d-flex">
                                <select class="form-select form-select-sm select-month me-2">
                                    <option value="0">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                    <option value="4">May</option>
                                    <option value="5">Jun</option>
                                    <option value="6">July</option>
                                    <option value="7">August</option>
                                    <option value="8">September</option>
                                    <option value="9">October</option>
                                    <option value="10">November</option>
                                    <option value="11">December</option>
                                </select>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body h-100 pe-0">
                        <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
                        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
                        <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</div>






<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop